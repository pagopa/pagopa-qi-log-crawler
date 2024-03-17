<?php

namespace pagopa\database\sherlock;

use pagopa\database\SingleRow;
use Illuminate\Database\Capsule\Manager as Capsule;

class Transaction extends SingleRow
{

    /**
     * Chiavi primarie della tabella TRANSACTION
     * @var array|string[]
     */
    protected array $primary_keys = ['id', 'date_event'];

    /**
     * Solo date event è sufficiente per le insert
     * @var array
     */
    protected array $need_primary_keys = ['date_event'];


    public function __construct(\DateTime $date, array $eventData = [])
    {
        $table = sprintf(TRANSACTION_TABLE, $date->format('Y'));
        parent::__construct($table, $eventData, ['id', 'date_event'], ['date_event']);

    }


    /**
     * Configura la inserted timestamp
     * @param \DateTime $date
     * @return $this
     */
    public function setInsertedTimestamp(\DateTime $date) : self
    {
        $this->setNewColumnValue('inserted_timestamp', $date->format('Y-m-d H:i:s.v'));
        return $this;
    }

    /**
     * Configura lo IUV di questa transazione
     * @param string $iuv
     * @return self
     */
    public function setIuv(string $iuv) : self
    {
        $this->setNewColumnValue('iuv', $iuv);
        return $this;
    }


    /**
     * Configura la PA che gestisce l'avviso
     * @param string $pa
     * @return self
     */
    public function setPaEmittente(string $pa) : self
    {
        $this->setNewColumnValue('pa_emittente', $pa);
        return $this;
    }


    /**
     * Configura il token/ccp della transazione
     * @param string $token_ccp
     * @return $this
     */
    public function setTokenCcp(string $token_ccp) : self
    {
        $this->setNewColumnValue('token_ccp', $token_ccp);
        return $this;
    }

    /**
     * Configura il notice id della transazione
     * @param string $notice_id
     * @return self
     */
    public function setNoticeId(string $notice_id) : self
    {
        $this->setNewColumnValue('notice_id', $notice_id);
        return $this;
    }


    /**
     * Configura l'id del carrello della transazione
     * @param string $id_carrello
     * @return $this
     */
    public function setIdCarrello(string $id_carrello) : self
    {
        $this->setNewColumnValue('id_carrello', $id_carrello);
        return $this;
    }


    /**
     * Configura il broker pa
     * @param string $broker_pa
     * @return self
     */
    public function setBrokerPa(string $broker_pa) : self
    {
        $this->setNewColumnValue('id_broker_pa', $broker_pa);
        return $this;
    }

    /**
     * Configura il broker psp
     * @param string $broker_psp
     * @return self
     */
    public function setBrokerPsp(string $broker_psp) : self
    {
        $this->setNewColumnValue('id_broker_psp', $broker_psp);
        return $this;
    }

    /**
     * Configura l'id del PSP
     * @param string $psp
     * @return self
     */
    public function setPsp(string $psp) : self
    {
        $this->setNewColumnValue('id_psp', $psp);
        return $this;
    }

    /**
     * Configura la stazione usata per la transazione
     * @param string $stazione
     * @return self
     */
    public function setStazione(string $stazione) : self
    {
        $this->setNewColumnValue('stazione', $stazione);
        return $this;

    }

    /**
     * Configura il canale usato per la transazione
     * @param string $canale
     * @return $this
     */
    public function setCanale(string $canale) : self
    {
        $this->setNewColumnValue('canale', $canale);
        return $this;
    }

    /**
     * Configura l'importo della transazione
     * @param string $importo
     * @return $this
     */
    public function setImporto(string $importo) : self
    {
        $this->setNewColumnValue('importo', $importo);
        return $this;
    }

    /**
     * Configura l'esito della transazione
     * @param string $esito
     * @return $this
     */
    public function setEsito(string $esito) : self
    {
        $this->setNewColumnValue('esito', $esito);
        return $this;
    }

    /**
     * Configura il flag is_bollo a true/false
     * @param bool $is_bollo
     * @return $this
     */
    public function setBollo(bool $is_bollo) : self
    {
        $this->setNewColumnValue('is_bollo', $is_bollo);
        return $this;
    }


    /**
     * Cerca un tentativo
     * @param string $iuv
     * @param string $pa_emittente
     * @param string $token
     * @return Transaction[]|null
     */
    public static function searchByAttempt(string $iuv, string $pa_emittente, string $token) : array|null
    {
        $years = ['2023'];
        $results = [];
        foreach($years as $year)
        {
            $table = sprintf('transaction_%s', $year);
            $events = Capsule::table($table)
                ->where('iuv', '=', $iuv)
                ->where('pa_emittente', '=', $pa_emittente)
                ->where('token_ccp', '=', $token)
                ->get();
            foreach($events as $attempt)
            {
                $results[] = (array) $attempt;
            }
        }
        return (count($results) == 0) ? null : $results;
    }


    /**
     * Cerca un pagamento
     * @param string $iuv
     * @param string $pa_emittente
     * @return Transaction[]|null
     */
    public static function searchByPayment(string $iuv, string $pa_emittente) : array|null
    {
        $years = ['2023'];
        $results = [];
        foreach($years as $year)
        {
            $table = sprintf('transaction_%s', $year);
            $events = Capsule::table($table)
                ->where('iuv', '=', $iuv)
                ->where('pa_emittente', '=', $pa_emittente)
                ->get();
            foreach($events as $payment)
            {
                $results[] = (array) $payment;
            }
        }
        return (count($results) == 0) ? null : $results;
    }


    /**
     * Cerca un pagamento e/o tentativo in base al notice_id
     * @param string $notice_id
     * @param string|null $pa
     * @return Transaction[]|null
     */
    public static function searchByNoticeId(string $notice_id, string $pa = null) : array|null
    {
        // query sui 17 e 15 caratteri dell'avviso fornito
        // + where su campo notice_id = a $notice_id
        // + pa se indicata
        $years = ['2023'];
        $results = [];
        $iuv_17 = substr($notice_id,1,17);
        $iuv_15 = substr($notice_id, 3, 15);
        foreach($years as $year)
        {
            $table = sprintf('transaction_%s', $year);
            $events = Capsule::table($table)
                ->whereIn('iuv', [$iuv_17, $iuv_15])
                ->where('notice_id', '=', $notice_id);
            if (!is_null($pa))
            {
                $events->where('pa_emittente', '=', $pa);
            }
            $events->get();
            foreach($events as $payment)
            {
                $results[] = (array) $payment;
            }
        }
        return (count($results) == 0) ? null : $results;
    }
}