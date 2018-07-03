<?php
require_once 'vendor/autoload.php';

$client = new \Contentful\Delivery\Client(
    'fbe475e962913918906fa0e6aaf08e6e418d94661da70793a547c137de052395',
    'ecpwaz1a70wb'
);


$entry = $client->getEntry('5rWcJ6BiM0S2e0g4gUciia');
echo $entry->getDescription();

?>