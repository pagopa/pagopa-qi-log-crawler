<?php

namespace process\cache;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\Memcached;
use pagopa\crawler\paymentlist\req\activatePaymentNotice;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

/**
 *  [ 'id' , 'date_event' , 'inserted_timestamp', 'tipoevento', 'sottotipoevento' , 'iddominio', 'iuv', 'ccp', 'noticenumber',
 *    'creditorreferenceid', 'paymenttoken', 'psp', 'stazione', 'canale', 'sessionid', 'sessionidoriginal', 'uniqueid', 'payload',
 *    'state', 'message' ]
 *
 */

#[TestDox('[CACHE] Test su lavorazione activatePaymentNotice')]
class TestAnalysisActivatePaymentNoticeReq extends TestCase
{


    public static function setUpBeforeClass(): void
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'pgsql',
            'host' => DB_HOST,
            'port' => DB_PORT,
            'database' => DB_DATABASE,
            'username' => DB_USERNAME,
            'password' => DB_PASSWORD,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        $memcache = new Memcached();


//        Capsule::statement('update transaction_re_2024 set state=:state', [':state' => 'TO_LOAD']);

        $a = new activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'REQ', $memcache);
        $a->run();


    }

    #[TestDox('[activatePaymentNotice REQ] Evento con valorizzati i seguenti campi: iuv, dominio, notice_number, token, PSP, stazione, canale')]
    public function testCreateAttemptWithAllInfoInEvents()
    {

        $result_transaction = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000001')
            ->where('token_ccp' , '=', 't0000000000000000000000000000001')
            ->get();

        $this->assertEquals(1, $result_transaction->count());
        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result_transaction->get(0));

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:10:10.232', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000001', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000001', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('t0000000000000000000000000000001', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888', $transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('180.00', $transaction->getColumnValue('importo'));
        $this->assertEmpty($transaction->getColumnValue('id_carrello'));
        $this->assertEmpty($transaction->getColumnValue('esito'));

        $id = $transaction->getColumnValue('id');

        $result_events = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento', '=', 1)
            ->where('event_id', '=', 'test_000001')
            ->get();

        $this->assertEquals(2, $result_events->count());

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(0));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:10.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000001', $workflow->getColumnValue('event_id'));

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(1));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:10.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000001', $workflow->getColumnValue('event_id'));


        $state_event = Capsule::table('transaction_re_2024')
            ->where('id', '=', 1)
            ->get();

        $result_event = new TransactionRe(new \DateTime('2024-03-10'), (array) $state_event->get(0));
        $this->assertEquals('LOADED', $result_event->getColumnValue('state'));

    }


    #[TestDox('[activatePaymentNotice REQ] Evento senza la colonna PSP valorizzata')]
    public function testCreateAttemptWithoutPspInfoInEvents()
    {

        $result_transaction = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000002')
            ->where('token_ccp' , '=', 't0000000000000000000000000000002')
            ->get();

        $this->assertEquals(1, $result_transaction->count());
        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result_transaction->get(0));

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:10:11.232', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000002', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000002', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('t0000000000000000000000000000002', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888', $transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('0.00', $transaction->getColumnValue('importo'));
        $this->assertEmpty($transaction->getColumnValue('id_carrello'));
        $this->assertEmpty($transaction->getColumnValue('esito'));

        $id = $transaction->getColumnValue('id');

        $result_events = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento', '=', 1)
            ->get();

        $this->assertEquals(2, $result_events->count());

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(0));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:11.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000002', $workflow->getColumnValue('event_id'));

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(1));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:11.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000002', $workflow->getColumnValue('event_id'));


        $state_event = Capsule::table('transaction_re_2024')
            ->where('id', '=', 2)
            ->get();

        $result_event = new TransactionRe(new \DateTime('2024-03-10'), (array) $state_event->get(0));
        $this->assertEquals('LOADED', $result_event->getColumnValue('state'));
    }



    #[TestDox('[activatePaymentNotice REQ] Evento senza la colonna canale valorizzata')]
    public function testCreateAttemptWithoutChannelInfoInEvents()
    {

        $result_transaction = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000003')
            ->where('token_ccp' , '=', 't0000000000000000000000000000003')
            ->get();

        $this->assertEquals(1, $result_transaction->count());
        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result_transaction->get(0));

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:10:13.232', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000003', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000003', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('t0000000000000000000000000000003', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888', $transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('0.00', $transaction->getColumnValue('importo'));
        $this->assertEmpty($transaction->getColumnValue('id_carrello'));
        $this->assertEmpty($transaction->getColumnValue('esito'));

        $id = $transaction->getColumnValue('id');

        $result_events = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento', '=', 1)
            ->get();

        $this->assertEquals(2, $result_events->count());

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(0));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:13.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000003', $workflow->getColumnValue('event_id'));

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(1));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:13.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000003', $workflow->getColumnValue('event_id'));


        $state_event = Capsule::table('transaction_re_2024')
            ->where('id', '=', 3)
            ->get();

        $result_event = new TransactionRe(new \DateTime('2024-03-10'), (array) $state_event->get(0));
        $this->assertEquals('LOADED', $result_event->getColumnValue('state'));
    }




    #[TestDox('[activatePaymentNotice REQ] Evento su nuovo tentativo per pagamento già trovato')]
    public function testCreateAttemptAfterFirstAttempt()
    {

        $result_transaction = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000001')
            ->where('token_ccp' , '=', 't0000000000000000000000000000004')
            ->get();

        $this->assertEquals(1, $result_transaction->count());
        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result_transaction->get(0));

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:10:14.232', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000001', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000001', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('t0000000000000000000000000000004', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888', $transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_02', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('0.00', $transaction->getColumnValue('importo'));
        $this->assertEmpty($transaction->getColumnValue('id_carrello'));
        $this->assertEmpty($transaction->getColumnValue('esito'));

        $id = $transaction->getColumnValue('id');

        $result_events = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento', '=', 1)
            ->get();

        $this->assertEquals(2, $result_events->count());

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(0));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:14.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000004', $workflow->getColumnValue('event_id'));

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(1));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:14.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000004', $workflow->getColumnValue('event_id'));


        $state_event = Capsule::table('transaction_re_2024')
            ->where('id', '=', 4)
            ->get();

        $result_event = new TransactionRe(new \DateTime('2024-03-10'), (array) $state_event->get(0));
        $this->assertEquals('LOADED', $result_event->getColumnValue('state'));
    }


    #[TestDox('[activatePaymentNotice REQ] Evento senza token su avviso di pagamento già analizzato')]
    public function testCreatePaymentAfterFirstAttempt()
    {

        $result_transaction = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000002')
            ->whereNull('token_ccp')
            ->get();

        $this->assertEquals(1, $result_transaction->count());
        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result_transaction->get(0));

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:10:15.232', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000002', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000002', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888', $transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_02', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('0.00', $transaction->getColumnValue('importo'));
        $this->assertEmpty($transaction->getColumnValue('id_carrello'));
        $this->assertEmpty($transaction->getColumnValue('esito'));
        $this->assertEmpty($transaction->getColumnValue('token_ccp'));

        $id = $transaction->getColumnValue('id');

        $result_events = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento', '=', 1)
            ->get();

        $this->assertEquals(1, $result_events->count());

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(0));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:15.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000005', $workflow->getColumnValue('event_id'));


        $state_event = Capsule::table('transaction_re_2024')
            ->where('id', '=', 5)
            ->get();

        $result_event = new TransactionRe(new \DateTime('2024-03-10'), (array) $state_event->get(0));
        $this->assertEquals('LOADED', $result_event->getColumnValue('state'));
    }




    #[TestDox('[activatePaymentNotice REQ] Evento senza notice number su evento')]
    public function testCreatePaymentWithoutNoticeInEvent()
    {

        $result_transaction = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000004')
            ->where('token_ccp', '=', 't0000000000000000000000000000005')
            ->get();

        $this->assertEquals(1, $result_transaction->count());
        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result_transaction->get(0));

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:10:16.232', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000004', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000004', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('t0000000000000000000000000000005', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888', $transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_03', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('0.00', $transaction->getColumnValue('importo'));
        $this->assertEmpty($transaction->getColumnValue('id_carrello'));
        $this->assertEmpty($transaction->getColumnValue('esito'));

        $id = $transaction->getColumnValue('id');

        $result_events = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento', '=', 1)
            ->get();

        $this->assertEquals(2, $result_events->count());

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(0));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:16.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000006', $workflow->getColumnValue('event_id'));


        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(1));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:16.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000006', $workflow->getColumnValue('event_id'));


        $state_event = Capsule::table('transaction_re_2024')
            ->where('id', '=', 5)
            ->get();

        $result_event = new TransactionRe(new \DateTime('2024-03-10'), (array) $state_event->get(0));
        $this->assertEquals('LOADED', $result_event->getColumnValue('state'));
    }


    #[TestDox('[activatePaymentNotice REQ] Evento di activate duplicato, memorizzo solo il workflow')]
    public function testCreateOnlyWorkFlow()
    {

        $result_transaction = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000001')
            ->where('token_ccp', '=', 't0000000000000000000000000000001')
            ->get();

        $this->assertEquals(1, $result_transaction->count());
        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result_transaction->get(0));

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:10:10.232', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000001', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000001', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('t0000000000000000000000000000001', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888', $transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('180.00', $transaction->getColumnValue('importo'));
        $this->assertEmpty($transaction->getColumnValue('id_carrello'));
        $this->assertEmpty($transaction->getColumnValue('esito'));

        $id = $transaction->getColumnValue('id');

        $result_events = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento', '=', 1)
            ->where('event_id', '=', 'test_000007')
            ->get();

        $this->assertEquals(2, $result_events->count());

        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(0));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:17.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000007', $workflow->getColumnValue('event_id'));


        $workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result_events->get(1));
        $this->assertEquals('2024-03-10', $workflow->getColumnValue('date_event'));
        $this->assertEquals($id, $workflow->getColumnValue('fk_payment'));
        $this->assertEquals(1, $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:10:17.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('test_000007', $workflow->getColumnValue('event_id'));


        $state_event = Capsule::table('transaction_re_2024')
            ->where('id', '=', 5)
            ->get();

        $result_event = new TransactionRe(new \DateTime('2024-03-10'), (array) $state_event->get(0));
        $this->assertEquals('LOADED', $result_event->getColumnValue('state'));
    }
}
