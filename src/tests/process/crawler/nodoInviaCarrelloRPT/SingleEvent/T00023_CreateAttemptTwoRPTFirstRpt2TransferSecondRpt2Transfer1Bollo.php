<?php

namespace process\crawler\nodoInviaCarrelloRPT\SingleEvent;

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
 *            <td style="padding: 8px">c0000000000000000000000000000004</td>
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
 *          <td style="border-right: 1px dashed;padding: 10px">01000000000000015</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">t0000000000000000000000000000014</td>
 *         </tr>
 *         <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">01000000000000016</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777778</td>
 *            <td style="padding: 10px">t0000000000000000000000000000014</td>
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
 *           <td style="border-right: 1px dashed;padding: 10px">200.00</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">IT18U0000000000000000000010</td>
 *         </tr>
 *         <tr style="border-bottom: 1px dashed;">
 *           <td style="border-right: 1px dashed;padding: 10px">150.00</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">IT18U0000000000000000000011</td>
 *         </tr>
 *          <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">100.00</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777778</td>
 *            <td style="padding: 10px">IT18U0000000000000000000012</td>
 *          </tr>
 *          <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">16.00</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777778</td>
 *            <td style="padding: 10px">bollo</td>
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
 *            <td style="border-right: 1px dashed;padding: 10px">T000024</td>
 *            <td style="border-right: 1px dashed;padding: 10px">3</td>
 *            <td style="padding: 10px">2024-03-10 10:30:00.197</td>
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


#[TestDox('[T00023] Valuta la corretta lavorazione di una singola nodoInviaCarrelloRPT Request con 2 RPT e 2 Transfer. RPT_1 ha 2 transfer, RPT_2 ha 1 transfer e 1 bollo')]
class T00023_CreateAttemptTwoRPTFirstRpt2TransferSecondRpt2Transfer1Bollo extends TestCase
{

    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }


    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000015');
        $this->assertEquals('2024-03-10 10:25:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000015', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000014', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('c0000000000000000000000000000004', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('400.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertNull($transaction->getColumnValue('id_psp'));
        $this->assertNull($transaction->getColumnValue('canale'));



        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000016');
        $this->assertEquals('2024-03-10 10:25:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000016', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777778', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000014', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('c0000000000000000000000000000004', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('116.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertNull($transaction->getColumnValue('id_psp'));
        $this->assertNull($transaction->getColumnValue('canale'));
    }

    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000015');
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000011', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('150.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000010', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));



        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000016');
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('16.00', $details->getColumnValue('amount_transfer'));
        $this->assertTrue($details->getColumnValue('is_bollo'));
        $this->assertNull($details->getColumnValue('iban_transfer'));

        $details = self::$db->getTransactionDetails($transaction, 1);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000012', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('100.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000015');
        $workflow = self::$db->getWorkFlow($transaction, 0);


        $this->assertEquals('3', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:25:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000023', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));



        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000016');
        $workflow = self::$db->getWorkFlow($transaction, 0);


        $this->assertEquals('3', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:25:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000023', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 23);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }


}
