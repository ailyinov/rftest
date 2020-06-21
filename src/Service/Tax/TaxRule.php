<?php


namespace Realforce\Service\Tax;


interface TaxRule
{
    public function accept(TaxPayer $taxPayer, int $tax): int;
}