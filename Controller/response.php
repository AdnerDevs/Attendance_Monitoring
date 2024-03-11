<?php 

include ("../connection/dbcon.php");


$params = $columns = $totalRecords = $data = array();

$params = $_REQUEST;

// Define index of column

$columns = array(

    0=> "employee_id",
    1=> "employee_name",
    2=> "department_name",
    3=> "activity_type",
    4=> "start_time",
    5=> "end_time",
    6=> "total_time",
    7=> "submitted_by",
    8=> "submitted_on"
);

$where = $sqlTot = $sqlRec = "";

// check search value exist

if(!empty($params['search']['value'])){
    $where .= " WHERE ";
    $where .= "( ea.employee_name LIKE '".$params['search']['value']."%' ";
    $where .= "OR ac.activity_type LIKE '".$params['search']['value']."%' ";
    $where .= "OR d.department_name LIKE '".$params['search']['value']."%' )";
}

// getting total number records without any search
$sql = "SELECT ea.employee_id, d.department_name, ea.employee_name , ac.activity_type, ea.activity_description, ea.start_time, ea.end_time, ea.total_time, ea.submitted_by, ea.submitted_on
        FROM `employee_attendance` ea
        INNER JOIN activity ac ON ea.activity_type = ac.activity_id
        INNER JOIN department d ON ea.department_id = d.department_id
        ORDER BY ea.employee_attendance_id DESC"; 
        // Initialize the counter

$sqlTot .= $sql;
$sqlRec .= $sql;

//concatenate search sql if value exist
if(isset($where) && $where != '') {

    $sqlTot .= $where;
    $sqlRec .= $where;
}

// $sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


$totalRecords = mysqli_num_rows($queryTot);

$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");

//iterate on results row and create new index array of data
while( $row = mysqli_fetch_row($queryRecords) ) { 
    
    // $row['start_time'] = date('Y-m-d h:i:s A', strtotime($row['start_time']));
    //   // Format end_time
    // $row['end_time'] = date('Y-m-d h:i:s A', strtotime($row['end_time']));
    $data[] = $row;
}   

$json_data = array(
        "draw"            => intval( $params['draw'] ),   
        "recordsTotal"    => intval( $totalRecords ),  
        "recordsFiltered" => intval($totalRecords),
        "data"            => $data   // total data array
        );

echo json_encode($json_data);  // send data as json format
?>
