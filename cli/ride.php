<?php


require_once 'HTTP/Request2.php';

$passwords = Array(
    'wald',
    'echo',
    'test',
    'master'
);


foreach ($passwords as $password) {

    echo PHP_EOL;

    echo 'Trying password: ' . $password . PHP_EOL;

    $req = new HTTP_Request2('http://localhost/codeLink/ride/test/checklogin.php', HTTP_Request2::METHOD_POST);

    $req->addCookie('XDEBUG_SESSION','XDEBUG_ECLIPSE');

    $req->setHeader('User-Agent: godzilla');
    //$req->setHeader('Foo: Bar');


    $req->addPostParameter('myusername', 'lego');
    $req->addPostParameter('mypassword', $password);




    try {
        $response = $req->send();




        echo '-> Return Code: ' . $response->getStatus() . PHP_EOL;



        echo '-> ' . $response->getBody();

        echo PHP_EOL;



        /*
        if (200 == $response->getStatus()) {
            echo $response->getBody();
        } else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
        }
        */


    } catch (HTTP_Request2_Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}