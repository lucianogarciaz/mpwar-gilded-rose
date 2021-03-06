<?php

declare(strict_types=1);

namespace GildedRose;


abstract class Item
{
    const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    const BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    const AGEDBRIE = 'Aged Brie';
    const STANDARD = 'Standard';
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sell_in;

    /**
     * @var int
     */
    public $quality;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
    
    abstract public function update();

    public function increaseQuality(): void {
        if ($this->isLowerThanMaximumQuality()) {
            $this->quality = $this->quality + 1;
        }
    }

    public function decreaseSellIn():void
    {
        $this->sell_in = $this->sell_in - 1;
    }

    public function resetQuality(): void
    {
         $this->quality = 0;
    }

    public function decreaseQuality(): void
    {
        if ($this->isGreaterThanMinimumQuality()) {
            $this->quality = $this->quality - 1;
        }
    }


    public function isEarlyBird(): bool
    {
        return $this->sell_in < 11;
    }

    public function isLastDatesToSellIn(): bool
    {
        return $this->sell_in < 6;
    }

    public function isOverdue(): bool
    {
        return $this->sell_in < 0;
    }

    public function isGreaterThanMinimumQuality(): bool
    {
        return $this->quality > 0;
    }

    private function isLowerThanMaximumQuality(): bool
    {
        return $this->quality < 50;
    }


}
