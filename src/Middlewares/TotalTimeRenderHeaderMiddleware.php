<?php


namespace Acme\Middlewares;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;


class TotalTimeRenderHeaderMiddleware implements MiddlewareInterface
{
    public function process(Request $request, RequestHandler $handler): Response
    {
        $oldTime = new \DateTimeImmutable();
        $response = $handler->handle($request);
        $dateInterval = $oldTime->diff(new \DateTimeImmutable());
        $totalTimeMilliseconds = $dateInterval->f * 1000; // convert from micro to milli(seconds)
        return $response->withHeader('X-TimeRenderMilliseconds', $totalTimeMilliseconds);
    }
}


