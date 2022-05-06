<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                'nama' => '7-1',
                'keterangan' => 'Ini adalah kelas 7-1',
            ],
            [
                'nama' => '7-2',
                'keterangan' => 'Ini adalah kelas 7-2',
            ],
            [
                'nama' => '7-3',
                'keterangan' => 'Ini adalah kelas 7-3',
            ],
            [
                'nama' => '8-1',
                'keterangan' => 'Ini adalah kelas 8-1',
            ],
            [
                'nama' => '8-2',
                'keterangan' => 'Ini adalah kelas 8-2',
            ],
            [
                'nama' => '8-3',
                'keterangan' => 'Ini adalah kelas 8-3',
            ],
            [
                'nama' => '9-1',
                'keterangan' => 'Ini adalah kelas 9-1',
            ],
            [
                'nama' => '9-2',
                'keterangan' => 'Ini adalah kelas 9-2',
            ],
            [
                'nama' => '9-3',
                'keterangan' => 'Ini adalah kelas 9-3',
            ],
        ]);
    }
}
