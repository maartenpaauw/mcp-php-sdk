<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Client\Request;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\BaseRequest;
use Maartenpaauw\Mcp\Message\Method;
use Override;

final readonly class CallToolRequest extends BaseRequest
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
