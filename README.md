
# PAYE Calculator

A PHP library for calculating **Pay As You Earn (PAYE)** tax in Nigeria. This library computes PAYE based on the annual salary, an array of allowances, and an array of deductions using the Nigerian tax system.

---

## Features

- Supports input of annual salary, allowances, and deductions.
- Automatically calculates total allowances and deductions.
- Computes PAYE using Nigeria's progressive tax brackets.
- Easy to integrate into any PHP project.

---

## Installation

Install the library via Composer:

```bash
composer hilinksnetworks/ng-paye-calculator
```

---

## Usage

Here's how to use the PAYE Calculator in your PHP project:

```php
require 'vendor/autoload.php';

use PAYE\PAYECalculator;

// Input data
$annualSalary = 5000000; // Annual Salary: ₦5,000,000
$allowances = [1000000, 500000, 250000]; // Array of allowances
$deductions = [200000, 150000, 100000]; // Array of deductions

// Calculate PAYE
$paye = PAYECalculator::calculate($annualSalary, $allowances, $deductions);

echo "The PAYE tax is: ₦" . number_format($paye, 2);
```

### Explanation of Inputs
1. **Annual Salary**: Total annual salary (numeric value).
2. **Allowances**: An array of all allowances (e.g., housing, transport).
3. **Deductions**: An array of all deductions (e.g., pension, insurance).

---

## How PAYE is Calculated

The PAYE is computed using the following steps:

1. **Gross Income** = Annual Salary + Total Allowances.
2. **Consolidated Relief Allowance (CRA)**:
   - ₦200,000 or 1% of gross income (whichever is higher) + 20% of gross income.
3. **Taxable Income** = Gross Income - (CRA + Total Deductions).
4. **Progressive Tax Rates**:
   - First ₦300,000: 7%
   - Next ₦300,000: 11%
   - Next ₦500,000: 15%
   - Next ₦500,000: 19%
   - Next ₦1,600,000: 21%
   - Above ₦3,200,000: 24%

---

## Requirements

- PHP 7.4 or higher.
- Composer.

---

## License

This project is licensed under the [MIT License](LICENSE).

---

## Author

**Your Name**  
Email: contact@hilinksnetworks.ng  
GitHub: [hilinksnetworks](https://github.com/yourname)

---
