<?php
// Start session
session_start();

// Include and initialize DB class
require_once 'database_class.php';

$db = new DB();

// Database table name
$tblName = 'lead_data';

$postData = $statusMsg = $valErr = '';
$status = 'danger';
$redirectURL = 'index.php';

// If Add request is submitted
if(!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'add') {
    $redirectURL = 'index.php';
    // Get user's input
    $postData = $_POST;
    $name = !empty($_POST['Lead_name'])?trim($_POST['Lead_name']):'';;
    $phone = !empty($_POST['Contact_number'])?trim($_POST['Contact_number']):'';;
    $address = !empty($_POST['Address'])?trim($_POST['Address']):'';;
    $city = !empty($_POST['City'])?trim($_POST['City']):'';
    $State_name = !empty($_POST['State_name'])?trim($_POST['State_name']):'';
    $employment = !empty($_POST['Employment_type'])?trim($_POST['Employment_type']):'';
    $Loan = !empty($_POST['Loan_status'])?trim($_POST['Loan_status']):'';
    $User_name = !empty($_POST['User_name'])?trim($_POST['User_name']):'';
    $password = !empty($_POST['Password'])?trim($_POST['Password']):'';

    // Validate form fields
    if (empty($name)) {
        $valErr .= 'Please enter your name.<br/>';
    }
    if (empty($phone)) {
        $valErr .= 'Please enter your phone no.<br/>';
    }
    if (empty($address)) {
        $valErr .= 'Please enter your phone no.<br/>';
    }
    if (empty($city)) {
        $valErr .= 'Please choose city<br/>';
    }
    if (empty($state)) {
        $valErr .= 'Please choose city<br/>';
    }
    if (empty($employment)) {
        $valErr .= 'Please choose employment type<br/>';
    }
    if (empty($loan)) {
        $valErr .= 'Please enter your loan status.<br/>';
    }
    if (empty($User_name)) {
        $valErr .= 'Please enter your loan status.<br/>';
    }
    if (empty($Password)) {
        $valErr .= 'Please enter your loan status.<br/>';
    }

    // Check whether user inputs are empty
    if (!empty($valErr)) {
        // Insert data into the database
        $userData = array(
            'Lead_name' => $name,
            'Contact_number' => $phone,
            'Address' => $address,
            'City' => $city,
            'State_name' => $State_name,
            'Employment_type' => $employment,
            'Loan_status' => $Loan,
            'User_name'=>$User_name,
            'Password'=>$password,
        );
//            var_dump($userData);
        $insert = $db->insert($tblName, $userData);

        if ($insert) {
            $status = 'success';
            $statusMsg = 'User data has been added successfully!';
            $postData = '';

            $redirectURL = 'index.php';
        } else {
            $statusMsg = 'Something went wrong, please try again after some time.';
        }
    } else {
        $statusMsg = '<p>Please fill all the mandatory fields:</p>' . trim($valErr, '<br/>');
    }

    // Store status into the SESSION
    $sessData['postData'] = $postData;
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;

    header("location:".$redirectURL);
}
elseif(!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'delete' && !empty($_GET['id'])){ // If Delete request is submitted
    // Delete data from the database
    $conditions = array('id' => $_GET['id']);
    $delete = $db->delete($tblName, $conditions);

    if($delete){
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    }else{
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;

    header("location:".$redirectURL);
}