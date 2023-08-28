<?php

namespace Database\Seeders;

use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['name' => 'phone', 'link' => '+994512951211'],
            ['name' => 'facebook', 'link' => 'https://facebook.com'],
            ['name' => 'instagram', 'link' => 'https://www.instagram.com/zuhur_inshaat.mmc/'],
            ['name' => 'youtube', 'link' => 'https://www.youtube.com'],
            ['name' => 'email', 'link' => 'info@zuhurgroup.az'],
            ['name' => 'address_az', 'link' => 'Zühur Qrupu, Mirəli Qaşqay, Bakı'],
            ['name' => 'address_en', 'link' => 'Zühur Group, Mirali Gashgai, Baku'],
            ['name' => 'address_ru', 'link' => 'Zühur Group, Мирали Гашгай, Баку'],
            ['name' => 'mail_receiver', 'link' => 'elmir_567@mail.ru'],
        ];
        foreach ($settings as $key => $setting) {
            $set = new Setting();
            $set->name = $setting['name'];
            $set->link = $setting['link'];
            $set->status = 1;
            $set->save();
        }
    }
}
