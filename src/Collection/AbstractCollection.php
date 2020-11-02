<?php

declare(strict_types=1);

namespace Primitives\Collection;

use Closure;
use Generator;
use function Funktions\loop;
use function Funktions\reject;

final class AbstractCollection implements CollectionInterface
{
    private array $items;

    /**
     * Constructor
     */
    final public function __construct (...$items = [])
    {
        $this->items = loop(
            $items,
            fn ($item) => $this->validate($item)
        );
    }

    /**
     * Verify if an appended item is of the good type
     *
     * @throws InvalidArgumentException
     */
    abstract protected function validate ($item): void;

    /**
     * Return a new collection with the appended items
     */
    public function with (...$items): self
    {
        return new self(
            ...loop(
                $items,
                fn ($item) => $this->validate($item)
            )
        );
    }

    /**
     * Filter unwanted items and return a new collection
     */
    public function without (Closure $filter)
    {
        return new self(
            reject($this->items, $filter)
        );
    }

    /**
     * Iterate over the items
     */
    public function items(): Generator
    {
        yield from $this->items;
    }
}
