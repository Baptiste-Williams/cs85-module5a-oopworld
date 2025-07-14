<?php
class PaycheckTracker {
  // holds the name of the employee
  public $employeeName;

  // tracks how many hours the employee worked this pay period
  public $hoursWorked;

  // stores the hourly pay rate
  public $hourlyRate;

  // holds any bonus money added to the paycheck
  public $bonuses;

  // true if it’s direct deposit, false if it’s a paper check
  public $isDirectDeposit;

  // should set up the paycheck tracker using the values I pass in
  public function __construct($name, $hours, $rate, $bonus, $deposit) {
    $this->employeeName = $name;
    $this->hoursWorked = $hours;
    $this->hourlyRate = $rate;
    $this->bonuses = $bonus;
    $this->isDirectDeposit = $deposit;
  }

  // should show all paycheck details clearly, one line per category
  public function getPaySummary() {
    $total = $this->calculateTotalPay();
    $depositType = $this->isDirectDeposit ? "Direct deposit" : "Paper check";
    echo "Pay Summary for {$this->employeeName}:\n";
    echo "Hours Worked: {$this->hoursWorked}\n";
    echo "Hourly Rate: \${$this->hourlyRate}\n";
    echo "Bonuses: \${$this->bonuses}\n";
    echo "Total Pay: \${$total}\n";
    echo "Payment Method: {$depositType}\n";
    echo "High Earning: " . ($this->isHighEarning() ? "Yes" : "No") . "\n\n";
  }

  // should calculate total pay using hours, hourly rate, and bonuses
  public function calculateTotalPay() {
    return ($this->hoursWorked * $this->hourlyRate) + $this->bonuses;
  }

  // should let me change the hours worked in case I need to fix it
  public function updateHours($newHours) {
    $this->hoursWorked = $newHours;
  }

  // should return true if total pay is over $1000, otherwise false
  public function isHighEarning() {
    return $this->calculateTotalPay() > 1000;
  }

  // should increase bonuses based on a percentage amount passed in
  public function increaseBonus($percent) {
    if ($percent > 0) {
      $this->bonuses += $this->bonuses * ($percent / 100);
    }
  }
}

// creates a paycheck object using Baptiste’s real work info
$track1 = new PaycheckTracker("Baptiste", 40, 25, 150, true);

// creates another paycheck object using sample data for TC
$track2 = new PaycheckTracker("TC", 30, 22, 0, false);

// should print each paycheck on separate lines with all details
$track1->getPaySummary();
$track2->getPaySummary();
?>
