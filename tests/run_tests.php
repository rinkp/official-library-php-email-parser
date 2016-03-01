<?php

// run this as:
// php run_tests.php


// added a clear barrier between messages
function printBarrier()
{
    echo "\r\n";
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=";
    echo "\r\n";
}
// add in-message barrier
function printInMessageBarrier()
{
    echo "\r\n";
    echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -";
    echo "\r\n";
}
function printnl($message)
{
    echo "$message\r\n";
}

// include the PlancakeEmailParser class
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "PlancakeEmailParser.php");

// fetch all sample emails
$emails = glob(__DIR__ . DIRECTORY_SEPARATOR . "emails" . DIRECTORY_SEPARATOR . "*");

// start output with a barrier
printBarrier();

// after correction, getHTMLBody doesnt include barrier in output
foreach ($emails as $email) {
    printnl("Email $email");
    $emailParser = new PlancakeEmailParser(file_get_contents($email));
    printnl("subject: " . $emailParser->getSubject());
    printInMessageBarrier();
    printnl("body: " . $emailParser->getBody());
    printInMessageBarrier();
    printnl("plain body: " . $emailParser->getPlainBody());
    printInMessageBarrier();
    printnl("html body: " . $emailParser->getHTMLBody());
    printBarrier();
}
