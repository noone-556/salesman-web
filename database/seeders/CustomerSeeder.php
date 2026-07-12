<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $customers = [
            ['name' => 'Ahmad Zaki', 'phone' => '012-345 6789', 'car' => 'Perodua Myvi 1.5 AV', 'status' => 'hot', 'last_contact_at' => now()],
            ['name' => 'Siti Nurhaliza', 'phone' => '019-876 5432', 'car' => 'Honda City RS', 'status' => 'warm', 'last_contact_at' => now()->subDay()],
            ['name' => 'Raj Kumar', 'phone' => '016-234 5678', 'car' => 'Proton X50 Premium', 'status' => 'follow_up', 'last_contact_at' => now()->subDays(3)],
            ['name' => 'Lim Wei Jie', 'phone' => '011-567 8901', 'car' => 'Toyota Vios GR-S', 'status' => 'cold', 'last_contact_at' => now()->subWeek()],
            ['name' => 'Farah Aina', 'phone' => '013-890 1234', 'car' => 'Mazda CX-5', 'status' => 'hot', 'last_contact_at' => now()],
            ['name' => 'Muhammad Hafiz', 'phone' => '017-456 7890', 'car' => 'Honda HR-V RS', 'status' => 'warm', 'last_contact_at' => now()->subDays(2)],
        ];

        foreach ($customers as $customer) {
            Customer::create([
                'user_id' => 1,
                ...$customer,
            ]);
        }
    }
}
