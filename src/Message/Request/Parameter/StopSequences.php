<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use Iterator;
use Override;

/**
 * @implements Iterator<int, StopSequence>
 */
final readonly class StopSequences implements Iterator
{
    private ArrayIterator $stopSequences;

    public function __construct(
        StopSequence ...$stopSequences,
    ) {
        $this->stopSequences = new ArrayIterator(array: $stopSequences);
    }

    #[Override]
    public function current(): StopSequence
    {
        return $this->stopSequences->current();
    }

    #[Override]
    public function next(): void
    {
        $this->stopSequences->next();
    }

    #[Override]
    public function key(): int | null
    {
        return $this->stopSequences->key();
    }

    #[Override]
    public function valid(): bool
    {
        return $this->stopSequences->valid();
    }

    #[Override]
    public function rewind(): void
    {
        $this->stopSequences->rewind();
    }
}
