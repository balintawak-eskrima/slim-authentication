<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Slim\Factory\AppFactory;
use DI\Container;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;
use League\Plates\Engine;

use Acme\Actions\HomeAction;
use Acme\Middlewares\TotalTimeRenderHeaderMiddleware;
use Acme\Actions\RegisterUserAction;


/**
 * Initialize DI container
 */
$di = new Container();

$di->set('view', function(Container $di) {
    $view = new Engine(__DIR__ . "/../resources/views");
    return $view;
});

/**
 * create Application from DI container
 */
$app = AppFactory::createFromContainer($di);

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->addMiddleware(new TotalTimeRenderHeaderMiddleware());

// routes
$app->get('/', HomeAction::class);
$app->map(['GET', 'POST'], '/register', RegisterUserAction::class);


return $app;
