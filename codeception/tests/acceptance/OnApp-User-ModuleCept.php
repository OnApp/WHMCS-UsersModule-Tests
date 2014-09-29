<?php

require '_bootstrap.php';

$serverName = $server[ 'onappusers' ][ 'name' ] . ' Server';
$serverGroupName = $serverName . ' Group';
$productName = $server[ 'onappusers' ][ 'name' ] . ' Product';
$productGroupName = $serverName . ' Group';

$I = new AcceptanceTester( $scenario );
$I->wantTo( 'perform actions and see result' );

include 'tests/AdminLogin.php';
include 'tests/AddServer.php';
include 'tests/AddProduct.php';
include 'tests/CreateClient.php';
include 'tests/TestUserModule.php';
include 'tests/DeleteClient.php';
include 'tests/DeleteServer.php';
include 'tests/DeleteProduct.php';