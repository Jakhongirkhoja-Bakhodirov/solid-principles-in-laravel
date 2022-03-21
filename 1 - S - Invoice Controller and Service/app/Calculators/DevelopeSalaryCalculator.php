<?php

namespace App\Calculators;

use App\Interfaces\SalaryCalculatorInterface;

class DeveloperSalaryCalculator implements SalaryCalculatorInterface
{
    public function calculate($start_date): float
    {
        return 5000 + now()->diffInYears($start_date) * 5000;
    }
}
