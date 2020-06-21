<?php


namespace Realforce\Service\Tax;


class KidsTax implements TaxRule
{
    public function accept(TaxPayer $taxPayer, int $tax): int
    {
        return $taxPayer->visitKidsTax($this, $tax);
    }

    public function modifyTax(int $tax, int $kidsCount): int
    {
        if ($kidsCount > 2) {
            return $tax - 2;
        }

        return $tax;
    }
}