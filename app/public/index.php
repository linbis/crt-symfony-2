<?php

include dirname(__DIR__) . '/vendor/autoload.php';

try {
    $app = \App\Kernel::getInstance();
    $app->run();
} catch (\App\Exceptions\HttpException $exception) {
    http_response_code($exception->getCode());
    echo $exception->getMessage();

    error_log(
        $exception->getMessage()
    );
} catch (\Exception $exception) {
    error_log(
        $exception->getMessage()
    );
}
