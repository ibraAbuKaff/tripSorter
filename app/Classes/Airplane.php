<?php
namespace app\Classes;

use app\Classes\BaseClasses\BaseTransportation;

class Airplane extends BaseTransportation
{
    public        $AirplaneValues = ['flightNr', 'gate', 'baggageCounter'];
    public static $text           = '###From %s Airport, take flight %s to %s. Gate %s, seat %s.Baggage drop at ticket counter %s.###';

    /**
     * Airplane constructor.
     */
    public function __construct()
    {
        $this->AirplaneValues = array_merge($this->AirplaneValues, $this->values);
    }

    /**
     * DESC
     *
     * @param $key
     *
     * @return mixed
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function __get($key)
    {
        return $this->AirplaneValues[$key];
    }

    /**
     * DESC
     *
     * @param $key
     * @param $value
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function __set($key, $value)
    {
        $this->AirplaneValues[$key] = $value;
    }

    /**
     * DESC
     *
     * @return string
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function getText()
    {
        return sprintf(static::$text, $this->AirplaneValues['from'], $this->AirplaneValues['flightNr'], $this->AirplaneValues['to'], $this->AirplaneValues['gate'], $this->AirplaneValues['seatNumber'], $this->AirplaneValues['baggageCounter']);
    }
}
