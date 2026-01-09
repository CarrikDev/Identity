<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_jurusan' => 'RPL', 'nama_jurusan' => 'Rekayasa Perangkat Lunak'],
            ['kode_jurusan' => 'TKJ', 'nama_jurusan' => 'Teknik Komputer Jaringan'],
            ['kode_jurusan' => 'DKV', 'nama_jurusan' => 'Desain Komunikasi dan Visual'],
            ['kode_jurusan' => 'MP', 'nama_jurusan' => 'Manajemen Perkantoran'],
        ];

        foreach ($data as $item) {
            Jurusan::create($item); // create() akan otomatis mengisi created_at & updated_at
        }
    }
}
