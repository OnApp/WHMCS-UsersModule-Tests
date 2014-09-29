<?php

$I->wantTo( 'delete client' );

$I->amOnPage( '/admin/clientssummary.php?userid=' . $clientID );
$I->see( 'Clients Profile', 'h1' );

$I->click( ' Delete Clients Account' );
$I->acceptPopup();
$I->waitForText( 'Welcome Back' );

// reauth
include 'AdminLogin.php';