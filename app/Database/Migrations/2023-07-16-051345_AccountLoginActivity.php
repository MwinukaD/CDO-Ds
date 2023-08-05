<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AccountLoginActivity extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'auto_increment'=>true,
                'constraint'=> '11',
            ],
            'uniid'=>[
                'type'=>'VARCHAR',
                'constraint'=>'32',
            ],
            'login_time'=>[
                'type'=>'DATETIME',
                
            ],
            'logout_time'=>[
                'type'=>'DATETIME',
                
            ],
            'agent'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],
            'ip_address' => [
                'type' => 'VARCHAR',
                'constraint'=>'30'
            ]
            ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('account_login_activity');
    }

    public function down()
    {
        $this->forge->dropTable('account_login_activity');
    }
}
