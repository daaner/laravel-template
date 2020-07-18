<?php

use App\Setting as Seedmodel;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $datas = [

            //521
            [
                'name'        => 'disable_site',
                'description' => 'Отключить сайт (обновление / изменение). Доступ только для админов',
                'value'       => false,
            ],

            //403
            [
                'name'        => 'registered_allow',
                'description' => 'Доступ к сайту только для зарегистрированных пользователей',
                'value'       => false,
            ],

            // disabled
            [
                'name'        => 'enable_register',
                'description' => 'Включить возможность регистрации',
                'value'       => true,
            ],

        ];

        foreach ($datas as $data) {
            $newData = Seedmodel::where('name', '=', $data['name'])->first();
            if ($newData === null) {
                $newData = Seedmodel::create([
                    'name'        => $data['name'],
                    'description' => $data['description'],
                    'value'       => $data['value'],
                ]);
            }
        }
    }
}
