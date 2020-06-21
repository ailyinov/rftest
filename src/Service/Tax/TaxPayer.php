<?php


namespace Realforce\Service\Tax;


interface TaxPayer
{
    public function visitCountryTax(CountryTax $rule, int $tax): int;
    public function visitKidsTax(KidsTax $rule, int $tax): int;
    public function visitAgeSalary(AgeSalary $rule, int $salary): int;
}