<?php
namespace app\Classes;

use app\Classes\BaseClasses\BaseTransportation;

class Bus extends BaseTransportation
{
    public        $BusValues = [];
    public static $text      = 'Take the airport bus from %s to %s Airport. seat assignment: %s';

    public function __construct()
    {
        $this->BusValues = array_merge($this->BusValues, $this->values);
    }

    public function __get($key)
    {
        return $this->BusValues[$key];
    }

    public function __set($key, $value)
    {
        $this->BusValues[$key] = $value;
    }

    public function getText()
    {
        return sprintf(static::$text, $this->BusValues['from'], $this->BusValues['to'], $this->BusValues['seatNumber']);
    }
}
