<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use App\Models\CustomerModel;

class CustomerMigration extends Migration
{
    public function up()
    {
        $cust_mod = new CustomerModel();
        $this->forge->addField([
            $cust_mod->primaryKey => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            $cust_mod->createdField => [
                'type' => 'DATETIME',
            ],
            $cust_mod->updatedField => [
                'type' => 'DATETIME',
            ],
            $cust_mod->deletedField => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey($cust_mod->primaryKey);
        $this->forge->createTable($cust_mod->table, true);
    }

    public function down()
    {
        $cust_mod = new CustomerModel();
        $this->forge->dropTable($cust_mod->table, true);
    }
}
