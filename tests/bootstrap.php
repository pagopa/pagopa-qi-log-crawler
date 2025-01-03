<?php

require_once './vendor/autoload.php';
$data = [
    'notice_id' => '',
    'iuv' => '',
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




