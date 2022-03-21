<?php

namespace App\Http\Controllers;

use App\Enums\JobTitle;
use App\Models\Employee;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function getSalaryEmployee(Request $request, Employee $employee)
    {
        //Bad Way Declaration , it is not support Open-Closed Principles
        $salary = 0;
        $years = now()->diffInYears($employee->start_date);
        switch ($employee->job_title) {
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
            $calculatorClassName = 'App\\Calculators\\' . $employee->job_title . 'SalaryCalculator';
            return (new $calculatorClassName)->calculate($employee->start_date);
        } catch (\Throwable $th) {
            abort(404, 'Invalid  job title , please try again');
        }
    }
}
