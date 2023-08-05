<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Client extends Migration{
    public function up(){
        
        $this->forge->addField([
            'clientID'=>[
                'type'=>'INT',
                'auto_increment'=>true,
            ],
            'client_fullname'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
            ],
            'client_email'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'unique'=>true,
            ],
            'client_password'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'created_at'=>[
                'type'=>'DATETIME',
                'null'=>true,
            ],
           'updated_at'=>[
            'type'=>'DATETIME',
            'null'=>true,
           ]
        ]);
        $this->forge->addKey('clientID',true); 
        $this->forge->createTable('client');       
    }
    public function down(){
        $this->forge->dropTable('client');
    }
}
