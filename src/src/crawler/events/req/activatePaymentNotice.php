<?php
namespace pagopa\crawler\events\req;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\methods\MethodInterface;
use pagopa\crawler\methods\req\activatePaymentNotice as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;


class activatePaymentNotice extends AbstractEvent
{

    protected Payload $method;


    public function __construct(array $eventData)
    {
        parent::__construct($eventData);
        $this->method = new Payload($this->data['payload']);
    }


    /**
     * Restituisce il valore della colonna idDominio.
     * Se è vuota, restituisce l'id dominio dal payload.
     * @param int $index
     * @return string|null
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        if (empty($this->getColumn('iddominio')))
        {
            // se la colonna iddominio è vuota, provo a recuperare dal payload
            return $this->getMethodInterface()->getPaEmittente(0);
        }
        return $this->getColumn('iddominio');
    }

    /**
     * Restituisce il valore della colonna iuv, perchè lo iuv non è presente nel payload della activatePaymentNotice
     * @param int $index
     * @return string|null
     */
    public function getIuv(int $index = 0): string|null
    {
        return $this->getColumn('iuv');
    }

    /**
     * Restituisce il valore della colonna ccp, perchè il ccp non è presente nel payload della activatePaymentNotice
     * @param int $index
     * @return string|null
     */
    public function getCcp(int $index = 0): string|null
    {
        return $this->getColumn('ccp');
    }

    /**
     * Restituisce il valore della colonna noticeNumber.
     * Se è vuota, restituisce il noticeNumber dal payload.
     * @param int $index
     * @return string|null
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        if (empty($this->getColumn('noticenumber')))
        {
            // se la colonna iddominio è vuota, provo a recuperare dal payload
            return $this->getMethodInterface()->getNoticeNumber(0);
        }
        return $this->getColumn('noticenumber');
    }

    /**
     * Come getIuv, restituisce il valore della colonna creditorReferenceId
     * @param int $index
     * @return string|null
     */
    public function getCreditorReferenceId(int $index = 0): string|null
    {
        return $this->getColumn('creditorreferenceid');
    }

    /**
     * @param int $index
     * @return string|null
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        return $this->getColumn('paymenttoken');
    }

    /**
     * @return array|null
     */
    public function getIuvs(): array|null
    {
        return (is_null($this->getIuv(0))) ? null : [$this->getIuv(0)];
    }

    /**
     * @return array|null
     */
    public function getPaEmittenti(): array|null
    {
        return (is_null($this->getPaEmittente(0))) ? null : [$this->getPaEmittente(0)];
    }

    /**
     * @return array|null
     */
    public function getCcps(): array|null
    {
        return (is_null($this->getCcp(0))) ? null : [$this->getCcp(0)];
    }

    /**
     * @return string|null
     */
    public function getPsp(): string|null
    {
        if (empty($this->getColumn('psp')))
        {
            // se la colonna iddominio è vuota, provo a recuperare dal payload
            return $this->getMethodInterface()->getPsp();
        }
        return $this->getColumn('psp');
    }

    /**
     * Questo valore posso prelevarlo solo dall'evento perchè non presente nel payload
     * @return string|null
     */
    public function getStazione(): string|null
    {
        if (empty($this->getColumn('stazione')))
        {
            return $this->getMethodInterface()->getStazione();
        }
        return $this->getColumn('stazione');
    }

    /**
     * Provo prima nell'evento, poi nel payload
     * @return string|null
     */
    public function getCanale(): string|null
    {
        if (empty($this->getColumn('canale')))
        {
            // se la colonna è vuota, provo a recuperare dal payload
            return $this->getMethodInterface()->getCanale();
        }
        return $this->getColumn('canale');
    }

    /**
     * Questo valore posso prelevarlo solo dall'evento
     * @return string|null
     */
    public function getBrokerPa(): string|null
    {
        if (empty($this->getStazione()))
        {
            return null;
        }
        $stazione = explode('_', $this->getStazione(), 2);
        return $stazione[0]; // ricavo il broker pa splittando la stazione
    }

