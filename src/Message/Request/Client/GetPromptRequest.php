<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Override;

final readonly class GetPromptRequest extends BaseRequest implements Request
{
    public function __construct(
        private string $name,
        private ?array $arguments = null,
    ) {
        if ($this->name === '') {
            throw new InvalidArgumentException(message: 'Name cannot be empty');
        }

        foreach ($this->arguments as $key => $argument) {
            if (is_string($key) === false) {
                throw new InvalidArgumentException(message: 'Key must be a string');
            }

            if (is_string($argument) === false) {
                throw new InvalidArgumentException(message: 'Argument must be a string');
            }
        }
    }

    public function name(): string
    {
        return $this->name;
    }

    public function arguments(): array
    {
        return $this->arguments;
    }

    #[Override]
    public function method(): Method
    {
        return Method::GetPrompts;
    }

    #[Override]
    public function parameters(): array
    {
        $parameters = [
            'name' => $this->name,
        ];

        if ($this->arguments !== null || $this->arguments !== []) {
            $parameters['arguments'] = $this->arguments;
        }

        return $parameters;
    }
}
