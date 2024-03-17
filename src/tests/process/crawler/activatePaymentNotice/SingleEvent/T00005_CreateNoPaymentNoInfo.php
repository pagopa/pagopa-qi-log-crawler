<?php

namespace process\crawler\activatePaymentNotice\SingleEvent;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;


/**
 * <p>Valuta la corretta lavorazione di una singola activatePaymentNotice Request senza informazioni, che non crea transazioni e sarà scartata</p>
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
 *            <td style="border-right: 1px dashed;padding: 8px">5</td>
 *            <td style="border-right: 1px dashed;padding: 8px">activatePaymentNotice</td>
 *            <td style="padding: 8px">REQ</td>
 *          </tr>
 *      </tbody>
 *  </table>
 * <br>
 * <h4>iuv: 01000000000000005</h4>
 *
 * <h2>Transaction Details</h2>
 * <h3>Nothing</h3>
 *
 * <h2>Transaction Events</h2>
 * <h3>Nothing</h3>
 *
 * <h2>ReEvent</h2>
 * <p>state: <b>REJECTED</b></p>
 *
 * <h2>Fault</h2>
 * <p>False</p>
 *
 */

#[TestDox('[T00005] Valuta la corretta lavorazione di una singola activatePaymentNotice Request che sarà scartata per mancanza di dati')]
class T00005_CreateNoPaymentNoInfo extends TestCase
{

    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }


    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000005');
        $this->assertNull($transaction);

    }

    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000005' );
        $this->assertNull($transaction);

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000005' );
        $this->assertNull($transaction);
    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 5);
        $this->assertEquals('REJECTED', $event->getColumnValue('state'));

    }


}
