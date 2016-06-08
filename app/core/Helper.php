<?php

namespace app\core;

class Helper
{
    /**
     * DESC
     *
     * @param string $sourceFile
     *
     * @return mixed
     * @throws \Exception
     *
     * @author Ibraheem Abu Kaff <eng.ibraheemabukaff@gmail.com>
     *
     */
    public static function readTicketsAsArray($sourceFile = '')
    {
        if (empty($sourceFile)) {
            throw new \Exception('Please Provide a ticket source file');
        }
        $jsonFile = fopen($sourceFile, 'r');
        if (!$jsonFile) {
            throw new \Exception('Error when loading the file');
        }
        $tickets = fread($jsonFile, filesize($sourceFile));
        fclose($jsonFile);

        return json_decode($tickets, true);

    }

}