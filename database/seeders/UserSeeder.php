<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * @return array[]
     */
    private function getDefaultUsers() :array
    {
        return [
            [
                'name' => 'Allen Hardy',
                'email'=>'anarchalien@outlook.com',
                'password' => Hash::make(env('ALLEN_PASSWORD'))
            ]
        ];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getDefaultUsers() as $defaultUser){
            User::factory()->create([
                'name' => $defaultUser['name'],
                'email' => $defaultUser['email'],
                'password'  => $defaultUser['password']
            ]);
        }
    }
}
