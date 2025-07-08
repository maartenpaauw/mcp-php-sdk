<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter\Meta;

use ArrayIterator;
use Iterator;
use Override;

/**
 * @implements Iterator<int, Entry>
 */
final readonly class Entries implements Iterator
{
    /**
     * @var ArrayIterator<int, Entry>
     */
    private ArrayIterator $entries;

    public function __construct(
        Entry ...$entries,
    ) {
        $this->entries = new ArrayIterator(array: $entries);
    }

    #[Override]
    public function current(): Entry
    {
        return $this->entries->current();
    }

    #[Override]
    public function next(): void
    {
        $this->entries->next();
    }

    #[Override]
    public function key(): int
    {
        return $this->entries->key();
    }

    #[Override]
    public function valid(): bool
    {
        return $this->entries->valid();
    }

    #[Override]
    public function rewind(): void
    {
        $this->entries->rewind();
    }
}
