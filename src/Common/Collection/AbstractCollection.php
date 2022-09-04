<?php

declare(strict_types=1);

namespace App\Common\Collection;

abstract class AbstractCollection implements \Countable, \IteratorAggregate
{
    /**
     * @var mixed[]
     */
    protected array $elements = [];

    /**
     * @param mixed[] $elements
     * @throws \InvalidArgumentException
     */
    final public function __construct(array $elements = [])
    {
        $this->addElements($elements);
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function merge(AbstractCollection $collection): void
    {
        foreach ($collection as $element) {
            $this->add($element);
        }
    }

    /**
     * @param mixed[] $elements
     * @throws \InvalidArgumentException
     */
    public function addElements(array $elements): void
    {
        foreach ($elements as $element) {
            $this->add($element);
        }
    }

    /**
     * @param mixed $element
     * @throws \InvalidArgumentException
     */
    public function add(mixed $element): void
    {
        $this->assertElement($element);
        $this->elements[] = $element;
    }

    public function toArray(): array
    {
        return $this->elements;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->elements);
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return \count($this->elements);
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    /**
     * @param mixed $element
     * @return static
     * @throws \InvalidArgumentException
     */
    public static function fromSingleElement(mixed $element): self
    {
        return new static([$element]);
    }

    /**
     * @param mixed $element
     * @throws \InvalidArgumentException
     */
    protected function assertElement(mixed $element): void
    {
        if (!$this->supports($element)) {
            throw new \InvalidArgumentException(
                \sprintf('Unsupported element type provided for %s', \get_class($this))
            );
        }
    }

    /**
     * @param mixed $element
     */
    abstract protected function supports(mixed $element): bool;
}