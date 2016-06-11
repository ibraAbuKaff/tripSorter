# TripSorter

First of all run ``composer install`` as im using PHPUNIT test library, then ``composer dump-autoload -o``


Algorithm:

We have ticket.json, there we have an array of un-ordered tickets(input to the algorithm) to order it, just access the ``index.php``
and you will get the ordered tickets with full description of tickets for example:
Take train 49AE from Madrid to Barcelona. Sit in seat 45B

OR to run the algorithm from terminal:
```php index.php```


Test:


To run the test for it I used PHP UnitTest, go to your terminal and type :``vendor/bin/phpunit ./tests/TripSorter.php``
there is something called fixtures under tests folder , there we have a sample of un-ordered tickets.
 
 
