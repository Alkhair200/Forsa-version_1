<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $user = User::create([
            'name' => 'super admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('00000000'),
            'status' => 1,
            'admin' => 1,

        ]);
    }
}
