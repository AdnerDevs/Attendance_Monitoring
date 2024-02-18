<?php  


class SignupController extends EmployeeModel{

    private $employee_name;
    private $employee_id;
    public function __construct($employee_name, $employee_id){
        $this->employee_name = $employee_name;
        $this->employee_id = $employee_id;
    }

    public function ValidateEmployee(){
        $error = [];

        if($this->emptyInput() == false){
            $error['empty_input'] = 'Please fill in all fields';

        }

        if($this->employeeIDCheck() == false){
            $error['already_exist'] = 'Please input a different ID';
        }
        return $error;
    }

    public function emptyInput(){
        if(empty($this->employee_name) && empty($this->employee_id)){
            return false;
        }

        return true;
    }

    public function employeeIDCheck(){
        return  $this->checkID($this->employee_id);
    }

}
