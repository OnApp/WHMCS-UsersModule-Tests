<?php

$I->wantTo( 'add client' );

$I->amOnPage( '/admin/clientsadd.php' );
$I->see( 'Add New Client' );

$I->fillField( 'firstname', 'Codeception' );
$I->fillField( 'lastname', 'User' );
$I->fillField( 'companyname', 'OnApp' );
$I->fillField( 'email', $server[ 'onappusers' ][ 'email' ] );
$I->fillField( 'password', '123321' );
$I->uncheckOption( 'input[name=sendemail]' );
$I->click( 'Add Client' );
$I->see( 'Clients Profile', 'h1' );

$clientID = $I->grabValueFrom( 'userid' );
$I->comment( 'client ID: ' . $clientID );