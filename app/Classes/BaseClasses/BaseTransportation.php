<?php

namespace app\Classes\BaseClasses;

abstract class BaseTransportation implements BaseInterface
{
    protected $values = ['from', 'to', 'seatNumber', 'transportation'];

    public function __get($key)
    {
        return $this->values[$key];
    }

    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

}
