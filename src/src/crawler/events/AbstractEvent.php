<?php

namespace pagopa\crawler\events;

use pagopa\crawler\EventInterface;
use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;

abstract class AbstractEvent implements EventInterface
{

    /**
     * Contiene il valore che dovrà restituire isCartEvent()
     * @var bool
     */
    protected bool $isCart = false;


    /**
     * Restituisce il tipo di formato previsto per il payload
     * @var string
     */
    protected string $typePayload = 'xml';

    /**
     * Contiene i dati dell'evento
     * @var array
     */
    protected array $data = [];

    /**
     * Rappresenta la singola riga dell'evento prelevata dal Registro Eventi
     * @var Transaction
     */
    protected TransactionRe $instance;


    public function __construct(array $eventData)
    {
        $this->data = $eventData;
        $payload = '';
        if (array_key_exists('payload', $eventData))
        {
            $payload = (is_resource($eventData["payload"])) ? stream_get_contents($eventData["payload"]) : $eventData["payload"];
            if ((empty($payload)))
            {
                $payload = base64_encode("NO_PAYLOAD");
            }
            $this->data["payload"] = base64_decode($payload);
        }
        $date = new \DateTime($eventData['inserted_timestamp']);
        $this->instance = new TransactionRe($date, $eventData);
    }

    /**
     * @inheritDoc
     */
    public function getColumn(string $column): string|null
    {
        return (array_key_exists($column, $this->data)) ? $this->data[$column] : null;
    }

    /**
     * @inheritDoc
     */
    public function getInsertedTimestamp(): \DateTime
    {
        return new \DateTime($this->getColumn('inserted_timestamp'));
    }

    /**
     * @inheritDoc
     */
    public function getTipoEvento(): string
    {
        return $this->getColumn('tipoevento');
    }

    /**
     * @inheritDoc
     */
    public function getSottoTipoEvento(): string
    {
        return $this->getColumn('sottotipoevento');
    }

    /**
     * Restituisce il session id dell'evento
     * @return string|null
     */
    public function getSessionId() : string|null
    {
        $value = $this->getColumn('sessionid');
        return (empty($value)) ? null : $value;
    }


    /**
     * Restituisce il session id originale dell'evento
     * @return string|null
     */
    public function getSessionIdOriginal(): string|null
    {
        $value = $this->getColumn('sessionidoriginal');
        return (empty($value)) ? null : $value;
    }

    /**
     * Restituisce lo unique id dell'evento
     * @return string|null
     */
    public function getUniqueId() : string|null
    {
        return $this->getColumn('uniqueid');
    }

    /**
     * Restituisce il payload dell'evento già decodificato in base 64
     * @return string|null
     */
    public function getPayload(): string|null
    {
        return $this->getColumn('payload');
    }

    /**
     * @inheritDoc
     * @param int $index
     * @return string|null
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        $column = $this->getColumn('iddominio');
        if ($index > 0)
        {
            // se sto chiedendo una PA interna al payload , chiedo al metodo
            return $this->getMethodInterface()->getPaEmittente($index);
        }
        // altrimenti se $column è vuoto, chiedo al metodo con $index=0, altrimenti restituisco column (che esiste a questo punto)
        return (empty($column)) ? $this->getMethodInterface()->getPaEmittente(0) : $column;
    }

    /**
     * @param int $index
     * @return string|null
     */
    public function getIuv(int $index = 0): string|null
    {
        $column = $this->getColumn('iuv');
        if ($index > 0)
        {
            // se sto chiedendo una PA interna al payload , chiedo al metodo
            return $this->getMethodInterface()->getIuv($index);
        }
        // altrimenti se $column è vuoto, chiedo al metodo con $index=0, altrimenti restituisco column (che esiste a questo punto)
        return (empty($column)) ? $this->getMethodInterface()->getIuv(0) : $column;
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        $column = $this->getColumn('ccp');
        if ($index > 0)
        {
            // se sto chiedendo una PA interna al payload , chiedo al metodo
            return $this->getMethodInterface()->getCcp($index);
        }
        // altrimenti se $column è vuoto, chiedo al metodo con $index=0, altrimenti restituisco column (che esiste a questo punto)
        return (empty($column)) ? $this->getMethodInterface()->getCcp(0) : $column;
    }

