<?php
class PaycheckTracker {
  public $employeeName;
  public $hoursWorked;
  public $hourlyRate;
  public $bonuses;
  public $isDirectDeposit;

  // Set up starting values based on my own info
  public function __construct($name, $hours, $rate, $bonus, $deposit) {
    // Should store everything I need to track a check
    $this->employeeName = $name;
    $this->hoursWorked = $hours;
    $this->hourlyRate = $rate;
    $this->bonuses = $bonus;
    $this->isDirectDeposit = $deposit;
  }

  // Display a summary of this paycheck
  public function getPaySummary() {
    $total = $this->calculateTotalPay();
    $depositType = $this->isDirectDeposit ? "Direct deposit" : "Paper check";
    echo "Pay Summary for {$this->employeeName}:\nTotal Pay: \${$total}\nMethod: {$depositType}\n\n";
  }

  // Calculates pay using hours, rate, and bonus
  public function calculateTotalPay() {
    return ($this->hoursWorked * $this->hourlyRate) + $this->bonuses;
  }

  // Lets me adjust hours if something changes
  public function updateHours($newHours) {
    $this->hoursWorked = $newHours;
  }

  // Decides if this paycheck counts as “high” based on the total
  public function isHighEarning() {
    return $this->calculateTotalPay() > 1000;
  }
}
?>
