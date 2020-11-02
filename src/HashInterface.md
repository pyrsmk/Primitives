```php
interface HashInterface
{
    /**
     * Verify if the item is known in the hash
     *
     * @param <Type> $key
     * @return boolean
     */
    public function has(<Type> $key): bool;

    /**
     * Return a new hash with the appended items
     *
     * @param <Type> $key
     * @param <Type> $value
     * @return self
     */
    public function with(<Type> $key, <Type> $value): self;

    /**
     * Filter unwanted items and return a new hash
     *
     * @param Closure $filter
     * @return self
     */
    public function without(Closure $filter): self;

    /**
     * Retrieve an item
     *
     * @param <Type> $key
     * @return <Type>
     */
    public function item(<Type> $key);

    /**
     * Iterate over the items
     *
     * @return Generator
     */
    public function items(): Generator;
}
```
