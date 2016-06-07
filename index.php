<?php

require_once('./vendor/autoload.php');
use \app\core\Helper;
use app\core\Constants;
use app\Classes\TransportationTicketFactory;
use \app\Classes\TicketSorter;

$tickets = Helper::readTicketsAsArray('tickets.json');

$ticketObjects = [];
foreach ($tickets[Constants::TICKETS] as $ticket) {
    $ticketObjects[] = (new TransportationTicketFactory())->setTicket($ticket)->create();
}

$ticketsSorter = new TicketSorter();
$sortedTickets = $ticketsSorter->setTickets($ticketObjects)->sort()->printSortedTickets();

echo $sortedTickets;

