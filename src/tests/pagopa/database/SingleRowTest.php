<?php
namespace pagopa\database;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;


#[TestDox('pagopa\database\SingleRow::class')]
class SingleRowTest extends TestCase
{

    protected SingleRow $instance_no_pk;

    protected SingleRow $instance_one_pk;

    protected SingleRow $instance_two_pk;

    protected SingleRow $instance_two_pk_no_need;

    protected SingleRow $instance_two_pk_one_need;


    protected function setUp(): void
    {
        $columns = [
            'c1' => 'v1',
            'c2' => 'v2',
            'c3' => 'v3'
        ];

        $this->instance_no_pk = new SingleRow('test_table_no_pk', $columns);
        $this->instance_one_pk = new SingleRow('test_table_one_pk', $columns,['id'], ['id']);
        $this->instance_two_pk = new SingleRow('test_table_two_pk', $columns, ['id', 'date_event'], ['id','date_event']);
        $this->instance_two_pk_one_need = new SingleRow('test_table_two_pk_one_need', $columns, ['id', 'date_event'], ['date_event']);
        $this->instance_two_pk_no_need = new SingleRow('test_table_two_pk_no_need', $columns, ['id', 'date_event'], []);

    }


    #[TestDox('getTable()')]
    public function testGetTable()
    {
        $this->setUp();
        $this->assertEquals('test_table_no_pk', $this->instance_no_pk->getTable());
        $this->assertEquals('test_table_one_pk', $this->instance_one_pk->getTable());
        $this->assertEquals('test_table_two_pk', $this->instance_two_pk->getTable());
        $this->assertEquals('test_table_two_pk_one_need', $this->instance_two_pk_one_need->getTable());
        $this->assertEquals('test_table_two_pk_no_need', $this->instance_two_pk_no_need->getTable());

    }

    #[TestDox('getColumnValue()')]
    public function testGetColumnValue()
    {
        $this->setUp();
        $this->assertEquals('v1', $this->instance_no_pk->getColumnValue('c1'));
        $this->assertEquals('v2', $this->instance_no_pk->getColumnValue('c2'));
        $this->assertEquals('v3', $this->instance_no_pk->getColumnValue('c3'));

        $this->assertEquals('v1', $this->instance_one_pk->getColumnValue('c1'));
        $this->assertEquals('v2', $this->instance_one_pk->getColumnValue('c2'));
        $this->assertEquals('v3', $this->instance_one_pk->getColumnValue('c3'));

        $this->assertEquals('v1', $this->instance_two_pk->getColumnValue('c1'));
        $this->assertEquals('v2', $this->instance_two_pk->getColumnValue('c2'));
        $this->assertEquals('v3', $this->instance_two_pk->getColumnValue('c3'));

        $this->assertEquals('v1', $this->instance_two_pk_one_need->getColumnValue('c1'));
        $this->assertEquals('v2', $this->instance_two_pk_one_need->getColumnValue('c2'));
        $this->assertEquals('v3', $this->instance_two_pk_one_need->getColumnValue('c3'));

        $this->assertEquals('v1', $this->instance_two_pk_no_need->getColumnValue('c1'));
        $this->assertEquals('v2', $this->instance_two_pk_no_need->getColumnValue('c2'));
        $this->assertEquals('v3', $this->instance_two_pk_no_need->getColumnValue('c3'));


        $this->assertNull($this->instance_no_pk->getColumnValue('no_column'));
        $this->assertNull($this->instance_one_pk->getColumnValue('no_column'));
        $this->assertNull($this->instance_two_pk->getColumnValue('no_column'));
        $this->assertNull($this->instance_two_pk_one_need->getColumnValue('no_column'));
        $this->assertNull($this->instance_two_pk_no_need->getColumnValue('no_column'));
    }


