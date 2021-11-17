<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            [
                'lastname' => 'Bakhtaoui',
                'firstname' => 'Ines',
                'birthdate' => '1995-10-14',
                'address' => '12, domaine du petit beauregard',
                'zip_code' => '78170',
                'phone' => '0632294633',
                'service_id' =>1,
            ],
            [
                'lastname' => 'Daugenne',
                'firstname' => 'Bastien',
                'birthdate' => '1992-02-06',
                'address' => '82, rue des petits moutons',
                'zip_code' => '95400',
                'phone' => '0678956363',
                'service_id' =>2,
            ],
            [
                'lastname' => 'Taslima',
                'firstname' => 'Ahamed Mze',
                'birthdate' => '1998-07-13',
                'address' => '105, allée du jeune cheval',
                'zip_code' => '23640',
                'phone' => '0652524545',
                'service_id' =>3,
            ]
        ];
        $this->db->table('users')->insertBatch($data);

    }
}
