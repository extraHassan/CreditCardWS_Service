<?php
require '../vendor/autoload.php';
use GuzzleHttp\Client;
require_once ('HandlerRequest.php');

$requestHandler = new HandlerRequest();

if(isset($_POST['username']) && isset($_POST['password']))
    $requestHandler->login($_POST['username'],$_POST['password']);

if (isset($_POST['validCard']))
    $requestHandler->validCard($_POST['validCard']);

if (isset($_POST['deleteCard']))
    $requestHandler->deleteCard($_POST['deleteCard']);

if(isset($_POST['cardNumber']) && isset($_POST['dateEnd']))
    $requestHandler->createCard('0',$_POST['cardNumber'],$_POST['dateEnd'],$_POST['ctrlNumber'],$_POST['cardType']);

