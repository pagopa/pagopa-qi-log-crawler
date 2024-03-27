<?php

namespace process\crawler\nodoInviaCarrelloRPT\BothEvents;

use Illuminate\Database\Capsule\Manager as Capsule;
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
 *            <td style="padding: 8px">c0000000000000000000000000000012</td>
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
 *          <td style="border-right: 1px dashed;padding: 10px">01000000000000022</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">t0000000000000000000000000000022</td>
 *         </tr>
 *         <tr style="border-bottom: 1px dashed;">
 *           <td style="border-right: 1px dashed;padding: 10px">01000000000000023</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *            <td style="padding: 10px">t0000000000000000000000000000022</td>
 *         </tr>
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
 *           <td style="border-right: 1px dashed;padding: 10px">250.00</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">IT18U0000000000000000000010</td>
 *        </tr>
 *        <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">350.00</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *            <td style="padding: 10px">IT18U0000000000000000000011</td>
 *        </tr>
 *       <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">200.00</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *            <td style="padding: 10px">IT18U0000000000000000000012</td>
 *         </tr>
 *         <tr style="border-bottom: 1px dashed;">
 *             <td style="border-right: 1px dashed;padding: 10px">100.00</td>
 *             <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *             <td style="padding: 10px">IT18U0000000000000000000013</td>
 *         </tr>
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
 *            <td style="border-right: 1px dashed;padding: 10px">T000028</td>
 *            <td style="border-right: 1px dashed;padding: 10px">3</td>
 *            <td style="padding: 10px">2024-03-10 10:35:00.197</td>
 *          </tr>
 *          <tr style="border-bottom: 1px dashed;">
 *             <td style="border-right: 1px dashed;padding: 10px">T000029</td>
 *             <td style="border-right: 1px dashed;padding: 10px">4</td>
 *             <td style="padding: 10px">2024-03-10 10:36:00.197</td>
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


#[TestDox('[T00026] Valuta la corretta lavorazione di una nodoInviaCarrelloRPT REQ/RESP con 2 RPT e 2 Transfer Avvenute nella stessa data')]
class T00026_CreateAttempTwoRPTTwoTransferForRPTSameData extends TestCase
{

    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }


    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000022');
        $this->assertEquals('2024-03-10 10:35:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000022', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000022', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('c0000000000000000000000000000012', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('600.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertNull($transaction->getColumnValue('id_psp'));
        $this->assertNull($transaction->getColumnValue('canale'));

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000023');
        $this->assertEquals('2024-03-10 10:35:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000023', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000022', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('c0000000000000000000000000000012', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('300.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertNull($transaction->getColumnValue('id_psp'));
        $this->assertNull($transaction->getColumnValue('canale'));
    }

    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000022');
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000010', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('250.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $details = self::$db->getTransactionDetails($transaction, 1);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000011', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('350.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));





        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000023');
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000013', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('100.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $details = self::$db->getTransactionDetails($transaction, 1);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000012', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000022');
        $workflow = self::$db->getWorkFlow($transaction, 0);


        $this->assertEquals('3', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:35:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000028', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('4', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:36:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000029', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));


        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000023');
        $workflow = self::$db->getWorkFlow($transaction, 0);


        $this->assertEquals('3', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:35:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000028', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('4', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:36:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000029', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 28);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 29);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));
    }


}
