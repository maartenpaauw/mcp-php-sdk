<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use ArrayIterator;
use Iterator;
use Override;
use Maartenpaauw\Mcp\JsonRpc;

/**
 * @implements Iterator<int, AdditionalProperty>
 */
#[JsonRpc\MapBy(
    key: [AdditionalProperty::class => [AdditionalProperty::class, 'name']],
    value: [AdditionalProperty::class => [AdditionalProperty::class, 'value']],
)]
final readonly class AdditionalProperties implements Iterator
{
    /**
     * @var Iterator<int, AdditionalProperty>
     */
    private Iterator $additionalProperties;

    public function __construct(
        AdditionalProperty ...$additionalProperties,
    ) {
        $this->additionalProperties = new ArrayIterator(array: array_values(array: $additionalProperties));
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
