<?php

namespace App\Calculators;

use App\Interfaces\SalaryCalculatorInterface;

class CTOSalaryCalculator implements SalaryCalculatorInterface
{
    public function calculate($start_date): float
    {
        return 10000 + now()->diffInYears($start_date) * 10000;
    }
}
