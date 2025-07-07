<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use Iterator;
use Override;

/**
 * @implements Iterator<int, SamplingMessage>
 */
final readonly class SamplingMessages implements Iterator
{
    /**
     * @var ArrayIterator<int, SamplingMessage>
     */
    private ArrayIterator $samplingMessages;

    public function __construct(
        SamplingMessage ...$samplingMessages,
    ) {
        $this->samplingMessages = new ArrayIterator(array: array_values(array: $samplingMessages));
    }

    #[Override]
    public function current(): SamplingMessage
    {
        return $this->samplingMessages->current();
    }

    #[Override]
    public function next(): void
    {
        $this->samplingMessages->next();
    }

    #[Override]
    public function key(): int | null
    {
        return $this->samplingMessages->key();
    }

    #[Override]
    public function valid(): bool
    {
        return $this->samplingMessages->valid();
    }

    #[Override]
    public function rewind(): void
    {
        $this->samplingMessages->rewind();
    }
}
