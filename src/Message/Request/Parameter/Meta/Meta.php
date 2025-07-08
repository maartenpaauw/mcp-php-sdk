<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter\Meta;

use AppendIterator;
use ArrayIterator;
use Iterator;
use Maartenpaauw\Mcp\JsonRpc\MapBy;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProgressToken;
use Override;

/**
 * @implements Iterator<int, Entry>
 */
#[MapBy(
    key: [
        ProgressToken::class => 'progressToken',
        Entry::class => [Entry::class, 'key'],
    ],
    value: [
        ProgressToken::class => [ProgressToken::class, 'value'],
        Entry::class => [Entry::class, 'value'],
    ],
)]
final readonly class Meta implements Iterator
{
    private ?ProgressToken $progressToken;

    /**
     * @var Iterator<int, ProgressToken | Entry>
     */
    private Iterator $iterator;

    public function __construct(
        null | ProgressToken | Entries $progressToken = null,
        private ?Entries $entries = null,
    )
    {
        $all = new AppendIterator();
        $all->append(iterator: $entries);

        if ($progressToken instanceof ProgressToken) {
            $this->progressToken = $progressToken;
            $all->append(iterator: new ArrayIterator(array: [$progressToken]));
        } else {
            $this->progressToken = null;
        }

        $this->iterator = $all;
    }

    public function progressToken(): ?ProgressToken
    {
        return $this->progressToken;
    }

    public function entries(): Entries
    {
        return $this->entries;
    }

    #[Override]
    public function current(): ProgressToken | Entry
    {
        return $this->iterator->current();
    }

    #[Override]
    public function next(): void
    {
        $this->iterator->next();
    }

    #[Override]
    public function key(): int
    {
        return $this->iterator->key();
    }

    #[Override]
    public function valid(): bool
    {
        return $this->iterator->valid();
    }

    #[Override]
    public function rewind(): void
    {
        $this->iterator->rewind();
    }
}
