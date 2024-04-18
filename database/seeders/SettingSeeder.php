<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user1 = Setting::create([
            'phone' => '033 655 5876',
            'phone2' => '0359 719 595',
            'email' => 'ieccambridge21@gmail.com',
            'address' => 'Số 21, ngõ 12, Đào Tấn, Ba Đình, Hà Nội',
            'address2' => '195 Đội Cấn, Ba Đình, Hà Nội',
             'time' => '08:00 - 21:00',
        ]);
        $user1->assignRole('administrator');
    }
}
