
<?php
// Start session
session_start();

// Get data from session
$sessData = !empty($_SESSION['session_Data'])?$_SESSION['session_Data']:'';

// Get status from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $status = $sessData['status']['type'];
    unset($_SESSION['session_Data']['status']);
}

// Include and initialize DB class
require_once 'database_class.php';
$db = new DB();
//echo "database instance created for id:".$_GET['id'];
//die();
// Fetch the user data by ID
if(!empty($_GET['id'])){
    $conditons = array(
        'where' => array(
            'id' => $_GET['id']
        ),
        'return_type' => 'single'
    );
    $userData = $db->getRows('lead_data', $conditons);
    $action_type = "update";
    $page_type = "Update lead";
}
else
{
    $userData['Lead_name'] = '';
    $userData['Contact_number'] = '';
    $userData['Address'] = '';
    $userData['City'] = '';
    $userData['State_name'] = '';
    $userData['Employment_type'] = '';
    $userData['Loan_status'] = '';
    $userData['User_name'] = '';
    $userData['Password'] = '';
    $userData['id']='';
    $action_type = "add";
    $page_type = "Add lead";
}
//// Redirect to list page if invalid request submitted
//if(empty($userData)){
//    header("Location: index.php");
//    exit;
//}

// Get submitted form data
$postData = array();
if(!empty($session_Data['postData'])){
    $postData = $session_Data['postData'];
    unset($_SESSION['postData']);
}
?>

<div class="row">
    <div class="col-md-12 head">
        <h5><?php echo $page_type; ?></h5>

        <!-- Back link -->
        <div class="float-right">
            <a href="index.php" class="btn btn-success"><i class="back"></i> Back</a>
        </div>
    </div>

    <!-- Status message -->
    <?php if(!empty($statusMsg)){ ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>

    <div class="col-md-12">
        <form method="post" action="action_performed.php" class="form">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="Lead_name" value="<?php echo !empty($postData['Lead_name'])?$postData['Lead_name']:$userData['Lead_name']; ?>" required="">
            </div><br>
            <div class="form-group">
                <label>Contact number</label>
                <input type="text" class="form-control" name="Contact number" value="<?php echo !empty($postData['Contact_number'])?$postData['Contact_number']:$userData['Contact_number']; ?>" required="">
            </div><br>
            <div class="form-group">
                <label>Address</label>
                <textarea id="Address" name="Address"><?php echo !empty($postData['Address'])?$postData['Address']:$userData['Address']; ?></textarea>
            </div><br>
            <div class="form-group">
                <label for="city"> City </label>
                <select id="city" name="City">

                    <option value="Delhi"<?php if($userData['City']==="Delhi"){ echo "selected"; } ?>>Delhi</option>
                    <option value="Mumbai"<?php if($userData['City']==="Mumbai"){ echo "selected"; } ?>>Mumbai</option>
                    <option value="Chennai"<?php if($userData['City']==="Chennai"){ echo "selected"; } ?>>Chennai</option>
                    <option value="Kolkata"<?php if($userData['City']==="Kolkata"){ echo "selected"; } ?>>Kolkata</option>
                    <option value="Gurugram"<?php if($userData['City']==="Gurugram"){ echo "selected"; } ?>>Gurugram</option>
                    <option value="Pune"<?php if($userData['City']==="Pune"){ echo "selected"; } ?>>Pune</option>
                    <option value="Bengaluru"<?php if($userData['City']==="Bengaluru"){ echo "selected"; } ?>>Bengaluru</option>
                    <option value="Ahemdabad"<?php if($userData['City']==="Ahemdabad"){ echo "selected"; } ?>>Ahemdabad</option>
                    <option value="Nagpur"<?php if($userData['City']==="Nagpur"){ echo "selected"; } ?>>Nagpur</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="state">State</label>
                <select id="state" name="State_name">

                    <option value="delhi"<?php if($userData['State_name']==="delhi"){ echo "selected"; } ?>>Delhi</option>
                    <option value="maharashtra"<?php if($userData['State_name']==="maharashtra"){ echo "selected"; } ?>>Maharashtra</option>
                    <option value="tamil nadu"<?php if($userData['State_name']==="tamil nadu"){ echo "selected"; } ?>>Tamil Nadu</option>
                    <option value="west bengal"<?php  if($userData['State_name']==="west bengal"){ echo "selected"; } ?>>west bengal</option>
                    <option value="haryana"<?php  if($userData['State_name']==="haryana"){ echo "selected"; } ?>>Haryana</option>
                    <option value="karnataka"<?php if($userData['State_name']==="karnataka"){ echo "selected"; } ?>>Karnataka</option>
                    <option value="Gujarat"<?php  if($userData['State_name']==="Gujarat"){ echo "selected"; } ?>>Gujarat</option>
                </select>
            </div><br>
            <br>
            <div class="form-group">
                <legend>Employment Type</legend>

                <label><input type="radio" value="salaried" name="Employment_type"<?php if($userData['Employment_type']==="salaried"){ echo "checked"; } ?>>Salaried</label>
                <label><input type="radio" value="Self employed" name="Employment_type"<?php if($userData['Employment_type']==="Self employed"){ echo "checked"; } ?>>Self employed</label>
                <label><input type="radio" value="unemployed" name="Employment_type"<?php if($userData['Employment_type']==="unemployed"){ echo "checked"; } ?>>Not employed</label>

            </div><br>
            <div class="form-group">
                <legend>Existing Loan</legend>

                <label><input type="radio" name="Loan_status" value="no"<?php if($userData['Loan_status']==="no"){ echo "checked"; } ?>>no</label><br>
                <label><input type="radio" name="Loan_status" value="yes"<?php if($userData['Loan_status']==="yes"){ echo "checked"; } ?>>yes</label><br>

            </div><br>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="User_name" value="<?php echo !empty($_POST['User_name'])?trim($_POST['User_name']):$userData['User_name']; ?>" required="">
            </div><br>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="Password" value="<?php echo !empty($_POST['Password'])?trim($_POST['Password']):$userData['Password']; ?>" required="">
            </div><br>
            <input type="hidden" name="id" value="<?php echo $userData['id']; ?>"/>
            <input type="hidden" name="action_type" value="update"/>
            <input type="submit" class="form-control btn-primary" name="submit" value="Update User"/>
        </form>
    </div>
</div>