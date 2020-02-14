<?php


namespace Acme\Actions;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class RegisterUserAction implements ActionInterface
{
    use ActionTrait;

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, "register", ['title' => 'User Registration']);
    }
}