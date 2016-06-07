<?php
namespace app\Classes;

use app\core\Constants;

class TransportationTicketFactory
{
    public $transportationType;
    public $ticket;
    public $transportationInstance = null;

    public function __construct()
    {

    }


    /**
     * @return string
     */
    public function getTransportationType()
    {
        return $this->transportationType;
    }

    /**
     * @return mixed
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    public function setTicket($ticket)
    {
        $this->ticket             = $ticket;
        $this->transportationType = isset($this->ticket[Constants::TRANSPORTATION]) ? $this->ticket[Constants::TRANSPORTATION] : '';

        return $this;
    }

    public function create()
    {
        switch ($this->transportationType) {
            case Constants::AIRPLANE:
                $this->transportationInstance = new Airplane();
                break;
            case Constants::BUS:
                $this->transportationInstance = new Bus();
                break;
            case Constants::TRAIN:
                $this->transportationInstance = new Train();
                break;
            default:
                throw new \Exception('Transportation Type is not available!');
        }

        $this->transportationInstance = $this->assignTicketDynamically();

        return $this->transportationInstance;
    }

    /**
     * @return null
     */
    public function getTransportationInstance()
    {
        return $this->transportationInstance;
    }

    /**
     * @param null $transportationInstance
     */
    public function setTransportationInstance($transportationInstance)
    {
        $this->transportationInstance = $transportationInstance;
    }

    public function assignTicketDynamically()
    {
        $transportationType = isset($this->ticket[Constants::TRANSPORTATION]) ? $this->ticket[Constants::TRANSPORTATION] : '';
        $from               = isset($this->ticket[Constants::FROM]) ? $this->ticket[Constants::FROM] : '';
        $to                 = isset($this->ticket[Constants::TO]) ? $this->ticket[Constants::TO] : '';
        $seatNumber         = isset($this->ticket[Constants::SEAT_NUMBER]) ? $this->ticket[Constants::SEAT_NUMBER] : '';

        $flightNr       = isset($this->ticket[Constants::FLIGHT_NR]) ? $this->ticket[Constants::FLIGHT_NR] : '';
        $gate           = isset($this->ticket[Constants::GATE]) ? $this->ticket[Constants::GATE] : '';
        $baggageCounter = isset($this->ticket[Constants::BAGGAGE_COUNTER]) ? $this->ticket[Constants::BAGGAGE_COUNTER] : '';

        $trainNr = isset($this->ticket[Constants::TRAIN_NR]) ? $this->ticket[Constants::TRAIN_NR] : '';

        $this->transportationInstance->{Constants::FROM}            = $from;
        $this->transportationInstance->{Constants::TO}              = $to;
        $this->transportationInstance->{Constants::TRANSPORTATION}  = $transportationType;
        $this->transportationInstance->{Constants::SEAT_NUMBER}     = $seatNumber;
        $this->transportationInstance->{Constants::GATE}            = $gate;
        $this->transportationInstance->{Constants::BAGGAGE_COUNTER} = $baggageCounter;
        $this->transportationInstance->{Constants::TRAIN_NR}        = $trainNr;
        $this->transportationInstance->{Constants::FLIGHT_NR}       = $flightNr;

        return $this->transportationInstance;
    }
}