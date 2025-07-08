<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use InvalidArgumentException;
use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\HasMetadataWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;

#[JsonRpc\Method(Method::CallTool)]
final readonly class CallToolRequest implements Request
{
    use HasMetadataWithProgressToken;

    /**
     * @param Name $name
     * @param array<string, mixed>|null $arguments
     */
    public function __construct(
        private Name $name,
        private ?array $arguments = null,
        private ?MetaWithProgressToken $meta = null,
    ) {
        foreach ($this->arguments ?? [] as $argumentName => $argument) {
            if (is_string(value: $argumentName) === false) {
                throw new InvalidArgumentException(message: 'Argument name must be a string');
            }
        }
    }

    #[JsonRpc\Parameter]
    public function name(): Name
    {
        return $this->name;
    }

    /**
     * @return array<string, mixed>|null
     */
    #[JsonRpc\Parameter]
    public function arguments(): ?array
    {
        return $this->arguments;
    }
}
