<?php
namespace app\Classes;

use app\Classes\BaseClasses\BaseTransportation;

class Train extends BaseTransportation
{
    public        $TrainValues = ['trainNr'];
    public static $text        = 'Take train %s from %s to %s. Sit in seat %s';

    public function __construct()
    {
        $this->TrainValues = array_merge($this->TrainValues, $this->values);
    }


    public function __get($key)
    {
        return $this->TrainValues[$key];
    }

    public function __set($key, $value)
    {
        $this->TrainValues[$key] = $value;
    }

    public function getText()
    {
        return sprintf(static::$text, $this->TrainValues['trainNr'], $this->TrainValues['from'], $this->TrainValues['to'], $this->TrainValues['seatNumber']);
    }
}
