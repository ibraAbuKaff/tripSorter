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
     * @param mixed $tickets
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;

        return $this;
    }

    public function sort()
    {
        $tickets       = $this->getTickets();
        $sortedTickets = [];
        for ($i = 0; $i < count($tickets); $i++) {
            for ($j = 0; $j < count($tickets); $j++) {
                if ($i == $j) {
                    continue;
                }
                if ($tickets[$i]->{Constants::TO} == $tickets[$j]->{Constants::FROM}) {
                    break;
                } else {
                    $lastTicket      = $tickets[$j];
                    $sortedTickets[] = $lastTicket;
                    foreach ($tickets as $key => $ticket) {
                        if ($lastTicket->{Constants::FROM} == $ticket->{Constants::TO}) {
                            $sortedTickets[] = $ticket;
                            unset($tickets[$key]);
                            $tickets = array_values($tickets);
                        }
                    }
                    break;
                }
            }

        }

        $this->sortedTickets = array_reverse($sortedTickets);

        return $this;
    }

    public function printSortedTickets()
    {
        $t = '';
        foreach ($this->sortedTickets as $st) {
            $t .= $st->getText() . "\\n";
        }

        return $t;
    }
}