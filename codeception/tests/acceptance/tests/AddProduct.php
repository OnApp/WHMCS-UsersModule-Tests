<?php

// create product group
$I->wantTo( 'add product' );

$I->amOnPage( '/admin/configproducts.php' );
$I->dontSee( $productName );
$I->dontSee( $productGroupName );
$I->amOnPage( '/admin/configproducts.php?action=creategroup' );
$I->see( 'Create Group' );
$I->fillField( 'name', $productGroupName );
$I->click( 'Save Changes' );
$I->see( 'Products/Services', 'h1' );

// create product
$I->amOnPage( '/admin/configproducts.php?action=create' );
$I->see( 'Add New Product' );
$I->selectOption( '#Product-Type', 'other' );
$I->selectOption( 'gid', $productGroupName );
$I->fillField( 'productname', $productName );
$I->click( 'Continue >>' );
$I->see( 'Edit Product' );
$I->click( 'Module Settings' );
$I->lookForwardTo( 'Module Name' );
$I->selectOption( 'servertype', $server[ 'onappusers' ][ 'type' ] );
$I->click( 'Save Changes' );
$I->see( 'Changes Saved Successfully!' );
$I->selectOption( 'servergroup', $serverGroupName );
$I->click( 'Save Changes' );
$I->see( 'Changes Saved Successfully!' );

// configure product
$I->checkOption( "//text()[. = ' User']/preceding-sibling::input[1]" );
$I->selectOption( '//select[starts-with(@name, "tzs_packageconfigoption")]', 'Kyiv' );

$I->click( 'Save Changes' );
$I->see( 'Changes Saved Successfully!' );