<?php
class Employee
{
    public $name;
    public $salary;
    function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }
}
$emp = new Employee("Santanu",15000);
$emp1 = new Employee("fdfdf",454545);
$emp2 = new Employee("gfgfgf",66666);
echo "The employee name 1 is $emp->name";
?>