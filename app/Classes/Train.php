<?php
namespace app\Classes;

use app\Classes\BaseClasses\BaseTransportation;

class Train extends BaseTransportation
{
    public        $TrainValues = ['trainNr'];
    public static $text        = '##Take train %s from %s to %s. Sit in seat %s##';

    public function __construct()
    {
        $this->TrainValues = array_merge($this->TrainValues, $this->values);
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
        return $this->TrainValues[$key];
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
        $this->TrainValues[$key] = $value;
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
        return sprintf(static::$text, $this->TrainValues['trainNr'], $this->TrainValues['from'], $this->TrainValues['to'], $this->TrainValues['seatNumber']);
    }
}
