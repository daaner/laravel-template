<?php

use Illuminate\Database\Seeder;
use App\Role as Seedmodel;

class RoleSeeder extends Seeder
{
  public function run() {
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
        $newData = Seedmodel::create(array(
          'name'          => $data['name'],
          'description'	  => $data['description'],
        ));
      }
    }
  }
}
