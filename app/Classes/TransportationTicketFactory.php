<?php
namespace app\Classes;

use app\core\Constants;

/**
 * Class TransportationTicketFactory
 *
 * @package app\Classes
 */
class TransportationTicketFactory
{
    public $transportationType;
    public $ticket;
    public $transportationInstance = null;

    /**
     * TransportationTicketFactory constructor.
     */
    public function __construct()
    {

    }


    /**
     * Get Transportation Type
     *
     * @return mixed
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function getTransportationType()
    {
        return $this->transportationType;
    }

    /**
     * Retrieve a ticket
     *
     * @return mixed
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Set a ticket
     *
     * @param $ticket
     *
     * @return $this
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function setTicket($ticket)
    {
        $this->ticket             = $ticket;
        $this->transportationType = isset($this->ticket[Constants::TRANSPORTATION]) ? $this->ticket[Constants::TRANSPORTATION] : '';

        return $this;
    }

    /**
     * create a new instance according to the type of transportation using factory method
     *
     * @return null
     * @throws \Exception
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
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
     * Get Transportation Instance
     *
     * @return null
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function getTransportationInstance()
    {
        return $this->transportationInstance;
    }

    /**
     * Set Transportation Instance
     *
     * @param $transportationInstance
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function setTransportationInstance($transportationInstance)
    {
        $this->transportationInstance = $transportationInstance;
    }

    /**
     * Assign the ticket data dynamically
     *
     * @return null
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
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