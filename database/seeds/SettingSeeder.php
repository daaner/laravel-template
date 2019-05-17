<?php

use Illuminate\Database\Seeder;
use App\Setting as Seedmodel;

class SettingSeeder extends Seeder
{
  public function run() {
    $datas = [

      //503
      [
        'name'        => 'disable_site',
        'description' => 'Disable site or not',
        'value'       => false,
      ],

      //403
      [
        'name'        => 'moderators_allow',
        'description' => 'Allow login for moderators',
        'value'       => true,
      ],
      [
        'name'        => 'registered_allow',
        'description' => 'Allow site only for registered users',
        'value'       => false,
      ],
      [
        'name'        => 'enable_register',
        'description' => 'Allow register on site',
        'value'       => true,
      ],


    ];


    foreach ($datas as $data) {
      $newData = Seedmodel::where('name', '=', $data['name'])->first();
      if ($newData === null) {
        $newData = Seedmodel::create(array(
          'name'        => $data['name'],
          'description' => $data['description'],
          'value'       => $data['value'],
        ));
      }
    }
  }
}
