<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use Iterator;
use Maartenpaauw\Mcp\JsonRpc\MapBy;
use Override;

/**
 * @implements Iterator<int, AdditionalProperty>
 */
#[MapBy(
    key: [AdditionalProperty::class => [AdditionalProperty::class, 'name']],
    value: [AdditionalProperty::class => [AdditionalProperty::class, 'value']],
)]
final readonly class Metadata implements Iterator
{
    private ArrayIterator $additionalProperties;

    public function __construct(
        AdditionalProperty ...$additionalProperty,
    ) {
        $this->additionalProperties = new ArrayIterator(array: $additionalProperty);
    }

    #[Override]
    public function current(): AdditionalProperty
    {
        return $this->additionalProperties->current();
    }

    #[Override]
    public function next(): void
    {
        $this->additionalProperties->next();
    }

    #[Override]
    public function key(): int
    {
        return $this->additionalProperties->key();
    }

    #[Override]
    public function valid(): bool
    {
        return $this->additionalProperties->valid();
    }

    #[Override]
    public function rewind(): void
    {
        $this->additionalProperties->rewind();
    }
}
