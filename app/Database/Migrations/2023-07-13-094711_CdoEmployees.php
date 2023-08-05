<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CdoEmployees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'auto_increment'=>true,
                'constraint'=> '5',
            ],
            'employee_id_no'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],
            'firstname'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],
            'middlename'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],
            'lastname'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],
            'phone_no'=>[
                'type'=>'INT',
                'constraint'=>'25',
            ],
            'email'=>[
                'type'=>'VARCHAR',
                'constraint'=> '100',
                'unique'=>true,
            ],
            'birth'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],
            'start_date'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],
            'status'=>[
                'type'=>'VARCHAR',
                'constraint'=>'10',
            ]
            ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('cdo_employees');
    }

    public function down()
    {
        $this->forge->dropTable('cdo_employees');
    }
}
