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
        //   if($this->formatID() == false){
        //     $error['format_id'] = 'Employee ID should be 10 characters long';
        // }

        // if($this->employeeIDCheck() == false){
        //     $error['already_exist'] = 'This ID is already registered, please input a different ID';
        // }

      
        return $error;
    }

    public function emptyInput(){
        if(empty($this->employee_name) && empty($this->employee_id)){
            return false;
        }

        return true;
    }

    // public function formatID(){
    //     if(strlen($this->employee_id) > 10 || strlen($this->employee_id) < 10){
    //         return false;
    //     }

    //     return true;
    // }

    // public function employeeIDCheck(){
    //     return  $this->checkID($this->employee_id);
    // }

}
