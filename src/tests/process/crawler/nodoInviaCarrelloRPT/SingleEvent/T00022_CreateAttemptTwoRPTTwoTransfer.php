<?php

namespace process\crawler\nodoInviaCarrelloRPT\SingleEvent;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\MapEvents;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;



/**
 * <p>Valuta la corretta lavorazione di una singola nodoInviaCarrelloRPT Request con 2 RPT contenente 2 singolo versamento</p>
 *
 *
 * <h2>Event(s)</h2>
 *  <table style="border:1px solid">
 *      <thead style="border: 0px solid">
 *          <tr style="border-bottom: 1px dashed;">
 *           <th style="border-right: 1px dashed;padding: 10px">id</th>
 *           <th style="border-right: 1px dashed;padding: 10px">type</th>
 *           <th style="border-right: 1px dashed;padding: 10px">subtype</th>
 *           <th style="padding: 10px">id_carrello</th>
 *           </tr>
 *      </thead>
 *      <tbody>
 *          <tr style="border-bottom: 0px dashed;">
 *            <td style="border-right: 1px dashed;padding: 8px">22</td>
 *            <td style="border-right: 1px dashed;padding: 8px">nodoInviaCarrelloRPT</td>
 *            <td style="border-right: 1px dashed;padding: 8px">REQ</td>
 *            <td style="padding: 8px">c0000000000000000000000000000003</td>
 *          </tr>
 *      </tbody>
 *  </table>
 *
 * <h2>Transaction Table</h2>
 * <table style="border:1px solid">
 *     <thead style="border: 0px solid">
 *         <tr style="border-bottom: 1px dashed;">
 *          <th style="border-right: 1px dashed;padding: 10px">iuv</th>
 *          <th style="border-right: 1px dashed;padding: 10px">pa_emittente</th>
 *          <th style="padding: 10px">token</th>
 *          </tr>
 *     </thead>
 *     <tbody>
 *         <tr style="border-bottom: 1px dashed;">
 *          <td style="border-right: 1px dashed;padding: 10px">01000000000000013</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">t0000000000000000000000000000013</td>
 *         </tr>
 *         <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">01000000000000014</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777778</td>
 *            <td style="padding: 10px">t0000000000000000000000000000013</td>
 *          </tr>
 *     </tbody>
 *     <tfoot>
 *         <tr style="padding: 10px">
 *             <td style="padding: 10px;font-size: 8px;font-weight: 800">* Altri parametri saranno controllati</td>
 *         </tr>
 *     </tfoot>
 * </table>
 *
 * <h2>Transaction Details</h2>
 * <table style="border:1px solid">
 *     <thead style="border: 0px solid">
 *         <tr style="border-bottom: 1px dashed;">
 *          <th style="border-right: 1px dashed;padding: 10px">amount</th>
 *          <th style="border-right: 1px dashed;padding: 10px">pa_transfer</th>
 *          <th style="padding: 10px">iban</th>
 *          </tr>
 *     </thead>
 *     <tbody>
 *         <tr style="border-bottom: 1px dashed;">
 *           <td style="border-right: 1px dashed;padding: 10px">150.00</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">IT18U0000000000000000000010</td>
 *         </tr>
 *         <tr style="border-bottom: 1px dashed;">
 *           <td style="border-right: 1px dashed;padding: 10px">100.00</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">IT18U0000000000000000000011</td>
 *         </tr>
 *          <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">80.00</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777778</td>
 *            <td style="padding: 10px">IT18U0000000000000000000012</td>
 *          </tr>
 *          <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">70.00</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777778</td>
 *            <td style="padding: 10px">IT18U0000000000000000000013</td>
 *          </tr>
 *     </tbody>
 *     <tfoot>
 *         <tr style="padding: 10px">
 *             <td style="padding: 10px;font-size: 8px;font-weight: 800">* Altri parametri saranno controllati</td>
 *         </tr>
 *     </tfoot>
 * </table>
 *
 * <h2>Transaction Events</h2>
 *  <table style="border:1px solid">
 *      <thead style="border: 0px solid">
 *          <tr style="border-bottom: 1px dashed;">
 *           <th style="border-right: 1px dashed;padding: 10px">event_id</th>
 *           <th style="border-right: 1px dashed;padding: 10px">fk_tipoevento</th>
 *           <th style="padding: 10px">event_timestamp</th>
 *           </tr>
 *      </thead>
 *      <tbody>
 *          <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">T000023</td>
 *            <td style="border-right: 1px dashed;padding: 10px">3</td>
 *            <td style="padding: 10px">2024-03-10 10:25:00.197</td>
 *          </tr>
 *      </tbody>
 *      <tfoot>
 *          <tr style="padding: 10px">
 *              <td style="padding: 10px;font-size: 8px;font-weight: 800">* Altri parametri saranno controllati</td>
 *          </tr>
 *      </tfoot>
 *  </table>
 *
 * <h2>ReEvent</h2>
 * <p>state: <b>LOADED</b></p>
 *
 * <h2>Fault</h2>
 * <p>False</p>
 *
 */


#[TestDox('[T00022] Valuta la corretta lavorazione di una singola nodoInviaCarrelloRPT Request con 2 RPT e 2 Transfer')]
class T00022_CreateAttemptTwoRPTTwoTransfer extends TestCase
{

    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }


    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000013');
        $this->assertEquals('2024-03-10 10:25:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000013', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000013', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('c0000000000000000000000000000003', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('250.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));


        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000014');
        $this->assertEquals('2024-03-10 10:25:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000014', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777778', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000013', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('c0000000000000000000000000000003', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('150.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));

    }

    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000013');
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000011', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('100.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000010', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('150.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));



        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000014');
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000013', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('70.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000012', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('80.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000013');
        $workflow = self::$db->getWorkFlow($transaction, 0);


        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:25:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000022', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));



        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000014');
        $workflow = self::$db->getWorkFlow($transaction, 0);


        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:25:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000022', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 22);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }


}
