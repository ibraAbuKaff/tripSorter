<?php
namespace app\Classes;

use app\Classes\BaseClasses\BaseTransportation;

class Airplane extends BaseTransportation
{
    public        $AirplaneValues = ['flightNr', 'gate', 'baggageCounter'];
    public static $text           = 'From %s Airport, take flight %s to %s. Gate %s, seat %s.Baggage drop at ticket counter %s.';

    public function __construct()
    {
        $this->AirplaneValues = array_merge($this->AirplaneValues, $this->values);
    }

    public function __get($key)
    {
        return $this->AirplaneValues[$key];
    }

    public function __set($key, $value)
    {
        $this->AirplaneValues[$key] = $value;
    }

    public function getText()
    {
        return sprintf(static::$text, $this->AirplaneValues['from'], $this->AirplaneValues['flightNr'], $this->AirplaneValues['to'], $this->AirplaneValues['gate'], $this->AirplaneValues['seatNumber'], $this->AirplaneValues['baggageCounter']);
    }
}
