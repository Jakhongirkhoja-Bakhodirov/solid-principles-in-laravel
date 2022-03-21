<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['start_date'];

    public function getSalaryAttribute()
    {
        //Bad Way Declaration , it is not support Open-Closed Principles
        $salary = 0;
        $years = now()->diffInYears($this->start_date);
        switch ($this->job_title) {
            case 'CEO':
                $salary = 12000 + $years * 12000;
                break;
            case 'CTO':
                $salary = 10000 + $years * 10000;
                break;
            case 'Developer':
                $salary = 5000 + $years * 5000;
                break;
            default:
                # code...
                break;
        }
        return $salary;

        //Open-Closed Principles
        try {
            $calculatorClassName = 'App\\Calculators\\' . $this->job_title . 'SalaryCalculator';
            return (new $calculatorClassName)->calculate($this->start_date);
        } catch (\Throwable $th) {
            abort(404, 'Invalid  job title , please try again');
        }
    }
}
