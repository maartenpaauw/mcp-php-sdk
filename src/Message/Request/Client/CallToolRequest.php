<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Override;

final readonly class CallToolRequest extends BaseRequest implements Request
{
    public function __construct(
        private string $name,
        private array $arguments = [],
    ) {
        if ($this->name === '') {
            throw new InvalidArgumentException(message: 'The name cannot be empty');
        }

        foreach ($this->arguments as $key => $argument) {
            if (is_string($key) === false) {
                throw new InvalidArgumentException(message: 'The key must be a string');
            }
        }
    }

    public function method(): Method
    {
        return Method::CallTool;
    }

    #[Override]
    public function parameters(): array
    {
        return [
            'name' => $this->name,
            'arguments' => $this->arguments,
        ];
    }
}
