<?php

namespace pagopa\sert\cache;

use DateTime;
class CacheObject
{

    /**
     * Contiene i dati di una posizione debitoria presenti nella cache
     * @var array
     */
    protected array $cached_data = [];

    /**
     * Costruttore
     * @param array $cache_data
     */
    public function __construct(array $cache_data)
    {
        $this->cached_data = $cache_data;
    }

    /**
     * Restituisce la data dell'ultimo aggiornamento
     * @return DateTime
     */
    public function getLastUpdate() : DateTime
    {
        return $this->cached_data['last_update'];
    }

    /**
     * Configura la data dell'ultimo aggiornamento
     * @param DateTime $last_update
     * @return void
     */
    public function setLastUpdate(DateTime $last_update) : void
    {
        $this->cached_data['last_update'] = $last_update->format('Y-m-d H:i:s');
    }

    /**
     * Restituisce la data in formato Y-m-d
     * @return string
     */
    public function getDateEvent() : string
    {
        return $this->cached_data['date_event'];
    }

    /**
     * Configura il campo date_event
     * @param DateTime $date_event
     * @return void
     */
    public function setDateEvent(DateTime $date_event) : void
    {
        $this->cached_data['date_event'] = $date_event->format('Y-m-d');
    }


    /**
     * Restituisce l'id del pagamento
     * @return string
     */
    public function getId() : string
    {
        return $this->cached_data['id'];
    }

    /**
     * Configura l'id del pagamento
     * @param string $id
     * @return void
     */
    public function setId(string $id) : void
    {
        $this->cached_data['id'] = $id;
    }


    /**
     * Restituisce il nav del pagamento
     * @return string
     */
    public function getNav() : string
    {
        return $this->cached_data['nav'];
    }

    public function setNav(string $nav) : void
    {
        $this->cached_data['nav'] = $nav;
    }

    public function getPaEmittente() : string
    {
        return $this->cached_data['pa_emittente'];
    }

    public function setPaEmittente(string $pa_emittente) : void
    {
        $this->cached_data['pa_emittente'] = $pa_emittente;
    }

    public function getIuv() : string
    {
        return $this->cached_data['iuv'];
    }

    public function setIuv(string $iuv) : void
    {
        $this->cached_data['iuv'] = $iuv;
    }

    public function getToken() : string
    {
        return $this->cached_data['token'];
    }

    public function setToken(string $token) : void
    {
        $this->cached_data['token'] = $token;
    }

    public function getIdCarrello() : string
    {
        return $this->cached_data['id_carrello'];
    }

    public function setIdCarrello(string $id_carrello) : void
    {
        $this->cached_data['id_carrello'] = $id_carrello;
    }

    public function getIsGpd() : bool
    {
        return $this->cached_data['is_gpd'];
    }

    public function setIsGpd(bool $is_gpd) : void
    {
        $this->cached_data['is_gpd'] = $is_gpd;
    }

    public function getIsDw() : bool
    {
        return $this->cached_data['is_dw'];
    }

    public function setIsDw(bool $is_dw) : void
    {
        $this->cached_data['is_dw'] = $is_dw;
    }

    public function getIsAca() : bool
    {
        return $this->cached_data['is_aca'];
    }

    public function setIsAca(bool $is_aca) : void
    {
        $this->cached_data['is_aca'] = $is_aca;
    }

    public function getOutcome() : ?string
    {
        return $this->cached_data['outcome'];
    }

    public function setOutcome(?string $outcome) : void
    {
        $this->cached_data['outcome'] = $outcome;
    }

    public function getAmount() : ?float
    {
        return $this->cached_data['amount'];
    }

    public function setAmount(?float $amount) : void
    {
        $this->cached_data['amount'] = $amount;
    }

    public function getPayedBy() : ?string
    {
        return $this->cached_data['payed_by'];
    }

    public function setPayedBy(?string $payed_by) : void
    {
        $this->cached_data['payed_by'] = $payed_by;
    }

    public function getPayedAt() : ?DateTime
    {
        return $this->cached_data['payed_at'];
    }

    public function setPayedAt(?DateTime $payed_at) : void
    {
        $this->cached_data['payed_at'] = $payed_at;
    }

