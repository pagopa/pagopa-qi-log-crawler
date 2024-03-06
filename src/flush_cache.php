<?php



$mem = new Memcached();
$connect = $mem->addServer('172.21.0.3',11211);



if (!$connect)
{
    echo "Non mi sono connesso al server memcache" .PHP_EOL;
    exit;
}
$mem->setOption(Memcached::OPT_COMPRESSION, true);


while (count($mem->getAllKeys()) > 0)
{
    echo "Ci sono " .count($mem->getAllKeys()) . " elementi , effettuo il flush " .PHP_EOL;
    sleep(2);
    $mem->flush();
}

echo "Flush terminato" .PHP_EOL;




//print_r($mem->get('s_de74ba12-a30f-4995-ad6e-1518e7e76a57'));
//print_r($mem->getAllKeys());

/*
 *  [3403] => s_d177c16b-99ea-4a47-8694-58c1463b7546
    [3404] => s_944fe0e7-a90f-42e9-91ce-4d369b9eb978
    [3405] => s_ddd5e8e0-97d4-4d6a-b5d1-72c50a00bf6c
    [3406] => s_cb69e0d4-29dc-408f-a99f-2046420d2e5d
    [3407] => s_d6039e7b-31b1-4b23-b64a-231a9165724d
    [3408] => s_dcc9d285-efc3-411c-bc8f-d4d0aed0b104
    [3409] => s_856190c4-af5b-4212-966d-e16f4d75e965
    [3410] => s_524b7df1-e4d0-43db-b302-64ab12dcf746
    [3411] => s_de74ba12-a30f-4995-ad6e-1518e7e76a57
    [3412] => s_1f8c70d6-3b53-4b60-ab49-ead6ea126090
    [3413] => s_37ab6c84-a98e-4daa-9b9d-361e8611f316
    [3414] => s_5c6cfc3d-e176-48dd-bb4e-a87684ed700e
    [3415] => s_efaf175c-21af-4c60-ba43-7d39674130c1

01001100094725684
 */