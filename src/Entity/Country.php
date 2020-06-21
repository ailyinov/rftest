<?php


namespace Realforce\Entity;


class Country
{
    /**
     * @var int
     */
    private $taxRate;

    /**
     * Country constructor.
     *
     * @param int $taxRate
     */
    public function __construct(int $taxRate)
    {
        $this->taxRate = $taxRate;
    }

    /**
     * @return int
     */
    public function getTaxRate(): int
    {
        return $this->taxRate;
    }
}