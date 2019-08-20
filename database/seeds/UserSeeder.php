<?php

use App\User as Seedmodel;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $datas = [
      [
        'name'     => 'Administrator',
        'login'    => 'admin',
        'email'    => 'admin@site.com',
        'password' => 'Admin@site.com',
        'role_id'  => 3,
      ],
      [
        'name'     => 'Manager',
        'login'    => 'manager',
        'email'    => 'manager@site.com',
        'password' => 'Manager@site.com',
        'role_id'  => 2,
      ],
      [
        'name'     => 'User',
        'login'    => 'user',
        'email'    => 'user@site.com',
        'password' => 'User@site.com',
        'role_id'  => 1,
      ],

    ];

        foreach ($datas as $data) {
            $newData = Seedmodel::where('email', '=', $data['email'])->first();
            if ($newData === null) {
                $newData = Seedmodel::create([
          'name'      => $data['name'],
          'active'    => true,
          // 'login'     => $data['login'],
          'email'     => $data['email'],
          'role_id'   => $data['role_id'],
          'password'  => bcrypt($data['password']),
        ]);
            }
        }
    }
}
