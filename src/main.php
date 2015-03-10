<?php
require_once "vendor/autoload.php";

use JonnyW\PhantomJs\Client;
use JonnyW\PhantomJs\DependencyInjection\ServiceContainer;

$serviceContainer = ServiceContainer::getInstance();

$client = Client::getInstance();
$client->setPhantomJs('bin/phantomjs');
$url = 'http://en.3.boardgamearena.com/throughtheages?table=12820944';

/**
 * @see JonnyW\PhantomJs\Message\Request
 *
 */
$request = $client->getMessageFactory()->createRequest();
$request->setMethod('GET');
$request->setUrl($url);

/**
 *  * @see JonnyW\PhantomJs\Message\Response
 *   * */
$response = $client->getMessageFactory()->createResponse();

// Send the request
$client->send($request, $response);
//
preg_match('/progression">(\d{1,2})/', $response->getContent(), $coincidencias, PREG_OFFSET_CAPTURE, 3);

echo $coincidencias[1][0];
