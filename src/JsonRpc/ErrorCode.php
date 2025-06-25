<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

enum ErrorCode: int
{
    case ParseError = -32700;
    case InvalidRequest = -32600;
    case MethodNotFound = -32601;
    case InvalidParams = -32602;
    case InternalError = -32603;
}