    #[TestDox('getReadyColumnValue() && setColumnValue()')]
    public function testGetReadyColumnValue()
    {
        $this->setUp();

        $this->instance_no_pk->setNewColumnValue('c1', 'vv1');
        $this->instance_one_pk->setNewColumnValue('c1', 'vv1');
        $this->instance_two_pk->setNewColumnValue('c1', 'vv1');
        $this->instance_two_pk_one_need->setNewColumnValue('c1', 'vv1');
        $this->instance_two_pk_no_need->setNewColumnValue('c1', 'vv1');

        $this->assertEquals('vv1', $this->instance_no_pk->getReadyColumnValue('c1'));
        $this->assertEquals('vv1', $this->instance_one_pk->getReadyColumnValue('c1'));
        $this->assertEquals('vv1', $this->instance_two_pk->getReadyColumnValue('c1'));
        $this->assertEquals('vv1', $this->instance_two_pk_one_need->getReadyColumnValue('c1'));
        $this->assertEquals('vv1', $this->instance_two_pk_no_need->getReadyColumnValue('c1'));

        $this->assertNull($this->instance_no_pk->getReadyColumnValue('no_column'));
        $this->assertNull($this->instance_one_pk->getReadyColumnValue('no_column'));
        $this->assertNull($this->instance_two_pk->getReadyColumnValue('no_column'));
        $this->assertNull($this->instance_two_pk_one_need->getReadyColumnValue('no_column'));
        $this->assertNull($this->instance_two_pk_no_need->getReadyColumnValue('no_column'));

    }

    #[TestDox('getRow()')]
    public function testGetRow()
    {
        $columns = [
            'c1' => 'v1',
            'c2' => 'v2',
            'c3' => 'v3'
        ];
        $this->setUp();
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($columns, $this->instance_no_pk->getRow(), []);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($columns, $this->instance_one_pk->getRow(), []);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($columns, $this->instance_two_pk->getRow(), []);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($columns, $this->instance_two_pk_one_need->getRow(), []);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($columns, $this->instance_two_pk_no_need->getRow(), []);

    }

    #[TestDox('getNeedPrimaryKeys()')]
    public function testGetNeedPrimaryKeys()
    {
        $this->setUp();
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys([], $this->instance_no_pk->getNeedPrimaryKeys(),[]);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys(['id'], $this->instance_one_pk->getNeedPrimaryKeys(),[]);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys(['id','date_event'], $this->instance_two_pk->getNeedPrimaryKeys(),[]);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys(['date_event'], $this->instance_two_pk_one_need->getNeedPrimaryKeys(),[]);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys([], $this->instance_two_pk_no_need->getNeedPrimaryKeys(),[]);
    }

    #[TestDox('getPrimaryKeys()')]
    public function testGetPrimaryKeys()
    {
        $this->setUp();
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys([], $this->instance_no_pk->getPrimaryKeys(),[]);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys(['id'], $this->instance_one_pk->getPrimaryKeys(),[]);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys(['date_event','id'], $this->instance_two_pk->getPrimaryKeys(),[]);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys(['date_event','id'], $this->instance_two_pk_one_need->getPrimaryKeys(),[]);
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys(['date_event','id'], $this->instance_two_pk_no_need->getPrimaryKeys(),[]);
    }


