<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientCapabilities;
use Maartenpaauw\Mcp\Message\Request\Parameter\Implementation;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProtocolVersion;

#[JsonRpc\Method(Method::Initialize)]
final readonly class InitializeRequest implements Request
{
    public function __construct(
        private ProtocolVersion $protocolVersion,
        private ClientCapabilities $clientCapabilities,
        private Implementation $clientInformation,
    ) {}

    #[JsonRpc\Parameter]
    public function protocolVersion(): ProtocolVersion
    {
        return $this->protocolVersion;
    }

    #[JsonRpc\Parameter('capabilities')]
    public function clientCapabilities(): ClientCapabilities
    {
        return $this->clientCapabilities;
    }

    #[JsonRpc\Parameter(alias: 'clientInfo')]
    public function clientInformation(): Implementation
    {
        return $this->clientInformation;
    }
}
