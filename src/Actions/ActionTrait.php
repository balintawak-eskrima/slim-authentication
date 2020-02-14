<?php


namespace Acme\Actions;


use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;

trait ActionTrait
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
}