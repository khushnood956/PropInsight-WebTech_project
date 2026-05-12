<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller {
    public function index() {
        return view('pages.calculator');
    }

    public function calculate(Request $request) {
        $price = $request->input('price', 0);
        $downPaymentPercent = $request->input('down_payment', 0);
        $years = $request->input('tenure', 0);
        $interestRate = $request->input('interest_rate', 0);

        $downPaymentAmount = $price * ($downPaymentPercent / 100);
        $loanAmount = $price - $downPaymentAmount;
        
        $totalMonths = $years * 12;
        $monthlyRate = $interestRate / 100 / 12;

        if ($monthlyRate == 0) {
            $monthlyInstallment = ($totalMonths > 0) ? $loanAmount / $totalMonths : 0;
        } else {
            // Mortgage formula
            $monthlyInstallment = ($loanAmount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$totalMonths));
        }

        $totalPayment = $monthlyInstallment * $totalMonths;
        $totalInterest = $totalPayment - $loanAmount;
        $processingFee = $loanAmount * 0.01; // 1% processing fee

        // ROI calculation
        $annualIncome = $price * 0.05; // Assumed 5% annual property appreciation/rental
        $roi = ($price > 0) ? ($annualIncome / $price) * 100 : 0;

        return back()->with('results', [
            'monthly_installment' => round($monthlyInstallment),
            'loan_amount' => round($loanAmount),
            'total_interest' => round($totalInterest),
            'processing_fee' => round($processingFee),
            'annual_roi' => round($roi, 2)
        ]);
    }
}