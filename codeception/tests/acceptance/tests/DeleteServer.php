<?php

$I->wantTo( 'delete server' );

$I->amOnPage( '/admin/configservers.php' );
$I->see( 'Servers', 'h1' );
$I->see( $serverName );

// delete server
$I->click( "//td/a[text()='" . $serverName . "']/parent::td/following-sibling::td[7]/a" );
$I->acceptPopup();

// delete group
$I->click( "//td[text()='" . $serverGroupName . "']/following-sibling::td[4]/a" );
$I->acceptPopup();
$I->dontSee( $serverGroupName );
$I->dontSee( $serverName );