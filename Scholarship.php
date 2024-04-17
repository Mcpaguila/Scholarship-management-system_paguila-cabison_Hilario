
<?php
class Scholarship {
    private $name;
    private $amount;
    private $criteria;
    private $applicants;

    //method for scholarship
    public function __construct($name, $amount, $criteria) {
        $this->name = $name;
        $this->amount = $amount;
        $this->criteria = $criteria;
        $this->applicants = [];
    }


    //function for request scholarship
    public function requestScholarship($student) {
        if ($student->getGPA() >= $this->criteria) {
            $this->applicants[] = $student;
            echo $student->getName() . " has requested the " . $this->name . " scholarship.\n";
        } else {
            echo $student->getName() . " does not meet the criteria for the " . $this->name . " scholarship.\n";
        }
    }

    //function for get request
    public function getRequests() {
        return $this->applicants;
    }

    //function for approve request
    public function approveRequest($student) {
        echo $student->getName() . "'s scholarship request for " . $this->name . " has been approved.\n";
    }
//function for deny request
    public function denyRequest($student) {
        echo $student->getName() . "'s scholarship request for " . $this->name . " has been denied.\n";
    }
}

// Example usage
$scholarship = new Scholarship("Merit Scholarship", 5000, 3.5);

$student1 = (object) array('name' => "John", 'gpa' => 3.8);
$student2 = (object) array('name' => "Alice", 'gpa' => 3.2);

$scholarship->requestScholarship($student1);
$scholarship->requestScholarship($student2);

$requests = $scholarship->getRequests();
foreach ($requests as $request) {
    if ($request->gpa >= $scholarship->getCriteria()) {
        $scholarship->approveRequest($request);
    } else {
        $scholarship->denyRequest($request);
    }
}

?>