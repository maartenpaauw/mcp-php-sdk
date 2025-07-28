<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use IteratorAggregate;
use Override;
use Traversable;

/**
 * @implements IteratorAggregate<int, StopSequence>
 */
final readonly class StopSequences implements IteratorAggregate
{
    /**
     * @var ArrayIterator<int, StopSequence>
     */
    private ArrayIterator $stopSequences;

    public function __construct(
        StopSequence ...$stopSequences,
    ) {
        $this->stopSequences = new ArrayIterator(array: array_values(array: $stopSequences));
    }

    #[Override]
    public function getIterator(): Traversable
    {
        return $this->stopSequences;
    }
}
