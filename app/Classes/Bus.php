<?php
namespace app\Classes;

use app\Classes\BaseClasses\BaseTransportation;

class Bus extends BaseTransportation
{
    public        $BusValues = [];
    public static $text      = '###Take the airport bus from %s to %s Airport. seat assignment: %s ###';

    /**
     * Bus constructor.
     */
    public function __construct()
    {
        $this->BusValues = array_merge($this->BusValues, $this->values);
    }

    /**
     * 
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
        return $this->BusValues[$key];
    }

    /**
     *
     *
     * @param $key
     * @param $value
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function __set($key, $value)
    {
        $this->BusValues[$key] = $value;
    }

    /**
     * Retrieve a related text we want to display after sorting the ticket
     *
     * @return string
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function getText()
    {
        return sprintf(static::$text, $this->BusValues['from'], $this->BusValues['to'], $this->BusValues['seatNumber']);
    }
}
