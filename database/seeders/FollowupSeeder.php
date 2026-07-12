<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Followup;

class FollowupSeeder extends Seeder
{
    public function run(): void
    {
        // Match followups to existing customers by name so the relationship is real,
        // not just a coincidence of matching IDs
        $followups = [
            ['customer_name' => 'Raj Kumar', 'car' => 'Proton X50', 'due_date' => now()->subDays(2), 'urgent' => true],
            ['customer_name' => 'Lim Wei Jie', 'car' => 'Toyota Vios', 'due_date' => now(), 'urgent' => false],
            ['customer_name' => 'Nurul Izzati', 'car' => 'Perodua Bezza', 'due_date' => now(), 'urgent' => false],
            ['customer_name' => 'Tan Mei Ling', 'car' => 'Honda Civic', 'due_date' => now()->addDay(), 'urgent' => false],
        ];

        foreach ($followups as $followup) {
            // Nurul Izzati and Tan Mei Ling weren't in the original customers list,
            // so we create minimal customer records for them too
            $customer = Customer::firstOrCreate(
                ['name' => $followup['customer_name'], 'user_id' => 1],
                [
                    'phone' => '010-000 0000',
                    'car' => $followup['car'],
                    'status' => 'follow_up',
                    'last_contact_at' => now(),
                ]
            );

            Followup::create([
                'customer_id' => $customer->id,
                'user_id' => 1,
                'car' => $followup['car'],
                'due_date' => $followup['due_date'],
                'urgent' => $followup['urgent'],
                'completed' => false,
            ]);
        }
    }
}