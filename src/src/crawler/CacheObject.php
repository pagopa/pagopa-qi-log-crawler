<?php

namespace pagopa\crawler;

class CacheObject
{

    protected array $cache_data;

    public function __construct(array $cache_data)
    {
        $this->cache_data = $cache_data;
    }

    /**
     * Crea una istanza vuota pronta per creare un oggetto da salvare in cache
     * @return self
     */
    public static function createInstance() : self
    {
        $cache_value    =   [
            'date_event'        =>  '',
            'id'                =>  '',
            'iuv'               =>  '',
            'pa_emittente'      =>  '',
            'token_ccp'         =>  '',
            'transfer_added'    =>  false,
            'esito'             =>  false,
            'amount_update'     =>  false,
            'transfer_list'     => array(),
            'm_payment'         => array(),
            'm_transfer'        => array(),
            'm_payment_added'   => false,
            'm_transfer_added'  => false,
            'date_wf'           => json_encode(array())
        ];
        return new self($cache_value);
    }

    /**
     * Elimina una chiave dalle info della cache
     * @param string $key
     * @return void
     */
    public function deleteKey(string $key) : void
    {
        if (array_key_exists($key, $this->cache_data))
        {
            unset($this->cache_data[$key]);
        }
    }

    /**
     * Restituisce una chiave dalle info della cache
     * @param string $key
     * @return mixed
     */
    public function getKey(string $key) : mixed
    {
        return (array_key_exists($key, $this->cache_data)) ? $this->cache_data[$key] : null;
    }

    /**
     * Configura una chiave nella lista cache
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setKey(string $key, mixed $value) : void
    {
        $this->cache_data[$key] = $value;
    }

    /**
     * Restituisce l'id dell'oggetto in cache
     * @return string
     */
    public function getId() : string
    {
        return $this->getKey('id');
    }

    /**
     * Configura l'id dell'oggetto in cache
     * @param string $id
     * @return void
     */
    public function setId(string $id) : void
    {
        $this->setKey('id', $id);
    }

    /**
     * Restituisce il date event dell'oggetto in cache
     * @return string
     */
    public function getDateEvent() : string
    {
        return $this->getKey('date_event');
    }

    /**
     * Configura il date event dell'oggetto in cache
     * @param string $date_event
     * @return void
     */
    public function setDateEvent(string $date_event) : void
    {
        $this->setKey('date_event', $date_event);
    }

    /**
     * Restituisce lo iuv dell'oggetto in cache
     * @return string
     */
    public function getIuv() : string
    {
        return $this->getKey('iuv');
    }

    /**
     * Configura lo iuv dell'oggetto in cache
     * @param string $iuv
     * @return void
     */
    public function setIuv(string $iuv) : void
    {
        $this->setKey('iuv', $iuv);
    }

    /**
     * Restituisce la pa emittente dell'oggetto in cache
     * @return string
     */
    public function getPaEmittente() : string
    {
        return $this->getKey('pa_emittente');
    }

    /**
     * Configura la pa emittente dell'oggetto in cache
     * @param string $pa
     * @return void
     */
    public function setPaEmittente(string $pa) : void
    {
        $this->setKey('pa_emittente', $pa);
    }

    /**
     * Restituisce il token dell'oggetto in cache
     * @return string
     */
    public function getToken() : string
    {
        return $this->getKey('token_ccp');
    }

    /**
     * Configura il token dell'oggetto in cache
     * @param string $token
     * @return void
     */
    public function setToken(string $token) : void
    {
        $this->setKey('token_ccp', $token);
    }

    /**
     * Restituisce true/false se i transfer sono già stati aggiunti
     * @return bool
     */
    public function getTransferAdded() : bool
    {
        return $this->getKey('transfer_added');
    }

    /**
     * Configura true/false per transfer_added nell'oggetto in cache
     * @param bool $transfer_added
     * @return void
     */
    public function setTransferAdded(bool $transfer_added) : void
    {
        $this->setKey('transfer_added', $transfer_added);
    }

    /**
     * Restituisce true/false se l'esito è stato già aggiornato
     * @return bool
     */
    public function getEsito() : bool
    {
        return $this->getKey('esito');
    }

    /**
     * Configura true/false sul campo esito dell'oggetto in cache
     * @param bool $esito
     * @return void
     */
    public function setEsito(bool $esito) : void
    {
        $this->setKey('esito', $esito);
    }

    /**
     * Restituisce true/false sul campo amount_update
     * @return bool
     */
    public function getAmountUpdate() : bool
    {
        return $this->getKey('amount_update');
    }

    /**
     * Configura true/false la chiave amount_update dell'oggetto in cache
     * @param bool $amount_update
     * @return void
     */
    public function setAmountUpdate(bool $amount_update) : void
    {
        $this->setKey('amount_update', $amount_update);
    }
    /**
     * Restituisce la lista dei transfer
     * @return array
     */
    public function getTransferList() : array
    {
        return $this->getKey('transfer_list');
    }

    /**
     * Configura la transfer list dell'oggetto in cache
     * @param array $transfer_list
     * @return void
     */
    public function setTransferList(array $transfer_list) : void
    {
        $this->setKey('transfer_list', $transfer_list);
    }

    /**
     * Restituisce il campo date_wf dell'oggetto in cache
     * @return string
     */
    public function getDateWf() : string
    {
        return $this->getKey('date_wf');
    }

    /**
     * Configura il campo date_wf dell'oggetto in cache
     * @param mixed $date_wf
     * @return void
     */
    public function setDateWf(mixed $date_wf) : void
    {
        $this->setKey('date_wf', $date_wf);
    }

    /**
     * Restituisce i metadata del payment dell'oggetto in cache
     * @return array
     */
    public function getMetadataPayment() : array
    {
        return $this->getKey('m_payment');
    }
    /**
     * Restituisce tutti i metadata del pagamento
     * @param array $metadata
     * @return void
     */
    public function setMetadataPayment(array $metadata) : void
    {
        $this->setKey('m_payment', $metadata);
    }

    /**
     * Restituisce true/false se i metadata del payment sono stati già aggiunti
     * @return bool
     */
    public function isMetadataPaymentAdded() : bool
    {
        return $this->getKey('m_payment_added');
    }

    /**
     * Configura il campo m_payment_added a true/false
     * @param bool $transfer_payment
     * @return void
     */
    public function setMetadataPaymentAdded(bool $transfer_payment) : void
    {
        $this->setKey('m_payment_added', $transfer_payment);
    }

    /**
     * Restituisce true/false se i metadata dei transfer sono stati aggiunti
     * @return bool
     */
    public function isMetadataTransferAdded() : bool
    {
        return $this->getKey('m_transfer_added');
    }

    /**
     * Configura true/false se i metadata dei transfer sono stati aggiunti
     * @param bool $transfer_list_metadata
     * @return void
     */
    public function setMetadataTransferAdded(bool $transfer_list_metadata) : void
    {
        $this->setKey('m_transfer_added', $transfer_list_metadata);
    }

    /**
     * Restituisce i metadata dei transfer nell'oggetto cache
     * @return array
     */
    public function getMetadataTransfer() : array
    {
        return $this->getKey('m_transfer');
    }

    /**
     * Configura i metadata dei transfer
     * @param array $transfer_list_metadata
     * @return void
     */
    public function setMetadataTransfer(array $transfer_list_metadata) : void
    {
        $this->setKey('m_transfer', $transfer_list_metadata);
    }

    public function getCacheData() : array
    {
        return $this->cache_data;
    }

}