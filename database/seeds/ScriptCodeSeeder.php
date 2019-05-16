<?php

use Illuminate\Database\Seeder;
use App\Models\Script as Seedmodel;

class ScriptCodeSeeder extends Seeder
{
  public function run() {
    $datas = [
      //Facebook Pixel
      [
        'name' => 'Facebook Pixel',
        'top' => false,
        'data' => '<!-- Facebook Pixel Code --><!-- End Facebook Pixel Code -->',
      ],

      //Google Tag
      [
        'name' => 'Google Tag',
        'top' => false,
        'data' => '<!-- Global site tag (gtag.js) - Google Analytics -->',
      ],

      //JivoSite
      [
        'name' => 'JivoSite',
        'top' => false,
        'data' => '<!-- BEGIN JIVOSITE CODE {literal} --><!-- {/literal} END JIVOSITE CODE -->',
      ],

      //Yandex Verification
      [
        'name' => 'Yandex Verification',
        'top' => true,
        'data' => '<meta name="yandex-verification" content="">',
      ],
    ];


    foreach ($datas as $data) {
      $newData = Seedmodel::where('name', '=', $data['name'])->first();
      if ($newData === null) {
        $newData = Seedmodel::create(array(
          'name'    => $data['name'],
          'active'  => false,
          'top'  => $data['top'],
          'data'	  => $data['data'],
        ));
      }
    }
  }
}
