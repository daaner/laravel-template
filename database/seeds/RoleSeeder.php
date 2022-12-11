<?php

use App\Role as Seedmodel;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'name'          => 'User',
                'description'   => 'All users',
            ],
            [
                'name'          => 'Moderator',
                'description'   => 'All moderators',
            ],
            [
                'name'          => 'Admin',
                'description'   => 'All administrators',
            ],
            [
                'name'          => 'Creator',
                'description'   => 'All creators',
            ],
        ];

        foreach ($datas as $data) {
            $newData = Seedmodel::where('name', '=', $data['name'])->first();
            if ($newData === null) {
                $newData = Seedmodel::create([
                    'name'          => $data['name'],
                    'description'	  => $data['description'],
                ]);
            }
        }
    }
}
