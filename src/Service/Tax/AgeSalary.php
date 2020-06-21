<?php


namespace Realforce\Service\Tax;

class AgeSalary implements SalaryRule
{
    public function accept(TaxPayer $taxPayer, int $salary): int
    {
        return $taxPayer->visitAgeSalary($this, $salary);
    }

    public function modifySalary(int $salary, int $age): int
    {
        if ($age > 50) {
            return $salary + $salary * 0.07;
        }

        return $salary;
    }
}