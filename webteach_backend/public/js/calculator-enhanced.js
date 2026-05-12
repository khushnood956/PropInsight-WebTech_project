/**
 * Enhanced Mortgage Calculator with Interest Rate and Detailed Results
 * Handles all new calculator fields including interest rate, ROI calculations
 */
function calculateMortgageEnhanced() {
  // Getting values from the form
  const price = parseFloat(document.getElementById("propPrice").value);
  const downPercent = parseFloat(document.getElementById("downPayment").value);
  const years = parseFloat(document.getElementById("tenure").value);
  const interestRate = parseFloat(
    document.getElementById("interestRate").value,
  );
  const includeRoi = document.getElementById("includeRoi").checked;

  // UI Elements
  const resultBox = document.getElementById("resultBox");
  const display = document.getElementById("monthlyAmount");
  const detailedResults = document.getElementById("detailedResults");
  const roiResults = document.getElementById("roiResults");

  // Validation
  if (
    isNaN(price) ||
    price <= 0 ||
    isNaN(downPercent) ||
    downPercent < 0 ||
    downPercent > 100
  ) {
    alert("Please enter valid property details.");
    return;
  }

  // Calculate loan amount
  const downPaymentAmount = price * (downPercent / 100);
  const loanAmount = price - downPaymentAmount;

  // Calculate monthly interest rate
  const monthlyRate = interestRate / 100 / 12;
  const totalMonths = years * 12;

  // Calculate monthly installment using proper mortgage formula
  let monthlyInstallment;
  if (monthlyRate === 0) {
    // No interest case
    monthlyInstallment = loanAmount / totalMonths;
  } else {
    // Standard mortgage formula: M = P * [r(1+r)^n] / [(1+r)^n - 1]
    monthlyInstallment =
      (loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, totalMonths))) /
      (Math.pow(1 + monthlyRate, totalMonths) - 1);
  }

  // Calculate total payment and interest
  const totalPayment = monthlyInstallment * totalMonths;
  const totalInterest = totalPayment - price;
  const processingFee = loanAmount * 0.01; // 1% processing fee

  // Update monthly payment display
  const formattedMonthly = parseInt(monthlyInstallment).toLocaleString();
  display.innerText = "PKR " + formattedMonthly;

  // Update detailed results
  document.getElementById("loanAmount").innerText =
    "PKR " + parseInt(loanAmount).toLocaleString();
  document.getElementById("downPaymentAmount").innerText =
    "PKR " + parseInt(downPaymentAmount).toLocaleString();
  document.getElementById("totalInterest").innerText =
    "PKR " + parseInt(totalInterest).toLocaleString();
  document.getElementById("totalPayment").innerText =
    "PKR " + parseInt(totalPayment).toLocaleString();
  document.getElementById("processingFee").innerText =
    "PKR " + parseInt(processingFee).toLocaleString();

  // Calculate effective rate
  const effectiveRate = (((totalInterest / price) * 100) / years).toFixed(2);
  document.getElementById("effectiveRate").innerText = effectiveRate + "%";

  // Show detailed results
  detailedResults.style.display = "block";

  // ROI Calculations if checkbox is checked
  if (includeRoi) {
    // Assume 5% annual property appreciation
    const annualAppreciation = 0.05;
    const projectedValue = price * Math.pow(1 + annualAppreciation, 5);
    const totalInvestment =
      downPaymentAmount + monthlyInstallment * 60 + processingFee;
    const roi5Year = (
      ((projectedValue - totalInvestment) / totalInvestment) *
      100
    ).toFixed(2);
    const annualRoi = (roi5Year / 5).toFixed(2);

    // Calculate break-even period (simplified)
    const monthlyRentalIncome = price * 0.005; // Assume 0.5% monthly rental yield
    const breakEvenMonths = totalInvestment / monthlyRentalIncome;
    const breakEvenYears = (breakEvenMonths / 12).toFixed(1);

    // Update ROI results
    document.getElementById("annualRoi").innerText = annualRoi + "%";
    document.getElementById("breakEven").innerText = breakEvenYears + " years";
    document.getElementById("fiveYearValue").innerText =
      "PKR " + parseInt(projectedValue).toLocaleString();

    roiResults.style.display = "block";
  } else {
    roiResults.style.display = "none";
  }

  // Show result box with animation
  resultBox.classList.remove("d-none");
  resultBox.style.animation = "fadeIn 0.5s ease-in";

  // Scroll to results
  resultBox.scrollIntoView({ behavior: "smooth", block: "nearest" });
}
