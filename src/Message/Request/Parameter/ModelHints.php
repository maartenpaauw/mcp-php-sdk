<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use IteratorAggregate;
use Override;
use Traversable;

/**
 * @implements IteratorAggregate<int, ModelHint>
 */
final readonly class ModelHints implements IteratorAggregate
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
    public function getIterator(): Traversable
    {
        return $this->modelHints;
    }
}
