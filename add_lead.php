<?php
// Start session
session_start();

// Get data from session
$session_Data = !empty($_SESSION['session_Data'])?$_SESSION['session_Data']:'';

// Get status from session
if(!empty($session_Data['status']['msg'])){
    $statusMsg = $session_Data['status']['msg'];
    $status = $session_Data['status']['type'];
    unset($_SESSION['session_Data']['status']);
}

// Get submitted form data
$postData = array();
if(!empty($session_Data['postData'])){
    $postData = $session_Data['postData'];
    unset($_SESSION['postData']);
}
?>

<div class="row">
    <div class="col-md-12 head">
        <h5>Add User</h5>

        <!--         Back link -->
        <!--        <div class="float-right">-->
        <!--            <a href="index.php" class="btn btn-success"><i class="back"></i> Back</a>-->
        <!--        </div>-->
        <!--    </div>-->

        <!-- Status message -->
        <?php if(!empty($statusMsg)){ ?>
            <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
        <?php } ?>

        <div class="col-md-12">
            <form method="post" action="action_performed.php" class="form">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="Lead_name" value="<?php echo !empty($_POST['Contact_number'])?trim($_POST['Contact_number']):''; ?>" required="">
                </div><br>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="Contact_number" value="<?php echo !empty($_POST['Contact_number'])?trim($_POST['Contact_number']):''; ?>" required="">
                </div><br>
                <div class="form-group">
                    <label for="address"> Address </label>
                    <textarea id="address" name="Address"><?php echo !empty($_POST['Address'])?trim($_POST['Address']):''; ?></textarea>
                </div><br>
                <div class="form-group">
                    <label for="city"> City </label>
                    <select id="city" name="City">
                        <!--                    --><?php //$sql_query = "SELECT DISTINCT City FROM lead_data";
                        //                    $result = mysqli_query($connection, $sql_query);
                        //                    if(mysqli_num_rows($result) > 0)
                        //                    {
                        //                        $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        //                    }
                        //                    foreach ($options as $option)
                        //                    {?>
                        <!---->
                        <!--                        <option>--><?php //echo $option['City']; ?><!-- </option>-->
                        <!--                        --><?php
                        //                    }
                        //                    ?>
                        <!--                                        <option value="Delhi"--><?php //if($city ==='delhi'){ echo "selected";} ?><!-->Delhi</option>-->
                        <!--                                        <option value="Mumbai" --><?php //if($city ==='mumbai'){ echo "selected";} ?><!-->Mumbai</option>-->
                        <!--                                        <option value="Chennai"--><?php //if($city ==='chennai'){ echo "selected";} ?><!-->Chennai</option>-->
                        <!--                                        <option value="Kolkata"--><?php //if($city ==='kolkata'){ echo "selected";} ?><!-->Kolkata</option>-->
                        <!--                                        <option value="Gurugram"--><?php //if($city ==='gurugram'){ echo "selected";} ?><!-->Gurugram</option>-->
                        <!--                                        <option value="Pune"--><?php //if($city ==='pune'){ echo "selected";} ?><!-->Pune</option>-->
                        <!--                                        <option value="Bengaluru"--><?php //if($city ==='bengaluru'){ echo "selected";} ?><!-->Bengaluru</option>-->
                        <!--                                        <option value="Ahemdabad"--><?php //if($city ==='ahemdabad'){ echo "selected";} ?><!-->Ahemdabad</option>-->
                        <!--                                        <option value="Nagpur"--><?php //if($city ==='nagpur'){ echo "selected";} ?><!-->Nagpur</option>-->
                        <option value="Delhi"<?php echo !empty($_POST['City'])?trim($_POST['City']):''; ?>>Delhi</option>
                        <option value="Mumbai"<?php echo !empty($_POST['City'])?trim($_POST['City']):''; ?>>Mumbai</option>
                        <option value="Chennai"<?php echo !empty($_POST['City'])?trim($_POST['City']):''; ?>>Chennai</option>
                        <option value="Kolkata"<?php echo !empty($_POST['City'])?trim($_POST['City']):''; ?>>Kolkata</option>
                        <option value="Gurugram"<?php echo !empty($_POST['City'])?trim($_POST['City']):''; ?>>Gurugram</option>
                        <option value="Pune"<?php echo !empty($_POST['City'])?trim($_POST['City']):''; ?>>Pune</option>
                        <option value="Bengaluru"<?php echo !empty($_POST['City'])?trim($_POST['City']):''; ?>>Bengaluru</option>
                        <option value="Ahemdabad"<?php echo !empty($_POST['City'])?trim($_POST['City']):''; ?>>Ahemdabad</option>
                        <option value="Nagpur"<?php echo !empty($_POST['City'])?trim($_POST['City']):''; ?>>Nagpur</option>
                    </select>
                </div><br>
                <div class="form-group">
                    <label for="state">State</label>
                    <select id="state" name="State_name">
                        <!--                    --><?php //$sql_query = "SELECT DISTINCT State_name FROM lead_data";
                        //                    $result = mysqli_query($connection, $sql_query);
                        //                    if(mysqli_num_rows($result) > 0)
                        //                    {
                        //                        $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        //                    }
                        //                    foreach ($options as $option)
                        //                    {?>
                        <!---->
                        <!--                        <option>--><?php //echo $option['State_name']; ?><!-- </option>-->
                        <!--                        --><?php
                        //                    }
                        //                    ?>
                        <!--                                        <option value="delhi"--><?php //if($SN ==='delhi'){ echo "selected";} ?><!-->Delhi</option>-->
                        <!--                                        <option value="maharashtra"--><?php //if($SN ==='maharashtra'){ echo "selected";} ?><!-->Maharashtra</option>-->
                        <!--                                        <option value="tamil nadu"--><?php //if($SN ==='tamil nadu'){ echo "selected";} ?><!-->Tamil Nadu</option>-->
                        <!--                                        <option value="west bengal"--><?php //if($SN ==='west bengal'){ echo "selected";} ?><!-->west bengal</option>-->
                        <!--                                        <option value="haryana"--><?php //if($SN ==='haryana'){ echo "selected";} ?><!-->Haryana</option>-->
                        <!--                                        <option value="karnataka"--><?php //if($SN ==='karnataka'){ echo "selected";} ?><!-->Karnataka</option>-->
                        <!--                                        <option value="Gujarat"--><?php //if($SN ==='Gujarat'){ echo "selected";} ?><!-->Gujarat</option>-->
                        <option value="delhi"<?php echo !empty($_POST['State_name'])?trim($_POST['State_name']):''; ?>>Delhi</option>
                        <option value="maharashtra"<?php echo !empty($_POST['State_name'])?trim($_POST['State_name']):''; ?>>Maharashtra</option>
                        <option value="tamil nadu"<?php echo !empty($_POST['State_name'])?trim($_POST['State_name']):''; ?>>Tamil Nadu</option>
                        <option value="west bengal"<?php echo !empty($_POST['State_name'])?trim($_POST['State_name']):''; ?>>west bengal</option>
                        <option value="haryana"<?php echo !empty($_POST['State_name'])?trim($_POST['State_name']):''; ?>>Haryana</option>
                        <option value="karnataka"<?php echo !empty($_POST['State_name'])?trim($_POST['State_name']):''; ?>>Karnataka</option>
                        <option value="Gujarat"<?php echo !empty($_POST['State_name'])?trim($_POST['State_name']):''; ?>>Gujarat</option>
                    </select>
                </div><br>
                <br>
                <div class="form-group">
                    <legend>Employment Type</legend>
                    <!--               -->
                    <!--                <label><input type="radio" value="salaried" name="employment_type"--><?php //echo !empty($postData['Employment_type'])?$postData['Employment_type']:''; ?><!--//>Salaried</label>-->
                    <!--                <label><input type="radio" value="Self employed" name="employment_type"--><?php //echo !empty($postData['Employment_type'])?$postData['Employment_type']:'';if($ET === "Self employed" ){ echo "checked";} ?><!--//>Self employed</label>-->
                    <!--                <label><input type="radio" value="unemployed" name="employment_type"--><?php //if($ET === "unemployed" ){ echo "checked";} ?><!--//>Not employed</label>-->
                    <!--                -->
                    <label><input type="radio" value="salaried" name="Employment_type"<?php echo !empty($_POST['Employment_type'])?trim($_POST['Employment_type']):'';?>>Salaried</label>
                    <label><input type="radio" value="Self employed" name="Employment_type"<?php echo !empty($_POST['Employment_type'])?trim($_POST['Employment_type']):'';?>>Self employed</label>
                    <label><input type="radio" value="unemployed" name="Employment_type"<?php echo !empty($_POST['Employment_type'])?trim($_POST['Employment_type']):''; ?>>Not employed</label>

                </div><br>
                <div class="form-group">
                    <legend>Existing Loan</legend>
                    <!--                -->
                    <!--                <label><input type="radio" name="existing_loan" value="no"--><?php //if($loan === "no" ){ echo "checked";} ?><!--//>no</label><br>-->
                    <!--                <label><input type="radio" name="existing_loan" value="yes"--><?php //if($loan === "yes" ){ echo "checked";} ?><!--//>yes</label><br>-->
                    <!---->
                    <label><input type="radio" name="Loan_status" value="no"<?php echo !empty($_POST['Loan_status'])?trim($_POST['Loan_status']):''; ?>>no</label><br>
                    <label><input type="radio" name="Loan_status" value="yes"<?php echo !empty($_POST['Loan_status'])?trim($_POST['Loan_status']):''; ?>>yes</label><br>

                </div><br>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="User_name" value="<?php echo !empty($_POST['User_name'])?trim($_POST['User_name']):''; ?>" required="">
                </div><br>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="Password" value="<?php echo !empty($_POST['Password'])?trim($_POST['Password']):''; ?>" required="">
                </div><br>
                <input type="hidden" name="action_type" value="add"/>
                <input type="submit" class="form-control btn-primary" name="submit" value="Add lead"/>
            </form>
        </div>
    </div>

