<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use Iterator;
use Maartenpaauw\Mcp\JsonRpc;
use Override;

/**
 * @implements Iterator<int, Argument>
 */
#[JsonRpc\MapBy(key: [Argument::class => [Argument::class, 'name']], value: [Argument::class => [Argument::class, 'value']])]
final readonly class Arguments implements Iterator
{
    /**
     * @var ArrayIterator<int, Argument>
     */
    private ArrayIterator $arguments;

    public function __construct(
        Argument ...$arguments,
    )
    {
        $this->arguments = new ArrayIterator(array: array_values(array: $arguments));
    }

    #[Override]
    public function current(): Argument
    {
        return $this->arguments->current();
    }

    #[Override]
    public function next(): void
    {
        $this->arguments->next();
    }

    #[Override]
    public function key(): int | null
    {
        return $this->arguments->key();
    }

    #[Override]
    public function valid(): bool
    {
        return $this->arguments->valid();
    }

    #[Override]
    public function rewind(): void
    {
        $this->arguments->rewind();
    }
}
