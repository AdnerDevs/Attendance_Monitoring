<?php  


class SignupControllerAdmin extends AdminAccountModel{

    private $admin_id;
    private $admin_username;
    public function __construct($admin_id, $admin_username){
        $this->admin_id = $admin_id;
        $this->admin_username = $admin_username;
    }

    public function ValidateAdmin(){
        $error = [];

        if($this->emptyInput() == false){
            $error['empty_input'] = 'Please fill in all fields';

        }

        if($this->employeeIDCheck() == false){
            $error['already_exist'] = 'This ID is already registered, please input a different ID';
        }

        if($this->formatID() == false){
            $error['format_id'] = 'ID should be alphanumeric and 8 characters long';
        }
        return $error;
    }

    public function emptyInput(){
        if(empty($this->admin_username) && empty($this->admin_id)){
            return false;
        }

        return true;
    }

    public function formatID(){
        if(strlen($this->admin_id) !== 8 || !ctype_alnum($this->admin_id)){
            return false;
        }

        return true;
    }

    public function employeeIDCheck(){
        return  $this->checkID($this->admin_id);
    }

}
