<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use IteratorAggregate;
use Override;
use Traversable;

/**
 * @implements IteratorAggregate<int, SamplingMessage>
 */
final readonly class SamplingMessages implements IteratorAggregate
{
    /**
     * @var ArrayIterator<int, SamplingMessage>
     */
    private ArrayIterator $samplingMessages;

    public function __construct(
        SamplingMessage ...$samplingMessages,
    ) {
        $this->samplingMessages = new ArrayIterator(array: array_values(array: $samplingMessages));
    }

    #[Override]
    public function getIterator(): Traversable
    {
        return $this->samplingMessages;
    }
}