    #[TestDox('insert()')]
    public function testInsert()
    {
        $this->setUp();

        $this->instance_no_pk->setNewColumnValue('c1','vv1');
        $this->instance_no_pk->setNewColumnValue('c2','vv2');
        $this->instance_no_pk->setNewColumnValue('c3','vv3');

        $this->instance_no_pk->insert();



        //INSERT·INTO·test_table_no_pk(c1,c2,c3)·VALUES(:c1_65e8f423a6431,:c2_65e8f423a6431,:c3_65e8f423a6431)'

        $model = 'INSERT INTO %s(%s) VALUES(%s)';
        $columns = ['c1','c2','c3'];
        $column_insert = implode(',', $columns);

        $bindValues = [];
        foreach($columns as $column)
        {
            $newkey = sprintf(':%s_%s', $column, $this->instance_no_pk->getUniqueId());
            $bindValues[$newkey] = $this->instance_no_pk->getReadyColumnValue($column);
        }

        $query = sprintf($model, $this->instance_no_pk->getTable(), implode(',', $columns), implode(',', array_keys($bindValues)));


        $this->assertEquals($query, $this->instance_no_pk->getQuery());
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($bindValues, $this->instance_no_pk->getBindParams(),[]);








        $this->instance_one_pk->setNewColumnValue('id', 'valore');
        $this->instance_one_pk->setNewColumnValue('c1','vv1');
        $this->instance_one_pk->setNewColumnValue('c2','vv2');
        $this->instance_one_pk->setNewColumnValue('c3','vv3');

        $this->instance_one_pk->insert();



        //INSERT·INTO·test_table_no_pk(c1,c2,c3)·VALUES(:c1_65e8f423a6431,:c2_65e8f423a6431,:c3_65e8f423a6431)'

        $model = 'INSERT INTO %s(%s) VALUES(%s)';
        $columns = ['id', 'c1','c2','c3'];
        $column_insert = implode(',', $columns);

        $bindValues = [];
        foreach($columns as $column)
        {
            $newkey = sprintf(':%s_%s', $column, $this->instance_one_pk->getUniqueId());
            $bindValues[$newkey] = $this->instance_one_pk->getReadyColumnValue($column);
        }

        $query = sprintf($model, $this->instance_one_pk->getTable(), implode(',', $columns), implode(',', array_keys($bindValues)));
        $this->assertEquals($query, $this->instance_one_pk->getQuery());
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($bindValues, $this->instance_one_pk->getBindParams(), []);







        $this->instance_two_pk->setNewColumnValue('id', 'valore');
        $this->instance_two_pk->setNewColumnValue('date_event', '2024-01-01');
        $this->instance_two_pk->setNewColumnValue('c1','vv1');
        $this->instance_two_pk->setNewColumnValue('c2','vv2');
        $this->instance_two_pk->setNewColumnValue('c3','vv3');

        $this->instance_two_pk->insert();



        //INSERT·INTO·test_table_no_pk(c1,c2,c3)·VALUES(:c1_65e8f423a6431,:c2_65e8f423a6431,:c3_65e8f423a6431)'

        $model = 'INSERT INTO %s(%s) VALUES(%s)';
        $columns = ['id', 'date_event', 'c1','c2','c3'];
        $column_insert = implode(',', $columns);

        $bindValues = [];
        foreach($columns as $column)
        {
            $newkey = sprintf(':%s_%s', $column, $this->instance_two_pk->getUniqueId());
            $bindValues[$newkey] = $this->instance_two_pk->getReadyColumnValue($column);
        }

        $query = sprintf($model, $this->instance_two_pk->getTable(), implode(',', $columns), implode(',', array_keys($bindValues)));
        $this->assertEquals($query, $this->instance_two_pk->getQuery());
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($bindValues, $this->instance_two_pk->getBindParams(), []);









        $this->instance_two_pk_no_need->setNewColumnValue('c1','vv1');
        $this->instance_two_pk_no_need->setNewColumnValue('c2','vv2');
        $this->instance_two_pk_no_need->setNewColumnValue('c3','vv3');

        $this->instance_two_pk_no_need->insert();



        //INSERT·INTO·test_table_no_pk(c1,c2,c3)·VALUES(:c1_65e8f423a6431,:c2_65e8f423a6431,:c3_65e8f423a6431)'

        $model = 'INSERT INTO %s(%s) VALUES(%s)';
        $columns = ['c1','c2','c3'];
        $column_insert = implode(',', $columns);

        $bindValues = [];
        foreach($columns as $column)
        {
            $newkey = sprintf(':%s_%s', $column, $this->instance_two_pk_no_need->getUniqueId());
            $bindValues[$newkey] = $this->instance_two_pk_no_need->getReadyColumnValue($column);
        }

        $query = sprintf($model, $this->instance_two_pk_no_need->getTable(), implode(',', $columns), implode(',', array_keys($bindValues)));
        $this->assertEquals($query, $this->instance_two_pk_no_need->getQuery());
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($bindValues, $this->instance_two_pk_no_need->getBindParams(), []);





        $this->instance_two_pk_one_need->setNewColumnValue('date_event','valore');
        $this->instance_two_pk_one_need->setNewColumnValue('c1','vv1');
        $this->instance_two_pk_one_need->setNewColumnValue('c2','vv2');
        $this->instance_two_pk_one_need->setNewColumnValue('c3','vv3');

        $this->instance_two_pk_one_need->insert();



        //INSERT·INTO·test_table_no_pk(c1,c2,c3)·VALUES(:c1_65e8f423a6431,:c2_65e8f423a6431,:c3_65e8f423a6431)'

        $model = 'INSERT INTO %s(%s) VALUES(%s)';
        $columns = ['date_event', 'c1','c2','c3'];
        $column_insert = implode(',', $columns);

        $bindValues = [];
        foreach($columns as $column)
        {
            $newkey = sprintf(':%s_%s', $column, $this->instance_two_pk_one_need->getUniqueId());
            $bindValues[$newkey] = $this->instance_two_pk_one_need->getReadyColumnValue($column);
        }

        $query = sprintf($model, $this->instance_two_pk_one_need->getTable(), implode(',', $columns), implode(',', array_keys($bindValues)));
        $this->assertEquals($query, $this->instance_two_pk_one_need->getQuery());
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($bindValues, $this->instance_two_pk_one_need->getBindParams(), []);



    }

