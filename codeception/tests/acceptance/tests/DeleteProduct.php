<?php

$I->wantTo( 'add product' );

$I->amOnPage( '/admin/configproducts.php' );
$I->see( 'Products/Services', 'h1' );

// delete product
$I->click( "//td[text()='" . $productName . "']/following-sibling::td[7]/a" );
$I->acceptPopup();

// delete product group
$I->click( "//td/div[text()=' " . $productGroupName . " ']/parent::td/parent::tr/td[3]/a" );
$I->acceptPopup();
$I->dontSee( $productGroupName );