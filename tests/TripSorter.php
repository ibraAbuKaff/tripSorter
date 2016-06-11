<?php

class TripSorter extends PHPUnit_Framework_TestCase
{
    protected $stack;

    /**
     * Setup and load the tickets from fixtures
     *
     * @throws \Exception
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    protected function setUp()
    {
        $tickets = \app\core\Helper::readTicketsAsArray('tickets.json');

        $ticketObjects = [];
        foreach ($tickets[\app\core\Constants::TICKETS] as $ticket) {
            $ticketObjects[] = (new \app\Classes\TransportationTicketFactory())->setTicket($ticket)->create();
        }
        //retrieve the fixtures
        $this->stack = $ticketObjects;
    }

    /**
     * Testing the TripSorter according to loaded fixtures
     *
     * @throws \Exception
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public function testTripSorterAlgorithm()
    {
        $ticketsSorter      = new \app\Classes\TicketSorter();
        $expectedTicketSort = $ticketsSorter->setTickets($this->stack)->sortTickets()->getSortedTickets();
        $sortedTickets      = [
            0 => ['from' => 'Madrid', 'to' => 'Barcelona', 'transportationClass' => 'app\Classes\Train'],
            1 => ['from' => 'Barcelona', 'to' => 'Gerona', 'transportationClass' => 'app\Classes\Bus'],
            2 => ['from' => 'Gerona', 'to' => 'Stockholm', 'transportationClass' => 'app\Classes\Airplane'],
            3 => ['from' => 'Stockholm', 'to' => 'New York', 'transportationClass' => 'app\Classes\Airplane'],
        ];
        $index              = 0;
        foreach ($expectedTicketSort as $ticket) {
            $this->assertEquals($ticket->from, $sortedTickets[$index]['from']);
            $this->assertEquals($ticket->to, $sortedTickets[$index]['to']);
            $this->assertEquals(get_class($ticket), $sortedTickets[$index]['transportationClass']);
            $index++;
        }
    }
}
