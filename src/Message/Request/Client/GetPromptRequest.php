<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;

final readonly class GetPromptRequest extends BaseRequest implements Request
{
    public function __construct(
        private Name $name,
        private ?array $arguments = null,
    ) {
        foreach ($this->arguments as $key => $argument) {
            if (is_string($key) === false) {
                throw new InvalidArgumentException(message: 'Key must be a string');
            }

            if (is_string($argument) === false) {
                throw new InvalidArgumentException(message: 'Argument must be a string');
            }
        }
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    #[Override]
    public function getMethod(): Method
    {
        return Method::GetPrompts;
    }

    #[Override]
    public function getParameters(): array
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
