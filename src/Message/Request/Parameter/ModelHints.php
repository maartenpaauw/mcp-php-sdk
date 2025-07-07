<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use Iterator;
use Override;

/**
 * @implements Iterator<int, ModelHint>
 */
final readonly class ModelHints implements Iterator
{
    /**
     * @var ArrayIterator<int, ModelHint>
     */
    private ArrayIterator $modelHints;

    public function __construct(
        ModelHint ...$modelHints,
    ) {
        $this->modelHints = new ArrayIterator(array: array_values(array: $modelHints));
    }

    #[Override]
    public function current(): ModelHint
    {
        return $this->modelHints->current();
    }

    #[Override]
    public function next(): void
    {
        $this->modelHints->next();
    }

    #[Override]
    public function key(): int | null
    {
        return $this->modelHints->key();
    }

    #[Override]
    public function valid(): bool
    {
        return $this->modelHints->valid();
    }

    #[Override]
    public function rewind(): void
    {
        $this->modelHints->rewind();
    }
}
