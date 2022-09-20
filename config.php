<?php
ini_set( "display_errors", true );
date_default_timezone_set("Africa/Cairo");
define( "DB_DSN", "mysql:host=localhost;dbname=skylaCms" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "Zxc01154564748." );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "ROUTER_PATH", "controller/router" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
require( TEMPLATE_PATH . "/index.php" );
require( ROUTER_PATH . "/index.php" );
// require( CLASS_PATH . "/Article.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  echo  $exception;
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
