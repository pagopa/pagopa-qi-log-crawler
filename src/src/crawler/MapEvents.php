<?php

namespace pagopa\crawler;

class MapEvents
{

    protected static array $map_events =
        [
            array(
                'type'      => 'activatePaymentNotice',
                'subtype'   => 'REQ',
                'id'        => 1
            ),
            array(
                'type'      => 'activatePaymentNotice',
                'subtype'   => 'RESP',
                'id'        => 2
            ),
            array(
                'type'      => 'nodoInviaCarrelloRPT',
                'subtype'   => 'REQ',
                'id'        => 3
            ),
            array(
                'type'      => 'nodoInviaCarrelloRPT',
                'subtype'   => 'RESP',
                'id'        => 4
            )
        ];


    public static function getMethodId(string $type, string $subtype) : int|null
    {
        foreach(self::$map_events as $event)
        {
            if (($event['type'] == $type) && ($event['subtype'] == $subtype))
            {
                return $event['id'];
            }
        }
        return null;
    }
}