<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Service extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Maintenance',
                'description' => 'Les spécialistes du Hardware'
            ],
            [
                'name' => 'Web Developer',
                'description' => 'Pour eux tout est code'
            ],
            [
                'name' => 'Web Designer',
                'description' => 'Y a que le CSS dans la vie'
            ],
            [
                'name' => 'Reférenceur',
                'description' => 'Regarde les Serps Google du matin au soir et du soir au matin'
            ],

        ];

        // Using Query Builder
        $this->db->table('service')->insertBatch($data);
    }
}
