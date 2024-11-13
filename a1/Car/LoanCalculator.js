const carPrice = parseFloat(document.getElementById("carPrice").innerText);

// Fixed values
const interestRate = 2.5 / 100;  // 2.5% interest rate
const loanTerm = 12; // 12 months

function calculateDownPayment(percentage) {
  const downPayment = carPrice * percentage;  // Calculate down payment based on selected percentage
  const loanAmount = carPrice - downPayment;  // Calculate remaining loan amount

  const monthlyInterestRate = interestRate / 12; // Monthly interest rate
  const monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -loanTerm));

  const totalLoanAmount = monthlyPayment * loanTerm;

  // Update the UI with the calculated values
  document.getElementById('downpayment').textContent = `$${downPayment.toFixed(2)}`;
  document.getElementById('monthly-payment').textContent = `$${monthlyPayment.toFixed(2)}`;
  document.getElementById('total-loan').textContent = `$${totalLoanAmount.toFixed(2)}`;
}
