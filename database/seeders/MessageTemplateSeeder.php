<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MessageTemplate;

class MessageTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            ['key' => 'price_drop', 'label' => 'Price Drop Alert', 'message' => "Hi {{name}}! Good news — the {{car}} you enquired about now has a special price. Interested to view this weekend?"],
            ['key' => 'test_drive', 'label' => 'Test Drive Reminder', 'message' => "Hi {{name}}, just checking in on your test drive for the {{car}}. Still free this Saturday?"],
            ['key' => 'loan_approved', 'label' => 'Loan Approved', 'message' => "Hi {{name}}! Your loan for the {{car}} has been approved. Let's proceed with booking — reply YES to confirm."],
            ['key' => 'still_interested', 'label' => 'Still Interested?', 'message' => "Hi {{name}}, hope you're well! Are you still looking for a {{car}}? I have new units available."],
        ];

        foreach ($templates as $template) {
            MessageTemplate::create([
                'user_id' => null, // global default template, available to all users
                ...$template,
            ]);
        }
    }
}
