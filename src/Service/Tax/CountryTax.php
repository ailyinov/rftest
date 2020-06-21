<?php


namespace Realforce\Service\Tax;


use Realforce\Entity\Country;

class CountryTax implements TaxRule
{
    public function accept(TaxPayer $taxPayer, int $tax): int
    {
        return $taxPayer->visitCountryTax($this, $tax);
    }

    public function getTaxRate(Country $country): int
    {
        return $country->getTaxRate();
    }
}