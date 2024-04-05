<?php

namespace pagopa\crawler;

use Illuminate\Database\Capsule\Manager as DB;

class MapEvents
{

    protected static array $map_events = array();

    public static function getMethodId(string $type, string $subtype) : int|null
    {
        foreach(self::$map_events as $event)
        {
            if (($event['tipo_evento'] == $type) && ($event['sotto_tipo_evento'] == $subtype))
            {
                return $event['fk_event'];
            }
        }
        return null;
    }


    public static function init() : void
    {
        $result = DB::table('mapped_events')->get();
        foreach($result as $r)
        {
            self::$map_events[] = (array) $r;
        }
    }
}