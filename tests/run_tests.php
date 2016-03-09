<?php

// run this as:
// php run_tests.php


/**
 * Used to add a clear barrier between messages
 */
function printBarrier()
{
    echo "\r\n";
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\r\n";
    echo "\r\n";
}

/**
 * Used to add a barrier between different parts of the same message
 */
function printInMessageBarrier()
{
    echo "\r\n";
    echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\r\n";
    echo "\r\n";
}

/**
 * @param string $message
 */
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
    printnl("**Subject:**\r\n" . $emailParser->getSubject());
    printInMessageBarrier();
    printnl("**Body:**\r\n" . $emailParser->getBody());
    printInMessageBarrier();
    printnl("**Plain body:**\r\n" . $emailParser->getPlainBody());
    printInMessageBarrier();
    printnl("**HTML body:**\r\n" . $emailParser->getHTMLBody());
    printBarrier();
}
