<?php

declare(strict_types=1);

namespace Primitives;

use Closure;
use Generator;

interface CollectionInterface
{
    /**
     * Return a new collection with the appended items
     */
    public function with (...$items): self;

    /**
     * Filter unwanted items and return a new collection
     */
    public function without (Closure $filter): self;

    /**
     * Iterate over the items
     */
    public function items (): Generator;
}
