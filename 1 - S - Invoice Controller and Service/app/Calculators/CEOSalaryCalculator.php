<?php

namespace App\Calculators;

use App\Interfaces\SalaryCalculatorInterface;

class CEOSalaryCalculator implements SalaryCalculatorInterface
{
    public function calculate($start_date): float
    {
        return 12000 + now()->diffInYears($start_date) * 12000;
    }
}
