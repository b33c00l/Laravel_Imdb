<?php

use Illuminate\Database\Seeder;

use App\User;

class FirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

    	$user->name = 'Paulius';
    	$user->email = 'paulius@paulius.lt';
    	$user->password = bcrypt('slaptas');
    	$user->role = 'admin';

    	$user->save();
    }
}
