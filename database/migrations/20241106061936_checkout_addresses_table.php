<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

final class CheckoutAddressesTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('checkout_addresses');
        $table->addColumn('user_id', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('address', 'text')
            ->addColumn('address_username','text', ['null'=> false, 'limit' => '125'])
            ->addColumn('phone', 'string', ['limit' => 10])
            ->addColumn('province_id', 'integer', ['null' => false])
            ->addColumn('district_id', 'integer', ['null' => false])
            ->addColumn('ward_id', 'integer', ['null' => false])
            ->addColumn('province_name', 'string', ['limit' => 225])
            ->addColumn('district_name', 'string', ['limit' => 225])
            ->addColumn('ward_name', 'string', ['limit' => 225])
            ->addColumn('status', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'default' => 1])
            ->addForeignKey('user_id', 'users', 'id', [
                'delete' => 'CASCADE',
                'update' => 'NO_ACTION'
            ])
            ->create();
    }
}
