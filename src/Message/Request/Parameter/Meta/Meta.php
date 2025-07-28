<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter\Meta;

use ArrayIterator;
use IteratorAggregate;
use Maartenpaauw\Mcp\JsonRpc;
use Override;
use Traversable;

/**
 * @implements IteratorAggregate<int, Entry>
 */
#[JsonRpc\MapBy(
    key: [Entry::class => [Entry::class, 'key']],
    value: [Entry::class => [Entry::class, 'value']],
)]
final readonly class Meta implements IteratorAggregate
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
    public function getIterator(): Traversable
    {
        return $this->entries;
    }
}
