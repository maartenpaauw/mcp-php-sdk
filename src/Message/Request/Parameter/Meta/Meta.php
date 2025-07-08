<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter\Meta;

use ArrayIterator;
use Iterator;
use Override;
use Maartenpaauw\Mcp\JsonRpc;

/**
 * @implements Iterator<int, Entry>
 */
#[JsonRpc\MapBy(
    key: [Entry::class => [Entry::class, 'key']],
    value: [Entry::class => [Entry::class, 'value']],
)]
final readonly class Meta implements Iterator
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
