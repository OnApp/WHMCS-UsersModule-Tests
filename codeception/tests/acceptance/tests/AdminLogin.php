<?php

// login
$I->wantTo( 'login into admin area' );

$I->amOnPage( '/admin/login.php' );
$I->fillField( 'username', $WHMCS[ 'admin' ][ 'user' ] );
$I->fillField( 'password', $WHMCS[ 'admin' ][ 'pass' ] );
$I->click( 'Login' );
$I->see( 'Admin Summary' );