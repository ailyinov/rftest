<?php


namespace Realforce\Tests\Tax;


use PHPUnit\Framework\TestCase;
use Realforce\Entity\Country;
use Realforce\Entity\Employee;
use Realforce\Service\Tax\AgeSalary;
use Realforce\Service\Tax\CountryTax;
use Realforce\Service\Tax\KidsTax;
use Realforce\Service\SalaryCalculator;

class SalaryCalculatorTest extends TestCase
{
    public function testTax()
    {
        $taxRules = [new CountryTax(), new KidsTax()];
        $salaryRules = [new AgeSalary()];
        $country = new Country(20);

        $calculator = new SalaryCalculator();

        $alyce = new Employee($country, 'Alyce', 26, 6000, 2, false);
        $result = $calculator->applyTaxes($alyce, $taxRules, $salaryRules);
        $this->assertEquals(4800, $result);

        $bob = new Employee($country, 'Bob', 52, 4000, 0, true);
        $result = $calculator->applyTaxes($bob, $taxRules, $salaryRules);
        $this->assertEquals(2924, $result);

        $charlie = new Employee($country, 'Charlie', 36, 5000, 3, true);
        $result = $calculator->applyTaxes($charlie, $taxRules, $salaryRules);
        $this->assertEquals(3600, $result);
    }
}