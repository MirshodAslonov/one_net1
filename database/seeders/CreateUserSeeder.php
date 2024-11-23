<?php


namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('phone','998990097929')->first();
        if(is_null($admin))
        {
            User::create([
                'name' => 'mirshod',
                'phone' => '998990097929',
                'password' => bcrypt('mirshod')
            ]);
        }
    }
}
