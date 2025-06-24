<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Name;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;

final readonly class CallToolRequest extends BaseRequest implements Request
{
    public function __construct(
        private Name $name,
        private array $arguments = [],
    )
    {
        foreach ($this->arguments ?? [] as $argumentName => $argument) {
            if (is_string(value: $argumentName) === false) {
                throw new InvalidArgumentException(message: 'Argument name must be a string');
            }
        }
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function arguments(): array
    {
        return $this->arguments;
    }

    public function method(): Method
    {
        return Method::CallTool;
    }

    #[Override]
    public function parameters(): array
    {
        return array_filter(
            array: [
                'name' => $this->name,
                'arguments' => $this->arguments,
            ],
            callback: new ParameterFilter(),
        );
    }
}
