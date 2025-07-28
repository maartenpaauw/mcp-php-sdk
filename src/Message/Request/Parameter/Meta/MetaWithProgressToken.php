<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter\Meta;

use AppendIterator;
use ArrayIterator;
use Exception;
use IteratorAggregate;
use Maartenpaauw\Mcp\JsonRpc\MapBy;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProgressToken;
use Override;
use Traversable;

/**
 * @implements IteratorAggregate<int, Entry>
 */
#[MapBy(
    key: [
        ProgressToken::class => 'progressToken',
        Entry::class => [Entry::class, 'key'],
    ],
    value: [
        ProgressToken::class => [ProgressToken::class, 'value'],
        Entry::class => [Entry::class, 'value'],
    ],
)]
final readonly class MetaWithProgressToken implements IteratorAggregate
{
    private ?ProgressToken $progressToken;

    /**
     * @var AppendIterator<int, ProgressToken | Entry>
     */
    private AppendIterator $iterator;

    /**
     * @throws Exception
     */
    public function __construct(
        null | ProgressToken $progressToken = null,
        private ?Meta $entries = null,
    )
    {
        $all = new AppendIterator();

        if ($progressToken !== null) {
            $this->progressToken = $progressToken;
            $all->append(iterator: new ArrayIterator(array: [$progressToken]));
        } else {
            $this->progressToken = null;
        }

        if ($entries !== null) {
            $all->append(iterator: new ArrayIterator(array: $entries->getIterator()));
        }

        $this->iterator = $all;
    }

    public function progressToken(): ?ProgressToken
    {
        return $this->progressToken;
    }

    public function entries(): Meta
    {
        return $this->entries;
    }

    #[Override]
    public function getIterator(): Traversable
    {
        return $this->iterator;
    }
}
