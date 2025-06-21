<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Client\Request;

use Maartenpaauw\Mcp\ClientCapabilities;
use Maartenpaauw\Mcp\Implementation;
use Maartenpaauw\Mcp\Message\BaseRequest;
use Maartenpaauw\Mcp\Message\Method;
use Maartenpaauw\Mcp\ProtocolVersion;
use Override;

final readonly class InitializeRequest extends BaseRequest
{
    public function __construct(
        private ProtocolVersion $protocolVersion,
        private ClientCapabilities $clientCapabilities,
        private Implementation $clientInformation,
    ) {}

    public function protocolVersion(): ProtocolVersion
    {
        return $this->protocolVersion;
    }

    public function clientCapabilities(): ClientCapabilities
    {
        return $this->clientCapabilities;
    }

    public function clientInformation(): Implementation
    {
        return $this->clientInformation;
    }

    #[Override]
    public function method(): Method
    {
        return Method::Initialize;
    }

    #[Override]
    public function parameters(): array
    {
        return [
            'protocolVersion' => $this->protocolVersion,
            'capabilities' => $this->clientCapabilities,
            'clientInfo' => $this->clientInformation,
        ];
    }
}
