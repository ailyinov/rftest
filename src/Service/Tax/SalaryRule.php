<?php


namespace Realforce\Service\Tax;


interface SalaryRule
{
    public function accept(TaxPayer $taxPayer, int $salary): int;
}