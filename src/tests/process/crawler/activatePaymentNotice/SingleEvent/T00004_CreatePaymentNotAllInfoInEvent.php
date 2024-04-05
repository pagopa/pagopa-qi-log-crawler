<?php

namespace process\crawler\activatePaymentNotice\SingleEvent;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;


/**
 * <p>Valuta la corretta lavorazione di una singola activatePaymentNotice Request con token assente e PSP non presente nell'evento, creando quindi un Payment</p>
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
 *            <td style="border-right: 1px dashed;padding: 8px">4</td>
 *            <td style="border-right: 1px dashed;padding: 8px">activatePaymentNotice</td>
 *            <td style="padding: 8px">REQ</td>
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
 *           <td style="border-right: 1px dashed;padding: 10px">01000000000000004</td>
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
 *           <th style="padding: 10px">event_timestamp</th>
 *           </tr>
 *      </thead>
 *      <tbody>
 *          <tr style="border-bottom: 1px dashed;">
 *            <td style="border-right: 1px dashed;padding: 10px">T000003</td>
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

#[TestDox('[T00004] Valuta la corretta lavorazione di una singola activatePaymentNotice Request con token assente e PSP non presente nell\'evento, creando quindi un Payment')]
class T00004_CreatePaymentNotAllInfoInEvent extends TestCase
{

    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }


    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000004');

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:41:00.232', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000004', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000004', $transaction->getColumnValue('notice_id'));
        $this->assertContains('2024-03-11', json_decode($transaction->getColumnValue('date_wf'),JSON_OBJECT_AS_ARRAY));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));

        $this->assertEquals('0.00', $transaction->getColumnValue('importo'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
        $this->assertNull($transaction->getColumnValue('token_ccp'));
        $this->assertNull($transaction->getColumnValue('id_psp'));
        $this->assertNull($transaction->getColumnValue('stazione'));
        $this->assertNull($transaction->getColumnValue('canale'));
    }

    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000004' );
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details);

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000004' );
        $event = self::$db->getWorkFlow($transaction, 0);

        $this->assertEquals('T000004', $event->getColumnValue('event_id'));
        $this->assertEquals('1', $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 09:41:00.232', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T000004', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('PSP_01', $event->getColumnValue('id_psp'));

        $event = self::$db->getWorkFlow($transaction, 1);

        $this->assertEquals('T000009', $event->getColumnValue('event_id'));
        $this->assertEquals('1', $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-11 09:42:25.232', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T000009', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('PSP_01', $event->getColumnValue('id_psp'));

    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 4);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }


}
