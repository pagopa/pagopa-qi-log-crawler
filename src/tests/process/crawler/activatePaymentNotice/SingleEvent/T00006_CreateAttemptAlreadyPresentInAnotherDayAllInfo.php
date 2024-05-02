<?php
namespace process\crawler\activatePaymentNotice\SingleEvent;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\MapEvents;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

/**
 * <p>Valuta la corretta lavorazione di una singola activatePaymentNotice Request con tutte le info nell'evento già lavorata nel giorno precedente</p>
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
 *            <td style="border-right: 1px dashed;padding: 8px">6</td>
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
 *           <td style="border-right: 1px dashed;padding: 10px">01000000000000001</td>
 *           <td style="border-right: 1px dashed;padding: 10px">77777777777</td>
 *           <td style="padding: 10px">t0000000000000000000000000000001</td>
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
 *            <td style="border-right: 1px dashed;padding: 10px">T000006</td>
 *            <td style="border-right: 1px dashed;padding: 10px">1</td>
 *            <td style="padding: 10px">2024-03-11 09:29:25.232</td>
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
#[TestDox('[T00006] Lavorazione di una activatePaymentNotice REQ con tutti i valori presenti nell\'evento e nel payload ma in giornata diversa')]
class T00006_CreateAttemptAlreadyPresentInAnotherDayAllInfo extends TestCase
{

    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-11'), '01000000000000001', 't0000000000000000000000000000001');
        $this->assertNull($transaction);

    }


    #[TestDox('[DETAILS] Verifica dell\'assenza dei dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-11'), '01000000000000001', 't0000000000000000000000000000001');
        $this->assertNull($transaction);

    }

    #[TestDox('[WORKFLOW] Verifica della correttezza nella tabella Workflow')]
    public function testWorkflow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000001', 't0000000000000000000000000000001');
        $workflow = self::$db->getWorkFlow($transaction, 1);

        $this->assertEquals(MapEvents::getMethodId('activatePaymentNotice', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-11 09:29:25.232', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000006', $workflow->getColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));

    }


    #[TestDox('[ReEvent] Verifica della correttezza nella tabella del Registro Eventi')]
    public function testReEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-11'), 6);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));
    }

}
