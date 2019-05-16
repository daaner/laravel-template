<?php

use Illuminate\Database\Seeder;
use App\Setting as Seedmodel;

class SettingSeeder extends Seeder
{
  public function run() {
    $datas = [

      //503
      [
        'name'        => 'Disable site',
        'description' => 'Disable site or not',
        'value'       => '0',
      ],

      //403
      [
        'name'        => 'Admins enter',
        'description' => 'Allow login for admins',
        'value'       => '1',
      ],
      [
        'name'        => 'Moderators enter',
        'description' => 'Allow login for moderators',
        'value'       => '1',
      ],
      [
        'name'        => 'Registered enter',
        'description' => 'Allow login only for registered users',
        'value'       => '0',
      ],


      [
        'name'        => 'Allow register',
        'description' => 'Allow register on site',
        'value'       => '1',
      ],


    ];


    foreach ($datas as $data) {
      $newData = Seedmodel::where('name', '=', $data['name'])->first();
      if ($newData === null) {
        $newData = Seedmodel::create(array(
          'name'        => $data['name'],
          'description' => $data['name'],
          'value'       => $data['value'],
        ));
      }
    }
  }
}
