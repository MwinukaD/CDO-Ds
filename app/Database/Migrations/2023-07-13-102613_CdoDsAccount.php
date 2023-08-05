<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CdoDsAccount extends Migration
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
            'password'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],
            'password_hint'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],
            ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('cdo_ds_account');
    }

    public function down()
    {
        $this->forge->dropTable('cdo_ds_account');
    }
}
