<?php


namespace Realforce\Entity;


use Realforce\Service\Tax\AgeSalary;
use Realforce\Service\Tax\CountryTax;
use Realforce\Service\Tax\KidsTax;
use Realforce\Service\Tax\TaxPayer;

class Employee implements TaxPayer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Country
     */
    private $country;

    /**
     * @var int
     */
    private $age;

    /**
     * @var int
     */
    private $salary;

    /**
     * @var int`
     */
    private $kidsCount;

    /**
     * @var bool
     */
    private $hasCompanyCar;

    /**
     * @param Country $country
     * @param string $name
     * @param int $age
     * @param int $salary
     * @param int $kidsCount
     * @param bool $hasCompanyCar
     */
    public function __construct(Country $country, string $name, int $age, int $salary, int $kidsCount, bool $hasCompanyCar)
    {
        $this->name = $name;
        $this->country = $country;
        $this->age = $age;
        $this->salary = $salary;
        $this->kidsCount = $kidsCount;
        $this->hasCompanyCar = $hasCompanyCar;
    }

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @return int
     */
    public function getKidsCount(): int
    {
        return $this->kidsCount;
    }

    /**
     * @return bool
     */
    public function hasCompanyCar(): bool
    {
        return $this->hasCompanyCar;
    }

    public function visitCountryTax(CountryTax $rule, int $tax): int
    {
        return $rule->getTaxRate($this->getCountry());
    }

    public function visitAgeSalary(AgeSalary $rule, int $salary): int
    {
        return $rule->modifySalary($salary, $this->getAge());
    }

    public function visitKidsTax(KidsTax $rule, int $tax): int
    {
        return $rule->modifyTax($tax, $this->getKidsCount());
    }
}