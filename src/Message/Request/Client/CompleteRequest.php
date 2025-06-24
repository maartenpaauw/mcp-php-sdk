<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Argument;
use Maartenpaauw\Mcp\Message\Request\Parameter\Context;
use Maartenpaauw\Mcp\Message\Request\Parameter\PromptReference;
use Maartenpaauw\Mcp\Message\Request\Parameter\ResourceTemplateReference;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;

final readonly class CompleteRequest extends BaseRequest implements Request
{
    public function __construct(
        private PromptReference | ResourceTemplateReference $reference,
        private Argument $argument,
        private ?Context $context = null,
    ) {}

    public function getReference(): PromptReference | ResourceTemplateReference
    {
        return $this->reference;
    }

    public function getArgument(): Argument
    {
        return $this->argument;
    }

    public function getContext(): ?Context
    {
        return $this->context;
    }

    #[Override]
    public function getMethod(): Method
    {
        return Method::Complete;
    }

    /**
     * @return array{
     *     ref: PromptReference | ResourceTemplateReference,
     *     argument: Argument,
     *     context?: Context
     * }
     */
    #[Override]
    public function getParameters(): array
    {
        return array_filter(
            array: [
                'ref' => $this->reference,
                'argument' => $this->argument,
                'context' => $this->context,
            ],
            callback: new ParameterFilter(),
        );
    }
}
