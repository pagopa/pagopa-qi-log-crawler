<?php

namespace process\crawler\sendPaymentOutcome;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

/**
 * <p>Valuta la corretta lavorazione di una singola activatePaymentNotice Request con token assente e già lavorata nel giorno precedente</p>
 *
 *
 * <h2>Event(s)</h2>
 *  <table style="border:1px solid">
 *      <thead style="border: 0px solid">
 *          <tr style="border-bottom: 1px dashed;">
 *           <th style="border-right: 1px dashed;padding: 10px">id</th>
 *           <th style="border-right: 1px dashed;padding: 10px">type</th>
 *           <th style="padding: 10px">subtype</th>
 *           </tr>
 *      </thead>
 *      <tbody>
 *          <tr style="border-bottom: 0px dashed;">
 *            <td style="border-right: 1px dashed;padding: 8px">40</td>
 *            <td style="border-right: 1px dashed;padding: 8px">activatePaymentNotice</td>
 *            <td style="padding: 8px">REQ</td>
 *          </tr>
 *          <tr style="border-bottom: 0px dashed;">
 *             <td style="border-right: 1px dashed;padding: 8px">41</td>
 *             <td style="border-right: 1px dashed;padding: 8px">activatePaymentNotice</td>
 *             <td style="padding: 8px">RESP</td>
 *           </tr>
 *          <tr style="border-bottom: 0px dashed;">
 *             <td style="border-right: 1px dashed;padding: 8px">42</td>
 *             <td style="border-right: 1px dashed;padding: 8px">sendPaymentOutcome</td>
 *             <td style="padding: 8px">REQ</td>
 *           </tr>
 *           <tr style="border-bottom: 0px dashed;">
 *              <td style="border-right: 1px dashed;padding: 8px">43</td>
 *              <td style="border-right: 1px dashed;padding: 8px">sendPaymentOutcome</td>
 *              <td style="padding: 8px">RESP</td>
 *            </tr>
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
 *           <td style="border-right: 1px dashed;padding: 10px">01000000000000030</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px"></td>
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
 *           <td style="border-right: 1px dashed;padding: 10px">120.00</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">IT18U0000000000000000000001</td>
 *         </tr>
 *         <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">180.00</td>
 *            <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *            <td style="padding: 10px">IT18U0000000000000000000002</td>
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
 *            <td style="border-right: 1px dashed;padding: 10px">T000008</td>
 *            <td style="border-right: 1px dashed;padding: 10px">1</td>
 *            <td style="padding: 10px">2024-03-10 09:41:00.232</td>
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
#[TestDox('[T00030] Valuta la corretta lavorazione di un workflow di pagamento MOD3 NEW con 2 transfer e una sendPaymentOutcome OK')]
class T00030_WorkflowPaymentMod3New2TransferSPOOK extends TestCase
{

    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }


    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000030', 't0000000000000000000000000000030');

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 12:35:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000030', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000030', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('t0000000000000000000000000000030', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('180.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));

        $this->assertNull($transaction->getColumnValue('date_wf'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
    }

    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000030' );

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('1', $details->getColumnValue('id_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('120.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('2', $details->getColumnValue('id_transfer'));
        $this->assertEquals('IT18U0000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('60.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000030' );

        $event = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('1', $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:35:00.197', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T000040', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));

        $event = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('2', $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:36:00.197', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T000041', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));

        $event = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals('5', $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:37:00.197', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T000042', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));

        $event = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals('6', $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:38:00.197', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T000043', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));

    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 40);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 41);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 42);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 43);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));
    }
}
