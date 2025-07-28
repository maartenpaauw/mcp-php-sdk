<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use IteratorAggregate;
use Maartenpaauw\Mcp\JsonRpc\MapBy;
use Override;
use Traversable;

/**
 * @implements IteratorAggregate<int, AdditionalProperty>
 */
#[MapBy(
    key: [AdditionalProperty::class => [AdditionalProperty::class, 'name']],
    value: [AdditionalProperty::class => [AdditionalProperty::class, 'value']],
)]
final readonly class Metadata implements IteratorAggregate
{
    private ArrayIterator $additionalProperties;

    public function __construct(
        AdditionalProperty ...$additionalProperty,
    ) {
        $this->additionalProperties = new ArrayIterator(array: $additionalProperty);
    }

    #[Override]
    public function getIterator(): Traversable
    {
        return $this->additionalProperties;
    }
}
