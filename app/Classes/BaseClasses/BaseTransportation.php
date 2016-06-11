<?php

namespace app\Classes\BaseClasses;

abstract class BaseTransportation implements BaseInterface
{
    protected $values = ['from', 'to', 'seatNumber', 'transportation'];

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
        return $this->values[$key];
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
        $this->values[$key] = $value;
    }

}
