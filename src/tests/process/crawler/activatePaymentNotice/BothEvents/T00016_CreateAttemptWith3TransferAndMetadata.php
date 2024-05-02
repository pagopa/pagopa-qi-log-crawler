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

#[TestDox('[T00016] Valuta la corretta lavorazione REQ/RESP activatePaymentNotice con metadata nei transfer')]
class T00016_CreateAttemptWith3TransferAndMetadata extends TestCase
{

    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }


    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000040');

        $this->assertEquals('2024-03-10', $transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 08:05:00.201', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000040', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000040', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('t0000000000000000000000000000040', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('180.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));

        $this->assertNull($transaction->getColumnValue('date_wf'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
        $this->assertNull($transaction->getColumnValue('esito'));
    }

    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000040');

        $details = self::$db->getTransactionDetails($transaction, 2);
        $this->assertEquals('1', $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('100.00', $details->getColumnValue('amount_transfer'));

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertEquals('2', $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('50.00', $details->getColumnValue('amount_transfer'));

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals('3', $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777779', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000003', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('30.00', $details->getColumnValue('amount_transfer'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000040');

        $event = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNotice', 'REQ'), $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:05:00.201', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T100062', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));


        $event = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNotice', 'RESP'), $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:06:00.201', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T100063', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));
        $this->assertEquals('OK', $event->getColumnValue('outcome'));


        $event = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNotice', 'REQ'), $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:07:00.201', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T200062', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));


        $event = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNotice', 'RESP'), $event->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:08:00.201', $event->getColumnValue('event_timestamp'));
        $this->assertEquals('T200063', $event->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $event->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $event->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $event->getColumnValue('id_psp'));
        $this->assertEquals('OK', $event->getColumnValue('outcome'));


        $event = self::$db->getWorkFlow($transaction, 4);
        $this->assertNull($event);

    }

    #[TestDox('[METADATA] Verifica metadata')]
    public function testMetaData()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000040');

        $details = self::$db->getTransactionDetails($transaction, 2);
        $metadata_transfer = self::$db->getMetadataTransfer($details, 0);

        $this->assertEquals('chiave_transfer_1_1', $metadata_transfer->getColumnValue('meta_key'));
        $this->assertEquals('value_transfer_1_1', $metadata_transfer->getColumnValue('meta_value'));
        $this->assertEquals('ACTIVATE_TRANSFER_LIST', $metadata_transfer->getColumnValue('method_name'));

        $metadata_transfer = self::$db->getMetadataTransfer($details, 1);
        $this->assertEquals('chiave_transfer_1_2', $metadata_transfer->getColumnValue('meta_key'));
        $this->assertEquals('value_transfer_1_2', $metadata_transfer->getColumnValue('meta_value'));
        $this->assertEquals('ACTIVATE_TRANSFER_LIST', $metadata_transfer->getColumnValue('method_name'));

        $metadata_transfer = self::$db->getMetadataTransfer($details, 2);
        $this->assertNull($metadata_transfer);


        $details = self::$db->getTransactionDetails($transaction, 1);
        $metadata_transfer = self::$db->getMetadataTransfer($details, 0);

        $this->assertEquals('chiave_transfer_2_1', $metadata_transfer->getColumnValue('meta_key'));
        $this->assertEquals('value_transfer_2_1', $metadata_transfer->getColumnValue('meta_value'));
        $this->assertEquals('ACTIVATE_TRANSFER_LIST', $metadata_transfer->getColumnValue('method_name'));

        $metadata_transfer = self::$db->getMetadataTransfer($details, 1);
        $this->assertEquals('chiave_transfer_2_2', $metadata_transfer->getColumnValue('meta_key'));
        $this->assertEquals('value_transfer_2_2', $metadata_transfer->getColumnValue('meta_value'));
        $this->assertEquals('ACTIVATE_TRANSFER_LIST', $metadata_transfer->getColumnValue('method_name'));

        $metadata_transfer = self::$db->getMetadataTransfer($details, 2);
        $this->assertEquals('chiave_transfer_2_3', $metadata_transfer->getColumnValue('meta_key'));
        $this->assertEquals('value_transfer_2_3', $metadata_transfer->getColumnValue('meta_value'));
        $this->assertEquals('ACTIVATE_TRANSFER_LIST', $metadata_transfer->getColumnValue('method_name'));

        $metadata_transfer = self::$db->getMetadataTransfer($details, 3);
        $this->assertNull($metadata_transfer);


        $details = self::$db->getTransactionDetails($transaction, 0);
        $metadata_transfer = self::$db->getMetadataTransfer($details, 0);
        $this->assertNull($metadata_transfer);

    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 64);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 65);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));
    }
}
