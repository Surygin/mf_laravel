<?php

namespace Database\Seeders;

use App\Models\Requisite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequisiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Requisite::create([
            'inn' => '7751188246',
            'rs_number' => '40701810938000005544',
            'cs_number' => '30101810400000000225',
            'kpp' => '775101001',
            'bik' => '044525225',
            'ogrn' => '1207700430475',
            'bank' => 'ПАО СБЕРБАНК Адрес ВСП г. Москва, г. Троицк, М-н В, 37А, пом.4',
        ]);
    }
}
