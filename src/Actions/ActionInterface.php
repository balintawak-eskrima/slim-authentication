<?php


namespace Acme\Actions;

use DI\Container;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


interface ActionInterface
{
    public function __construct(Container $di);

    public function __invoke(Request $request, Response $response, array $args): Response;

    public function render(Response $response, string $template, array $data): Response;
}