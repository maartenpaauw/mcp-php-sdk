<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter\Meta;

use InvalidArgumentException;
use JsonSerializable;
use Override;
use Stringable;

final readonly class Key implements JsonSerializable, Stringable
{
    /**
     * @param non-empty-string $value
     */
    public function __construct(
        private string $value,
    ) {
        $pattern = '/^(?:(?:[a-zA-Z](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\/)?[a-zA-Z0-9](?:[a-zA-Z0-9._-]*[a-zA-Z0-9])?$/';

        if (preg_match($pattern, $this->value) === 0) {
            throw new InvalidArgumentException(message: "The given key [$this->value] is not a valid meta-key");
        }
    }

    /**
     * @return non-empty-string
     */
    #[Override]
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @return non-empty-string
     */
    #[Override]
    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
