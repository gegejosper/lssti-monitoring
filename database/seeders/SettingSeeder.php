<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::truncate();
        //Setting::create(['send_bill_day' => 0, 'send_bill_due_day' => 0, 'notice_day' => 0, 'penalty' => 0]);
    }
}
