<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientCapabilities;
use Maartenpaauw\Mcp\Message\Request\Parameter\Implementation;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProtocolVersion;
use Override;

final readonly class InitializeRequest extends BaseRequest implements Request
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
