<?php
namespace app\Classes;

use app\core\Constants;

class TicketSorter
{
    public $tickets;
    public $sortedTickets;

    /**
     * @return mixed
     */
    public function getSortedTickets()
    {
        return $this->sortedTickets;
    }

    /**
     * @param mixed $sortedTickets
     */
    public function setSortedTickets($sortedTickets)
    {
        $this->sortedTickets = $sortedTickets;
    }

    /**
     * TicketSorter constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * DESC
     *
     * @param $tickets
     *
     * @return $this
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;

        return $this;
    }

    /**
     * DESC
     *
     * @return $this
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function sortTickets()
    {
        $boardingCards = $this->getTickets();
        $sorted        = [array_pop($boardingCards)];

        while (count($boardingCards) > 0) {
            foreach ($boardingCards as $key => $card) {

                if (end($sorted)->{Constants::TO} === $card->{Constants::FROM}) {
                    array_push($sorted, $card);
                } elseif (reset($sorted)->{Constants::FROM} === $card->{Constants::TO}) {
                    array_unshift($sorted, $card);
                }

                unset($boardingCards[$key]);
            }
        }
        $this->sortedTickets = $sorted;

        return $this;
    }

    /**
     * DESC
     *
     * @return string
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function printSortedTickets()
    {
        $t = '';
        foreach ($this->sortedTickets as $st) {
            $t .= $st->getText();
        }

        return $t;
    }
}