<?php


namespace Acme\Actions;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class HomeAction
{
    protected Container $di;

    public function __construct(Container $di)
    {
        $this->di = $di;
    }

    public function render(Response $response, string $template, array $data = []): Response
    {
        $view = $this->di->get('view');
        $response->getBody()->write($view->render($template, $data));
        return $response;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'home', ['title' => 'Home Page Content']);
    }
}