    /**
     * Questo valore posso prelevarlo dal payload o lavorando sull'evento
     * @return string|null
     */
    public function getBrokerPsp(): string|null
    {
        if (is_null($this->getMethodInterface()->getBrokerPsp()))
        {
            if (empty($this->getCanale()))
            {
                return null;
            }
            $canale = explode('_', $this->getCanale(), 2);
            return $canale[0];
        }
        return $this->getMethodInterface()->getBrokerPsp();
    }

    /**
     * @param int $index
     * @return string
     */
    public function getKey(int $index = 0): string
    {
        // TODO: Implement getKey() method.
    }

    /**
     * @param int $index
     * @return \pagopa\database\sherlock\Transaction|null
     */
    public function transaction(int $index = 0): Transaction|null
    {
        $iuv            =   $this->getIuv($index);
        $pa_emittente   =   $this->getPaEmittente($index);
        $date_event     =   $this->getInsertedTimestamp()->format('Y-m-d');

        $notice_id      =   $this->getNoticeNumber($index);

        $psp_id         =   $this->getPsp();
        $canale         =   $this->getCanale();
        $stazione       =   $this->getStazione();

        $importo        =   $this->getMethodInterface()->getImporto(0);

        $transaction = new Transaction($this->getInsertedTimestamp());
        $transaction->setIuv($iuv);
        $transaction->setPaEmittente($pa_emittente);
        $transaction->setInsertedTimestamp($this->getInsertedTimestamp());
        $transaction->setNewColumnValue('date_event', $date_event);

        if (!is_null($notice_id))
        {
            $transaction->setNoticeId($notice_id);
        }

        if (!is_null($psp_id))
        {
            $transaction->setPsp($psp_id);
        }

        if (!is_null($canale))
        {
            $transaction->setCanale($canale);
        }

        if (!is_null($stazione))
        {
            $transaction->setStazione($stazione);
        }

        if (!is_null($importo))
        {
            $transaction->setImporto($importo);
        }

        return $transaction;
    }

    /**
     * @param int $index
     * @return bool
     */
    public function isValid(int $index = 0): bool
    {
        // un evento di activatePaymentNotice per essere valido deve contenere 4 valori
        // data_event + iuv + pa_emittente + token_ccp
        // se uno di questi 4 non è presente (=null) restituisco false
        $iuv = $this->getIuv(0);
        $pa = $this->getPaEmittente(0);
        $token = $this->getPaymentToken(0);
        $date = $this->getInsertedTimestamp()->format('Y-m-d');
        return ($date && $iuv && $pa && $token);
    }

    /**
     * @param int $index
     * @return TransactionDetails|null
     */
    public function transactionDetails(int $transfer = 0, int $index = 0): TransactionDetails|null
    {
        return null;
    }

    /**
     * @param int $index
     * @return Workflow|null
     */
    public function workflowEvent(int $index = 0): Workflow|null
    {
        $workflow = new Workflow($this->getInsertedTimestamp());
        $workflow->setNewColumnValue('date_event', $this->getInsertedTimestamp()->format('Y-m-d'));
        $workflow->setEventTimestamp($this->getInsertedTimestamp());
        $workflow->setEventId($this->getUniqueId());
        $workflow->setFkTipoEvento(1);

        $id_psp     = $this->getPsp();
        $stazione   = $this->getStazione();
        $canale     = $this->getCanale();

        if (!is_null($id_psp))
        {
            $workflow->setPsp($id_psp);
        }
        if (!is_null($stazione))
        {
            $workflow->setStazione($stazione);
        }
        if (!is_null($canale))
        {
            $workflow->setCanale($canale);
        }

        return $workflow;
    }

    /**
     * @return MethodInterface
     */
    public function getMethodInterface(): MethodInterface
    {
        return $this->method;
    }

    /**
     * Restituisce 1 perchè la activatePaymentNotice gestisce un solo pagamento
     * @return int
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }

    /**
     * @param int $index
     * @return int|null
     */
    public function getTransferCount(int $index = 0): int|null
    {
        return null;
    }
}