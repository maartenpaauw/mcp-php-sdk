<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;

final readonly class CallToolRequest extends BaseRequest implements Request
{
    /**
     * @param Name $name
     * @param array<string, mixed>|null $arguments
     */
    public function __construct(
        private Name $name,
        private ?array $arguments = null,
    )
    {
        foreach ($this->arguments ?? [] as $argumentName => $argument) {
            if (is_string(value: $argumentName) === false) {
                throw new InvalidArgumentException(message: 'Argument name must be a string');
            }
        }
    }

    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getArguments(): ?array
    {
        return $this->arguments;
    }

    #[Override]
    public function getMethod(): Method
    {
        return Method::CallTool;
    }

    /**
     * @return array{
     *     name: Name,
     *     arguments?: array<string, mixed>
     * }
     */
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
