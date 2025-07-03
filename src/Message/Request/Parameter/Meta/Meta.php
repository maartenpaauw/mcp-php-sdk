<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter\Meta;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Parameter\Parameter;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProgressToken;

final readonly class Meta implements Parameter
{
    private array $entries;

    public function __construct(
        private ?ProgressToken $progressToken = null,
        Entry ...$entries,
    ) {
        $this->entries = $entries;
    }

    #[JsonRpc\Parameter]
    public function progressToken(): ?ProgressToken
    {
        return $this->progressToken;
    }
}
