<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Followup;
use App\Models\MessageTemplate;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // TODO: replace with Auth::id() once auth is implemented
        // $userId = Auth::id();
        $userId = 1; // hardcoded for now — matches seeded test user

        return view('dashboard', [
            'stats' => [
                'followups_due' => Followup::where('user_id', $userId)->due()->count(),
                'active_leads' => Customer::where('user_id', $userId)->active()->count(),
                'cars_listed' => 8, // placeholder — see note below
                'pipeline' => '2.4M', // placeholder — see note below
            ],

            'customers' => Customer::where('user_id', $userId)
                ->latest('last_contact_at')
                ->get()
                ->map(fn ($customer) => [
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'phone' => $customer->phone,
                    'car' => $customer->car,
                    'status' => $customer->status,
                    'last_contact' => $customer->last_contact_at?->diffForHumans() ?? 'Never',
                ]),

            'followups' => Followup::where('user_id', $userId)
                ->with('customer')
                ->orderBy('due_date')
                ->get()
                ->map(fn ($followup) => [
                    'customer_id' => $followup->customer_id,
                    'name' => $followup->customer->name,
                    'car' => $followup->car,
                    'due' => $this->formatDueDate($followup->due_date, $followup->urgent),
                    'urgent' => $followup->urgent,
                ]),

            'templates' => MessageTemplate::where('user_id', $userId)
                ->orWhereNull('user_id') // include global defaults
                ->get()
                ->map(fn ($template) => [
                    'id' => $template->key,
                    'label' => $template->label,
                    'message' => $template->message,
                ]),
        ]);
    }

    private function formatDueDate($dueDate, $urgent): string
    {
        $days = now()->startOfDay()->diffInDays($dueDate, false);

        if ($days < 0) {
            return 'Overdue ' . abs($days) . ' day' . (abs($days) > 1 ? 's' : '');
        }

        return match ($days) {
            0 => 'Due today',
            1 => 'Due tomorrow',
            default => 'Due in ' . $days . ' days',
        };
    }
}