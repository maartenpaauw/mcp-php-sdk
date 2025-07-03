<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;
use Override;
use Stringable;

final readonly class LastModified implements Stringable, JsonSerializable
{
    public function __construct(
        private DateTimeImmutable $timestamp,
    ) {}

    #[Override]
    public function __toString(): string
    {
        return $this->format();
    }

    #[Override]
    public function jsonSerialize(): string
    {
        return $this->format();
    }

    private function format(): string
    {
        return $this->timestamp->format(format: DateTimeInterface::ATOM);
    }
}
