<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\IncludeContext;
use Maartenpaauw\Mcp\Message\Request\Parameter\MaxTokens;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Meta;
use Maartenpaauw\Mcp\Message\Request\Parameter\Metadata\Metadata;
use Maartenpaauw\Mcp\Message\Request\Parameter\ModelPreferences;
use Maartenpaauw\Mcp\Message\Request\Parameter\SamplingMessages;
use Maartenpaauw\Mcp\Message\Request\Parameter\StopSequences;
use Maartenpaauw\Mcp\Message\Request\Parameter\SystemPrompt;
use Maartenpaauw\Mcp\Message\Request\Parameter\Temperature;

#[JsonRpc\Method(method: Method::CreateMessage)]
final readonly class CreateMessageRequest implements Request
{
    public function __construct(
        private SamplingMessages $samplingMessages,
        private ?ModelPreferences $modelPreferences = null,
        private ?SystemPrompt $systemPrompt = null,
        private ?IncludeContext $includeContext = null,
        private ?Temperature $temperature = null,
        private ?MaxTokens $maxTokens = null,
        private ?StopSequences $stopSequences = null,
        private ?Metadata $metadata = null,
    ) {}

    #[JsonRpc\Parameter(alias: 'messages')]
    public function samplingMessages(): SamplingMessages
    {
        return $this->samplingMessages;
    }

    #[JsonRpc\Parameter]
    public function modelPreferences(): ?ModelPreferences
    {
        return $this->modelPreferences;
    }

    #[JsonRpc\Parameter]
    public function systemPrompt(): ?SystemPrompt
    {
        return $this->systemPrompt;
    }

    #[JsonRpc\Parameter]
    public function includeContext(): ?IncludeContext
    {
        return $this->includeContext;
    }

    #[JsonRpc\Parameter]
    public function temperature(): ?Temperature
    {
        return $this->temperature;
    }

    #[JsonRpc\Parameter]
    public function maxTokens(): ?MaxTokens
    {
        return $this->maxTokens;
    }

    #[JsonRpc\Parameter]
    public function stopSequences(): ?StopSequences
    {
        return $this->stopSequences;
    }

    #[JsonRpc\Parameter]
    public function metadata(): ?Metadata
    {
        return $this->metadata;
    }
}
