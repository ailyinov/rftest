<?php


namespace Realforce\Service;


use Realforce\Entity\Employee;
use Realforce\Service\Tax\SalaryRule;
use Realforce\Service\Tax\TaxRule;

class SalaryCalculator
{
    const CAR_PRICE = 500;

    /**
     * @param Employee $employee
     * @param $taxRules TaxRule[]
     * @param $salaryRules SalaryRule[]
     * @return float
     */
    public function applyTaxes(Employee $employee, array $taxRules, array $salaryRules): float
    {
        $tax = 0;
        foreach ($taxRules as $taxRule) {
            $tax = $taxRule->accept($employee, $tax);
        }

        $salary = $employee->getSalary();
        foreach ($salaryRules as $salaryRule) {
            $salary = $salaryRule->accept($employee, $salary);
        }

        $income = $salary - ($salary * ($tax / 100));
        if ($employee->hasCompanyCar()) {
            $income -= self::CAR_PRICE;
        }

        return $income;
    }
}