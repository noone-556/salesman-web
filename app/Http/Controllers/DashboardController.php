<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'stats' => [
                'followups_due' => 12,
                'active_leads' => 47,
                'cars_listed' => 8,
                'pipeline' => '2.4M',
            ],
            'customers' => [
                ['name' => 'Ahmad Zaki', 'phone' => '012-345 6789', 'car' => 'Perodua Myvi 1.5 AV', 'status' => 'hot', 'last_contact' => 'Today'],
                ['name' => 'Siti Nurhaliza', 'phone' => '019-876 5432', 'car' => 'Honda City RS', 'status' => 'warm', 'last_contact' => 'Yesterday'],
                ['name' => 'Raj Kumar', 'phone' => '016-234 5678', 'car' => 'Proton X50 Premium', 'status' => 'follow_up', 'last_contact' => '3 days ago'],
                ['name' => 'Lim Wei Jie', 'phone' => '011-567 8901', 'car' => 'Toyota Vios GR-S', 'status' => 'cold', 'last_contact' => '1 week ago'],
                ['name' => 'Farah Aina', 'phone' => '013-890 1234', 'car' => 'Mazda CX-5', 'status' => 'hot', 'last_contact' => 'Today'],
                ['name' => 'Muhammad Hafiz', 'phone' => '017-456 7890', 'car' => 'Honda HR-V RS', 'status' => 'warm', 'last_contact' => '2 days ago'],
            ],
            'followups' => [
                ['name' => 'Raj Kumar', 'car' => 'Proton X50', 'due' => 'Overdue 2 days', 'urgent' => true],
                ['name' => 'Lim Wei Jie', 'car' => 'Toyota Vios', 'due' => 'Due today', 'urgent' => false],
                ['name' => 'Nurul Izzati', 'car' => 'Perodua Bezza', 'due' => 'Due today', 'urgent' => false],
                ['name' => 'Tan Mei Ling', 'car' => 'Honda Civic', 'due' => 'Due tomorrow', 'urgent' => false],
            ],
            'templates' => [
                ['id' => 'price_drop', 'label' => 'Price Drop Alert', 'message' => "Hi {{name}}! Good news — the {{car}} you enquired about now has a special price. Interested to view this weekend?"],
                ['id' => 'test_drive', 'label' => 'Test Drive Reminder', 'message' => "Hi {{name}}, just checking in on your test drive for the {{car}}. Still free this Saturday?"],
                ['id' => 'loan_approved', 'label' => 'Loan Approved', 'message' => "Hi {{name}}! Your loan for the {{car}} has been approved. Let's proceed with booking — reply YES to confirm."],
                ['id' => 'still_interested', 'label' => 'Still Interested?', 'message' => "Hi {{name}}, hope you're well! Are you still looking for a {{car}}? I have new units available."],
            ],
        ]);
    }
}
