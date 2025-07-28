<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use IteratorAggregate;
use Override;
use Traversable;

/**
 * @implements IteratorAggregate<int, Role>
 */
final readonly class Audience implements IteratorAggregate
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
    public function getIterator(): Traversable
    {
        return $this->roles;
    }
}
