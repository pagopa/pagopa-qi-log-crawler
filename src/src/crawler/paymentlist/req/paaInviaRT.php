<?php

namespace pagopa\crawler\paymentlist\req;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;

class paaInviaRT extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\paaInviaRT($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0));
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0) && $this->getEvent()->getCcp(0));
    }

    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        if ($cache->getEsito())
        {
            return $cache->getCacheData();
        }

        $iuv = $cache->getIuv();
        $pa_emittente = $cache->getPaEmittente();
        $token = $cache->getToken();

        if (($this->getEvent()->getIuv() == $iuv) && ($this->getEvent()->getPaEmittente() == $pa_emittente) && ($this->getEvent()->getCcp() == $token))
        {
            $outcome = $this->getEvent()->getMethodInterface()->outcome();
            $transaction = Transaction::getTransactionByIdAndDateEvent($cache->getId(), $cache->getDateEvent());
            $transaction->setEsito($outcome);
            $transaction->update();
            DB::statement($transaction->getQuery(), $transaction->getBindParams());
            $esito = ($outcome == 'OK');
            $cache->setEsito($esito);
        }
        return $cache->getCacheData();
    }

    public function updateDetails(CacheObject $cache, int $index = 0): array|null
    {
        if ($cache->getIurUpdate())
        {
            return $cache->getCacheData();
        }

        // $index è l'indice del transfer. Nella RT la sequenza dei versamenti è uguale a quella delle RT

        $iuv = $cache->getIuv();
        $pa_emittente = $cache->getPaEmittente();
        $token = $cache->getToken();


        if (($this->getEvent()->getIuv() == $iuv) && ($this->getEvent()->getPaEmittente() == $pa_emittente) && ($this->getEvent()->getCcp() == $token))
        {
            foreach($cache->getTransferList() as $ck => $transfer_list)
            {
                $id             =   $transfer_list['id'];
                $date_event     =   $transfer_list['date_event'];

                $iur = $this->getEvent()->getMethodInterface()->getRT()->getIur($ck);
                if (!is_null($iur))
                {
                    $details = TransactionDetails::getDetailsByIdAndDateEvent($id, $date_event);
                    $details->setIur($iur);
                    $details->update();
                    DB::statement($details->getQuery(), $details->getBindParams());
                    $cache->setIurUpdate(true);
                }
            }
        }
        return $cache->getCacheData();
    }
}