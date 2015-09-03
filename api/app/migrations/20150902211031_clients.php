<?php

use Phinx\Migration\AbstractMigration;

class Clients extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function change()
    {
        $clients = $this->table('clients');
        $clients->addColumn('name', 'string', array('limit' =>  255))
        ->addColumn('active', 'boolean')
        ->addColumn('address', 'string', array('limit' =>  100, 'null' => true))
        ->addColumn('address2', 'string', array('limit' =>  100, 'null' => true))
        ->addColumn('noExt', 'string', array('limit' =>  10, 'null' => true))
        ->addColumn('noInt', 'string', array('limit' =>  10, 'null' => true))
        ->addColumn('city', 'string', array('limit' =>  50, 'null' => true))
        ->addColumn('state', 'string', array('limit' =>  50, 'null' => true))
        ->addColumn('zip', 'string', array('limit' =>  10, 'null' => true))
        ->addColumn('country', 'string', array('limit' =>  25, 'null' => true))
        ->addColumn('phone_number', 'string', array('limit' =>  25, 'null' => true))
        ->addColumn('mobile_number', 'string', array('limit' =>  25, 'null' => true))
        ->addColumn('fax_number', 'string', array('limit' =>  25, 'null' => true))
        ->addColumn('email_address', 'string', array('limit' =>  50, 'null' => true))
        ->addColumn('web_address', 'string', array('limit' =>  50, 'null' => true))
        ->addColumn('notes', 'text', array('null' => true))
        ->addColumn('tax_id', 'string', array('limit' =>  13, 'null' => true))
        ->addColumn('etiqueta', 'string', array('limit' =>  50, 'null' => true))
        ->addColumn('bank', 'string', array('limit' =>  50, 'null' => true))
        ->addColumn('bank_account', 'string', array('limit' =>  50, 'null' => true))
        ->addColumn('iva_ret', 'decimal', array('precision' => 10, 'scale' => 2))
        ->addColumn('created_at', 'timestamp')
        ->addColumn('updated_at', 'timestamp', array('null' => true, 'default' => null))
        ->addIndex('id')
        ->create();
    }
}
