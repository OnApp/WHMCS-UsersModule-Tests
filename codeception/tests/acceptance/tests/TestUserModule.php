<?php

$I->wantTo( 'test module' );

// make order
$I->amOnPage( '/admin/ordersadd.php' );
$I->selectOption( 'userid', 'Codeception User' );
$I->selectOption( 'paymentmethod', 'Bank Transfer' );
$I->selectOption( '#pid0', $productName );
$I->fillField( '#domain0', $clientUID . '.codeception.test' );
$I->uncheckOption( '#adminorderconf' );
$I->uncheckOption( '#admingenerateinvoice' );
$I->uncheckOption( '#adminsendinvoice' );
$I->click( 'Submit Order' );
$I->see( 'Manage Orders' );
$I->click( 'Accept Order' );
$I->see( 'Order Accepted' );

$I->click( 'Product/Service' );
$I->wait( 1 );
$I->see( 'Clients Profile' );

// grab order ID
$orderID = $I->grabTextFrom( "//tr[1]/td[@class='fieldarea'][1]" );
$orderID = (int)$orderID;
$I->comment( 'order ID: ' . $orderID );

// create service
$I->click( 'Create' );
$I->wait( 0.3 );
$I->click( '#modcreate-Yes' );
$I->waitForText( 'Service Created Successfully' );

// check change password
$serviceID = $I->grabValueFrom( 'id' );
$I->comment( 'service ID: ' . $serviceID );
$I->amOnPage( '/admin/clientssummary.php?userid=' . $clientID );
$I->see( 'Clients Profile' );
$I->click( ' Login as Client' );
$I->lookForwardTo( 'Account Information' );
$I->amOnPage( '/clientarea.php?action=productdetails&id=' . $serviceID );
$I->lookForwardTo( $productName );
$I->click( "//form[@id='gotocpform']/button[@class='btn'][2]" );
$I->waitForText( 'Generate new service password' );

// suspend service
$I->amOnPage( '/admin/clientsservices.php?userid=' . $clientID );
$I->click( 'Suspend' );
$I->wait( 0.3 );
$I->click( '#modsuspend-Yes' );
$I->waitForText( 'Service Suspended Successfully' );

// unsuspend service
$I->click( 'Unsuspend' );
$I->wait( 0.3 );
$I->click( '#modunsuspend-Yes' );
$I->waitForText( 'Service Unsuspended Successfully' );

// terminate service
$I->click( 'Terminate' );
$I->wait( 0.3 );
$I->click( '#modterminate-Yes' );
$I->waitForText( 'Service Terminated Successfully' );

// delete product
$I->click( 'Delete' );
$I->wait( 0.3 );
$I->click( '#delete-Yes' );
$I->see( 'Clients Profile' );

// delete order
$I->amOnPage( '/admin/orders.php' );
$I->see( $orderID, 'a > b' );
$I->checkOption( "//input[@value='" . $orderID . "']" );
$I->click( 'Delete Order' );
$I->acceptPopup();

$I->see( 'Manage Orders' );
$I->dontSee( $orderID, 'a > b' );