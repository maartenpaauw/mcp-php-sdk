<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use IteratorAggregate;
use Maartenpaauw\Mcp\JsonRpc;
use Override;
use Traversable;

/**
 * @implements IteratorAggregate<int, Argument>
 */
#[JsonRpc\MapBy(key: [Argument::class => [Argument::class, 'name']], value: [Argument::class => [Argument::class, 'value']])]
final readonly class Arguments implements IteratorAggregate
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
    public function getIterator(): Traversable
    {
        return $this->arguments;
    }
}
