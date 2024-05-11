<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User([
            'name' => 'Admin',
            'phone_number' => '0000000000',
            'email' => 'admin@admin.com',
            'password' => Crypt::encryptString('admin123'),
            'type' => 'admin',
        ]);

        $admin->save();

        $vendor = new User([
            'name' => 'Vendor',
            'phone_number' => '1111111111',
            'email' => 'vendor@vendor.com',
            'password' => Crypt::encryptString('vendor123'),
            'shop_address' => 'Pokhara lakeside',
            'type' => 'vendor',
            'approved' => true
        ]);

        $vendor->save();
    }
}
