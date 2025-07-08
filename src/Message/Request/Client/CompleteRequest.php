<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\HasMetadataWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Argument;
use Maartenpaauw\Mcp\Message\Request\Parameter\Context;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Parameter\PromptReference;
use Maartenpaauw\Mcp\Message\Request\Parameter\ResourceTemplateReference;

#[JsonRpc\Method(Method::Complete)]
final readonly class CompleteRequest implements Request
{
    use HasMetadataWithProgressToken;

    public function __construct(
        private PromptReference | ResourceTemplateReference $reference,
        private Argument $argument,
        private ?Context $context = null,
        private ?MetaWithProgressToken $meta = null,
    ) {}

    #[JsonRpc\Parameter(alias: 'ref')]
    public function reference(): PromptReference | ResourceTemplateReference
    {
        return $this->reference;
    }

    #[JsonRpc\Parameter]
    public function argument(): Argument
    {
        return $this->argument;
    }

    #[JsonRpc\Parameter]
    public function context(): ?Context
    {
        return $this->context;
    }
}