    #[TestDox('update()')]
    public function testUpdate()
    {
        $this->setUp();

        $this->instance_one_pk->setNewColumnValue('c1','vv1');
        $this->instance_one_pk->setNewColumnValue('c2','vv2');
        $this->instance_one_pk->setNewColumnValue('c3','vv3');
        $this->instance_one_pk->setNewColumnValue('id', 'valore1');

        $this->instance_one_pk->update();



        //INSERT·INTO·test_table_no_pk(c1,c2,c3)·VALUES(:c1_65e8f423a6431,:c2_65e8f423a6431,:c3_65e8f423a6431)'

        $model = 'UPDATE %s SET %s WHERE %s';
        $columns = ['c1','c2','c3'];
        $column_insert = implode(',', $columns);

        $bindColumns = [];
        foreach($columns as $column)
        {
            $bindColumns[] = sprintf('%s = %s', $column, sprintf(':%s_%s', $column, $this->instance_one_pk->getUniqueId()));
        }


        $where = sprintf('id = %s', sprintf(':id_%s', $this->instance_one_pk->getUniqueId()));

        $query = sprintf($model, $this->instance_one_pk->getTable(), implode(',', $bindColumns), $where);


        $this->assertEquals($query, $this->instance_one_pk->getQuery(), print_r($query, true));

        $bindValues = [];
        $columns[] = 'id';
        foreach($columns as $column)
        {
            $bindValues[sprintf(':%s_%s', $column, $this->instance_one_pk->getUniqueId())] = $this->instance_one_pk->getReadyColumnValue($column);
        }


        $this->assertEquals($bindValues, $this->instance_one_pk->getBindParams(), print_r($bindValues, true));


    }

    #[TestDox('removeReadyColumn()')]
    public function testRemoveColumn()
    {
        $this->instance_one_pk->setNewColumnValue('new_column', 'new_value');
        $this->assertEquals('new_value', $this->instance_one_pk->getReadyColumnValue('new_column'));
        $this->instance_one_pk->removeReadyColumn('new_column');
        $this->assertNull($this->instance_one_pk->getReadyColumnValue('new_column'));
    }

}
