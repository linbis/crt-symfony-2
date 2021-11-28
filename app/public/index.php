<?php

include dirname(__DIR__) . '/vendor/autoload.php';

try {
    $app = \App\Kernel::getInstance();
    $app->run();
} catch (\Exception $exception) {
    error_log(
        $exception->getMessage()
    );
}
