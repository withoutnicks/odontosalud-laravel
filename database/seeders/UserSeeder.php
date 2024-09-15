<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User();
        $user1->name = 'Fressia Bendezu';
        $user1->email = 'fressb@example.com';
        $user1->password = Hash::make('fresita123');
        $user1->permissions = false;
        $user1->save();

        $user2 = new User();
        $user2->name = 'Hugo Martinez';
        $user2->email = 'hugom@example.com';
        $user2->password = Hash::make('huguito123');
        $user2->permissions = false;
        $user2->save();

        $user3 = new User();
        $user3->name = 'Administrador';
        $user3->email = 'admin@odonto.com';
        $user3->password = Hash::make('admin1234');
        $user3->permissions = true;
        $user3->save();
    }
}
