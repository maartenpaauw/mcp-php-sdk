<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use JsonException;
use JsonSerializable;
use Override;

final readonly class Unknown implements JsonSerializable
{
    public function __construct(
        private mixed $value,
    ) {
        try {
            json_encode(value: $this->value, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            throw new InvalidArgumentException(message: 'Provided value is not JSON serializable');
        }
    }

    #[Override]
    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
