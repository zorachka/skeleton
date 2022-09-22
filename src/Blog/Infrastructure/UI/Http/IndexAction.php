<?php

declare(strict_types=1);

namespace Project\Blog\Infrastructure\UI\Http;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zorachka\Application\View\View;

final class IndexAction implements RequestHandlerInterface
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->view->response('app/index');
    }
}