    /**
     * @inheritDoc
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        $column = $this->getColumn('noticenumber');
        if ($index > 0)
        {
            // se sto chiedendo una PA interna al payload , chiedo al metodo
            return $this->getMethodInterface()->getNoticeNumber($index);
        }
        // altrimenti se $column è vuoto, chiedo al metodo con $index=0, altrimenti restituisco column (che esiste a questo punto)
        return (empty($column)) ? $this->getMethodInterface()->getNoticeNumber(0) : $column;
    }

    /**
     * @inheritDoc
     */
    public function getCreditorReferenceId(int $index = 0): string|null
    {
        $column = $this->getColumn('creditorreferenceid');
        if ($index > 0)
        {
            // se sto chiedendo una PA interna al payload , chiedo al metodo
            return $this->getMethodInterface()->getIuv($index);
        }
        // altrimenti se $column è vuoto, chiedo al metodo con $index=0, altrimenti restituisco column (che esiste a questo punto)
        return (empty($column)) ? $this->getMethodInterface()->getIuv(0) : $column;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        $column = $this->getColumn('paymenttoken');
        if ($index > 0)
        {
            // se sto chiedendo una PA interna al payload , chiedo al metodo
            return $this->getMethodInterface()->getToken($index);
        }
        // altrimenti se $column è vuoto, chiedo al metodo con $index=0, altrimenti restituisco column (che esiste a questo punto)
        return (empty($column)) ? $this->getMethodInterface()->getToken(0) : $column;
    }

    /**
     * @inheritDoc
     */
    abstract public function getIuvs(): array|null;

    /**
     * @inheritDoc
     */
    abstract public function getPaEmittenti(): array|null;

    /**
     * @inheritDoc
     */
    abstract public function getCcps(): array|null;

    /**
     * Restituisce il psp dell'evento. Sarà la classe che implementa la AbstractEvent a decidere se usare l'evento o il payload
     * @return string|null
     */
    public function getPsp(): string|null
    {
        $column = $this->getColumn('psp');
        return (empty($column)) ? $this->getMethodInterface()->getPsp() : $column;
    }

    /**
     * Restituisce la stazione dell'evento. Sarà la classe che implementa la AbstractEvent a decidere se usare l'evento o il payload
     * @return string|null
     */
    public function getStazione(): string|null
    {
        $column = $this->getColumn('stazione');
        return (empty($column)) ? $this->getMethodInterface()->getStazione() : $column;
    }


    public function getCanale(): string|null
    {
        $column = $this->getColumn('canale');
        return (empty($column)) ? $this->getMethodInterface()->getCanale() : $column;
    }


    public function getBrokerPa(): string|null
    {
        // se il campo stazione è vuoto, allora chiedo al payload
        // altrimenti prendo il campo stazione e me lo splitto
        if (empty($this->getStazione()))
        {
            return $this->getMethodInterface()->getBrokerPa();
        }
        $stazione = explode('_', $this->getStazione(), 2);
        return $stazione[0]; // ricavo il broker pa splittando la stazione
    }


    public function getBrokerPsp(): string|null
    {
        if (empty($this->getCanale()))
        {
            return $this->getMethodInterface()->getCanale();
        }
        $canale = explode('_', $this->getCanale(), 2);
        return $canale[0];
    }


    /**
     * @inheritDoc
     */
    public function getIdCarrello(): string|null
    {
        return null;
    }
    /**
     * @inheritDoc
     */
    abstract public function transaction(int $index = 0): Transaction|null;


    abstract public function transactionDetails(int $transfer, int $index = 0): TransactionDetails|null;


    abstract public function workflowEvent(int $index = 0): Workflow|null;

    /**
     * @inheritDoc
     */
    abstract public function getMethodInterface(): MethodInterface;


    public function getEventRowInstance(): TransactionRe
    {
        return $this->instance;
    }


    public function isCartEvent(): bool
    {
        return $this->isCart;
    }


    public function isValidPayload(): bool
    {
        $payload = $this->getPayload();
        if ($this->typePayload == 'xml')
        {
            libxml_use_internal_errors(true);
            simplexml_load_string($payload);
            $errors = libxml_get_errors();
            libxml_clear_errors();
            return empty($errors);
        }
        if ($this->typePayload == 'json')
        {
            return $this->getMethodInterface()->isValidPayload();
            return json_last_error() === JSON_ERROR_NONE;
        }
        return false;

    }
}