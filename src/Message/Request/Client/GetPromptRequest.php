<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Arguments;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;

final readonly class GetPromptRequest extends BaseRequest implements Request
{
    public function __construct(
        private Name $name,
        private ?Arguments $arguments = null,
    ) {}

    public function getName(): Name
    {
        return $this->name;
    }

    public function getArguments(): ?Arguments
    {
        return $this->arguments;
    }

    #[Override]
    public function getMethod(): Method
    {
        return Method::GetPrompts;
    }

    /**
     * @return array{
     *     name: Name,
     *     arguments?: Arguments,
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