    public function getPayedTouchpoint() : ?string
    {
        return $this->cached_data['payed_touchpoint'];
    }

    public function setPayedTouchpoint(?string $payed_touchpoint) : void
    {
        $this->cached_data['payed_touchpoint'] = $payed_touchpoint;
    }

    public function getPayedMethod() : ?string
    {
        return $this->cached_data['payed_method'];
    }

    public function setPayedMethod(?string $payed_method) : void
    {
        $this->cached_data['payed_method'] = $payed_method;
    }

    public function getPayedWith() : ?string
    {
        return $this->cached_data['payed_with'];
    }

    public function setPayedWith(?string $payed_with) : void
    {
        $this->cached_data['payed_with'] = $payed_with;
    }

    public function getDateWf() : string
    {
        return $this->cached_data['date_wf'];
    }

    public function setDateWf(string $date_wf) : void
    {
        $this->cached_data['date_wf'] = $date_wf;
    }


    public function getTransfers() : array
    {
        return $this->cached_data['transfers'];
    }

    public function setTransfers(array $transfers) : void
    {
        $this->cached_data['transfers'] = $transfers;
    }

    public function getMetadataPayment() : array
    {
        return $this->cached_data['metadata_payment'];
    }

    public function setMetadataPayment(array $metadata_payment) : void
    {
        $this->cached_data['metadata_payment'] = $metadata_payment;
    }

    public function getMetadataTransfer() : array
    {
        return $this->cached_data['metadata_transfer'];
    }

    public function setMetadataTransfer(array $metadata_transfer) : void
    {
        $this->cached_data['metadata_transfer'] = $metadata_transfer;
    }

    public function getMetadataPAdded() : bool
    {
        return $this->cached_data['metadata_p_added'];
    }

    public function setMetadataPAdded(bool $metadata_p_added) : void
    {
        $this->cached_data['metadata_p_added'] = $metadata_p_added;
    }

    public function getMetadataTAdded() : bool
    {
        return $this->cached_data['metadata_t_added'];
    }

    public function setMetadataTAdded(bool $metadata_t_added) : void
    {
        $this->cached_data['metadata_t_added'] = $metadata_t_added;
    }

    public function getExtraInfo() : array
    {
        return $this->cached_data['extra_info'];
    }

    public function setExtraInfo(array $extra_info) : void
    {
        $this->cached_data['extra_info'] = $extra_info;
    }

    public function getExtraInfoAdded() : bool
    {
        return $this->cached_data['extra_info_added'];
    }

    public function setExtraInfoAdded(bool $extra_info_added) : void
    {
        $this->cached_data['extra_info_added'] = $extra_info_added;
    }


    /**
     * Crea una istanza vuota per una nuova posizione debitoria
     * @return CacheObject
     */
    public static function createNewInstance() : CacheObject
    {
        $data = [
            'last_update'       => new DateTime(),
            'date_event'        => '',
            'id'                => '',
            'nav'               => '',
            'pa_emittente'      => '',
            'iuv'               => '',
            'token'             => '',
            'id_carrello'       => '',
            'is_gpd'            => false,
            'is_dw'             => false,
            'is_aca'            => false,
            'outcome'           => null,
            'amount'            => null,
            'payed_by'          => null,
            'payed_at'          => null,
            'payed_touchpoint'  => null,
            'payed_method'      => null,
            'payed_with'        => null,
            'date_wf'           => array(),
            'transfers'         => array(),
            'metadata_payment'  => array(),
            'metadata_transfer' => array(),
            'metadata_p_added'  => false,
            'metadata_t_added'  => false,
            'extra_info'        => array(),
            'extra_info_added'  => false,
        ];
        /**
         * transfers array
         * date-event
         * id
         * fk_position
         * iur
         * pa_transfer
         * id_transfer
         * iban
         * is_bollo
         *
         * metadata_payment
         * date-event
         * id
         * fk-position
         *
         * quando faccio un update, e metto a true metadata_p_added etc, cancello i valori , tanto è inutile tenerli in memoria
         */
        return new self($data);
    }

}