<?php

namespace PAYE;

class PAYECalculator
{
    /**
     * Calculate PAYE based on annual salary, allowances, and deductions.
     *
     * @param float $annualSalary Annual basic salary.
     * @param array $allowances Array of allowance amounts.
     * @param array $deductions Array of deduction amounts.
     * @return float PAYE amount.
     */
    public static function calculate($annualSalary, array $allowances, array $deductions)
    {
        // Step 1: Calculate Total Allowances and Deductions
        $totalAllowances = array_sum($allowances);
        $totalDeductions = array_sum($deductions);

        // Step 2: Calculate Gross Income
        $grossIncome = $annualSalary + $totalAllowances;

        // Step 3: Calculate Consolidated Relief Allowance (CRA)
        $CRA = max(200000, 0.01 * $grossIncome) + (0.2 * $grossIncome);

        // Step 4: Determine Taxable Income
        $taxableIncome = $grossIncome - ($CRA + $totalDeductions);

        if ($taxableIncome <= 0) {
            return 0; // No tax for non-taxable income
        }

        // Step 5: Apply PAYE Rates (Progressive Tax System)
        $paye = 0;
        $taxBrackets = [
            300000 => 0.07,
            300000 => 0.11,
            500000 => 0.15,
            500000 => 0.19,
            1600000 => 0.21,
            PHP_INT_MAX => 0.24 // Above ₦3,200,000
        ];

        foreach ($taxBrackets as $bracket => $rate) {
            if ($taxableIncome > $bracket) {
                $paye += $bracket * $rate;
                $taxableIncome -= $bracket;
            } else {
                $paye += $taxableIncome * $rate;
                break;
            }
        }

        return $paye;
    }
}
