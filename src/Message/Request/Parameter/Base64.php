<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use JsonSerializable;
use Override;
use Stringable;

final readonly class Base64 implements Stringable, JsonSerializable
{
    public function __construct(
        private string $value,
    ) {
        $decoded = base64_decode(string: $this->value, strict: true);

        if ($decoded === false) {
            throw new InvalidArgumentException(message: 'Provided value is not base64 encoded');
        }
    }

    #[Override]
    public function __toString(): string
    {
        return $this->value;
    }

    #[Override]
    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
