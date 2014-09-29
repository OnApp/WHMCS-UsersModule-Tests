<?php

$I->wantTo( 'add server' );

$I->amOnPage( '/admin/configservers.php' );
$I->dontSee( $serverName );
$I->amOnPage( '/admin/configservers.php?action=manage' );
$I->see( 'Add Server', 'h2' );

// add server
$I->fillField( 'name', $serverName );
$I->fillField( 'ipaddress', $server[ 'onappusers' ][ 'host' ] );
$I->fillField( 'username', $server[ 'onappusers' ][ 'user' ] );
$I->fillField( 'password', $server[ 'onappusers' ][ 'pass' ] );
$I->selectOption( '#server-type', $server[ 'onappusers' ][ 'type' ] );
if( $server[ 'onappusers' ][ 'secure' ] ) {
    $I->checkOption( 'input[name=secure]' );
}
$I->click( 'Save Changes' );
$I->see( 'Server Added Successfully!' );

// create server group
$I->amOnPage( '/admin/configservers.php?action=managegroup' );
$I->see( 'Create New Group', 'h2' );
$I->fillField( 'name', $serverGroupName );
$I->selectOption( '#serverslist', $serverName );
$I->click( 'Add »' );
$I->click( 'Save Changes' );
$I->see( 'Servers', 'h1' );
$I->see( $serverGroupName );