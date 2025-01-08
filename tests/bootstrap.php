<?php

require_once './vendor/autoload.php';
$data = [
    'nav' => '',
    'iuv' => '',
    'creditor_reference_id' => '',
    'pa_emittente' => '',
    'broker_pa' => '',
    'broker_station' => '',
    'psp' => '',
    'broker_psp' => '',
    'broker_channel' => '',
    'token' => '',
    'ccp' => '',
    'amount' => '',
    'outcome' => '',
    'transfers' => array(),
    'fault' => array(),
    'date_event' => '',
    'session_id' => '',
    'session_id_original' => '',
    'unique_id' => '',
];

// ./vendor/bin/phpunit -c tests/phpunit.xml --testsuite ${TEST_SUITE}

global $twig;

$loader = new \Twig\Loader\FilesystemLoader('./tests/template');
$twig = new \Twig\Environment($loader);

function getPayload(string $method, string $request_type, array $data) : string
{
    global $twig;
    $template_file = sprintf('%s/%s.tpl', strtolower($request_type), $method);
    $xml_payload = $twig->render($template_file, $data);

    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    $xml->loadXML($xml_payload);
    return $xml->saveXML();
}


function getEvents(string $method, string $request_type, array $data) : array
{
    return [
        'INSERTED_TIMESTAMP'        => $data['date_event'],
        'TIPO_EVENTO'               => $method,
        'SOTTO_TIPO_EVENTO'         => strtolower($request_type),
        'NAV'                       => $data['nav'],
        'DOMINIO'                   => $data['pa_emittente'],
        'IUV'                       => $data['iuv'],
        'TOKEN'                     => $data['token'],
        'CCP'                       => $data['ccp'],
        'CREDITOR_REFERENCE_ID'     => $data['creditor_reference_id'],
        'SESSION_ID'                => $data['session_id'],
        'SESSION_ID_ORIGINAL'       => $data['session_id_original'],
        'PSP'                       => $data['psp'],
        'STAZIONE'                  => $data['broker_station'],
        'CANALE'                    => $data['broker_channel'],
        'UNIQUE_ID'                 => $data['unique_id'],
        'PAYLOAD'                   => base64_encode(getPayload($method, $request_type, $data))
    ];
}








