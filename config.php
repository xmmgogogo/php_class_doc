<?php

spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

register_shutdown_function(function(){
    echo 'Script executed with success', PHP_EOL;
});

// error handler function
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting, so let it fall
        // through to the standard PHP error handler
        return false;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Unknown error type: [$errno] $errstr<br />\n";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

function exception_handler($exception) {
  echo "exception_handler -> Uncaught exception: " , json_encode([
      $exception->getFile(), 
      $exception->getLine(),
      $exception->getCode(), 
      $exception->getMessage()]
      ), "\n";
}


set_error_handler("myErrorHandler");
set_exception_handler('exception_handler');




