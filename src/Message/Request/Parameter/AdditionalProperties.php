<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use IteratorAggregate;
use Maartenpaauw\Mcp\JsonRpc;
use Override;
use Traversable;

/**
 * @implements IteratorAggregate<int, AdditionalProperty>
 */
#[JsonRpc\MapBy(
    key: [AdditionalProperty::class => [AdditionalProperty::class, 'name']],
    value: [AdditionalProperty::class => [AdditionalProperty::class, 'value']],
)]
final readonly class AdditionalProperties implements IteratorAggregate
{
    /**
     * @var ArrayIterator<int, AdditionalProperty>
     */
    private ArrayIterator $additionalProperties;

    public function __construct(
        AdditionalProperty ...$additionalProperties,
    ) {
        $this->additionalProperties = new ArrayIterator(array: array_values(array: $additionalProperties));
    }

    #[Override]
    public function getIterator(): Traversable
    {
        return $this->additionalProperties;
    }
}
