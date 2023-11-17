<?php

namespace BlankFramework\MinimalKernel\Interface;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface MinimalControllerInterface
{
    public function get(ServerRequestInterface $request): ?ResponseInterface;
    public function post(ServerRequestInterface $request): ?ResponseInterface;
    public function put(ServerRequestInterface $request): ?ResponseInterface;
    public function patch(ServerRequestInterface $request): ?ResponseInterface;
    public function delete(ServerRequestInterface $request): ?ResponseInterface;
    public function connect(ServerRequestInterface $request): ?ResponseInterface;
    public function options(ServerRequestInterface $request): ?ResponseInterface;
    public function trace(ServerRequestInterface $request): ?ResponseInterface;
    public function head(ServerRequestInterface $request): ?ResponseInterface;
}
