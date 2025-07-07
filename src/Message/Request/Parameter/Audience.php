<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use Iterator;
use Override;

/**
 * @implements Iterator<int, Role>
 */
final readonly class Audience implements Iterator
{
    /**
     * @var ArrayIterator<int, Role>
     */
    private ArrayIterator $roles;

    public function __construct(Role ...$roles)
    {
        $this->roles = new ArrayIterator(array: array_values(array: $roles));
    }

    #[Override]
    public function current(): Role
    {
        return $this->roles->current();
    }

    #[Override]
    public function next(): void
    {
        $this->roles->next();
    }

    #[Override]
    public function key(): int | null
    {
        return $this->roles->key();
    }

    #[Override]
    public function valid(): bool
    {
        return $this->roles->valid();
    }

    #[Override]
    public function rewind(): void
    {
        $this->roles->rewind();
    }
}
