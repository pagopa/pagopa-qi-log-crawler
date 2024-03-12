<?php

$memcache = new \Memcached();
$memcache->addServer('172.17.0.3', 11211);

$memcache->append('a', '2');
$memcache->append('a', '3');

$memcache->set('b', 5);

print_r($memcache->get('YXR0ZW1wdF8yMDI0MDMxMF8wMTAwMDAwMDAwMDAwMDAxMV83Nzc3Nzc3Nzc3N190MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMQ=='));




die();

require_once './vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\Memcached;


const MEMCACHED_HOST = '172.17.0.3';

const MEMCACHED_PORT = "11211";
const DB_HOST = '172.17.0.5';
const DB_PORT = '5432';
const DB_DATABASE = 'postgres';
const DB_USERNAME = 'postgres';
const DB_PASSWORD = 'mock';



$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'pgsql',
    'host' => DB_HOST,
    'port' => DB_PORT,
    'database' => DB_DATABASE,
    'username' => DB_USERNAME,
    'password' => DB_PASSWORD,
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci'
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
$memcache = new Memcached();

//Capsule::statement('truncate table transaction_2024, transaction_details_2024, transaction_events_2024;');
//Capsule::statement('update transaction_re_2024 set state=:state', [':state' => 'TO_LOAD']);

$a = new \pagopa\crawler\paymentlist\req\activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'REQ', $memcache);
$a->run();


$a = new \pagopa\crawler\paymentlist\resp\activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'RESP', $memcache);
$a->run();





die();

$payload = '
<soapenv:Envelope xmlns:common="http://pagopa-api.pagopa.gov.it/xsd/common-types/v1.0.0/" xmlns:nfp="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	<soapenv:Body>
		<nfp:activatePaymentNoticeRes>
			<outcome>OK</outcome>
			<totalAmount>183.85</totalAmount>
			<paymentDescription>ENEL ENERGIA/NUMDOC=4355425863/DATADOC=08.08.2023/AVVISO=304100435542586389/IMPORTO=183,85/</paymentDescription>
			<fiscalCodePA>06655971007</fiscalCodePA>
			<companyName>Enel Energia S.p.A.</companyName>
			<paymentToken>0a8ef4f0194f4886942cbc8da8fdbe04</paymentToken>
			<transferList>
				<transfer>
					<idTransfer>1</idTransfer>
					<transferAmount>183.85</transferAmount>
					<fiscalCodePA>06655971007</fiscalCodePA>
					<IBAN>IT18U0306909400100000009138</IBAN>
					<remittanceInformation>/RFB/04100435542586389/TXT/ENEL ENERGIA/NUMDOC=4355425863/DATADOC=08.08.2023/AVVISO=304100435542586389/IMPORTO=183,85/</remittanceInformation>
				</transfer>
			</transferList>
			<creditorReferenceId>04100435542586389</creditorReferenceId>
		</nfp:activatePaymentNoticeRes>
	</soapenv:Body>
</soapenv:Envelope>';


$xml = new XMLReader();
$xml->XML($payload);
while($xml->read())
{
    if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'transferList'))
    {
        echo $xml->readOuterXml();
    }
}


die();

require_once './vendor/autoload.php';


const MEMCACHED_HOST    =   '172.21.0.3';
const MEMCACHED_PORT    =   11211;


$memcached = new Memcached();
$memcached->addServer(MEMCACHED_HOST,MEMCACHED_PORT);


print_r($memcached->getStats());






die();
$instance = new \pagopa\crawler\SingleRow('test_table');
$r = new ReflectionClass($instance);

$property = $r->getProperty('primary_keys');
$property->setValue($instance, ['pk_need']);

print_r($instance->getPrimaryKeys());








die();
const MEMCACHED_HOST    =   '172.21.0.4';
const MEMCACHED_PORT    =   11211;


$memcached = new Memcached();
$memcached->addServer(MEMCACHED_HOST,MEMCACHED_PORT);

$data = [
    'prima chiave'
];

$memcached->set('test_chiave', $data, (time() + 5));

sleep(3);

print_r($memcached->get('test_chiave'));

echo PHP_EOL;
echo "adesso aggiorno la chiave e metto altri 5 secondi";
$data[] = 'seconda chiave';
$memcached->set('test_chiave', $data, (time() + 5));
echo PHP_EOL;
sleep(3);

print_r($memcached->get('test_chiave'));








die();

$a = [
    'ch' => 5,
    'cp' => 6
];

$b = (object) $a;

echo $b->ch;
echo PHP_EOL;
echo $b->cp;
echo PHP_EOL;




die();
$f1 = false;
$f2 = false;

$a = 4;
$t1 = 6;


$b = 5;
$t2 = 6;


if (($f1 = ($a == $t1)) || ($f2 = ($b == $t2)))
{
    echo "IO QUI CI ENTRO SEMPRE" .PHP_EOL;
}


echo $a ." == " .$t1 ." , f1 => " .var_dump($f1);
echo PHP_EOL;
echo $b ." == " .$t2 ." , f2 => " .var_dump($f2);
echo PHP_EOL;

// nel ciclo ci entro solo se una delle due è vera
// se entro, e $f1 è true, allora è vera la prima condizione
// else, sicuramente è vera la seconda, altrimenti nel ciclo non entravo proprio
// quindi posso usare $f1 per capire quale delle due condizioni mi ha fatto entrare nel blocco


die();


$date = '2023-03-30';
$c = new DateTime($date);
$m = $c->format('m');
$d = $c->format('d');
$step = new DateInterval('P1D');

if ($d < 29)
{
    $c->setDate($c->format('Y'), $c->format('m'), 28);
}

while($m == $c->format('m'))
{
    $c->add($step);
}

echo $c->format('Y-m-d') .PHP_EOL;
$c->sub($step);
echo $c->format('Y-m-d');