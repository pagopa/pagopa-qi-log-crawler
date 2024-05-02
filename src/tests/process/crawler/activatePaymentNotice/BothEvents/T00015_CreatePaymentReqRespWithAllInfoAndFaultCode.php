<?php

namespace process\crawler\activatePaymentNotice\BothEvents;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\MapEvents;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

/**
 * <p>Valuta la corretta lavorazione di una singola activatePaymentNotice Request con token assente, creando quindi un Payment</p>
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
 *            <td style="border-right: 1px dashed;padding: 8px">18</td>
 *            <td style="border-right: 1px dashed;padding: 8px">activatePaymentNotice</td>
 *            <td style="padding: 8px">REQ</td>
 *          </tr>
 *          <tr style="border-bottom: 0px dashed;">
 *             <td style="border-right: 1px dashed;padding: 8px">19</td>
 *             <td style="border-right: 1px dashed;padding: 8px">activatePaymentNotice</td>
 *             <td style="padding: 8px">RESP</td>
 *           </tr>
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
 *           <td style="border-right: 1px dashed;padding: 10px">01000000000000010</td>
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
 * <h3>Nothing</h3>
 *
 * <h2>Transaction Events</h2>
 *  <table style="border:1px solid">
 *      <thead style="border: 0px solid">
 *          <tr style="border-bottom: 1px dashed;">
 *           <th style="border-right: 1px dashed;padding: 10px">event_id</th>
 *           <th style="border-right: 1px dashed;padding: 10px">fk_tipoevento</th>
 *           <th style="border-right: 1px dashed;padding: 10px">event_timestamp</th>
 *           <th style="padding: 10px">faultCode</th>
 *           </tr>
 *      </thead>
 *      <tbody>
 *          <tr style="border-bottom: 1px dashed;">
 *             <td style="border-right: 1px dashed;padding: 10px">T000018</td>
 *             <td style="border-right: 1px dashed;padding: 10px">1</td>
 *             <td style="padding: 10px">2024-03-10 10:43:00.197</td>
 *          </tr>
 *          <tr style="border-bottom: 1px dashed;">
 *             <td style="border-right: 1px dashed;padding: 10px">T000019</td>
 *             <td style="border-right: 1px dashed;padding: 10px">2</td>
 *             <td style="border-right: 1px dashed;padding: 10px">2024-03-10 10:44:00.197</td>
 *             <td style="padding: 10px">PPT_PAGAMENTO_DUPLICATO</td>
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

#[TestDox('[T00015] Valuta la corretta lavorazione REQ/RESP activatePaymentNotice con faultCode nella risposta')]
class T00015_CreatePaymentReqRespWithAllInfoAndFaultCode extends TestCase
{

    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }


    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000010');

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 10:43:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000010', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000010', $transaction->getColumnValue('notice_id'));
        $this->assertNull($transaction->getColumnValue('token_ccp'));
        $this->assertNull($transaction->getColumnValue('id_psp'));
        $this->assertNull($transaction->getColumnValue('stazione'));
        $this->assertNull($transaction->getColumnValue('canale'));
        $this->assertEquals('0.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));

        $this->assertNull($transaction->getColumnValue('date_wf'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
        $this->assertNull($transaction->getColumnValue('esito'));
    }

    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000010' );
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details);
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000010' );
        $event = self::$db->getWorkFlow($transaction, 0);

        $this->assertEquals(MapEvents::getMethodId('activatePaymentNotice', 'REQ'), $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:43:00.197', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T000018', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));


        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000010' );
        $event = self::$db->getWorkFlow($transaction, 1);

        $this->assertEquals(MapEvents::getMethodId('activatePaymentNotice', 'RESP'), $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:44:00.197', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T000019', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));
        $this->assertEquals('PPT_PAGAMENTO_DUPLICATO', $event->getColumnValue('faultcode'));
        $this->assertEquals('KO', $event->getColumnValue('outcome'));
    }


    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 18);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 19);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));
    }


}
