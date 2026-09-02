<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'phone' => '+7(966)193-24-20',
            'email' => 'maria.fond@mail.ru',
            'address' => '108836, г. Москва, ул. Нововатутинская',
        ]);
    }
}
