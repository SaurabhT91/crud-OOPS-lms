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

    // Include and initialize DB class
    require_once 'database_class.php';
    $db = new DB();

    // Fetch the users data
    $users = $db->getRows('lead_data', array('order_by'=>'id DESC'));

    // Retrieve status message from session
    if(!empty($_SESSION['statusMsg'])){
        echo '<p>'.$_SESSION['statusMsg'].'</p>';
        unset($_SESSION['statusMsg']);
    }
    ?>

    <div class="row">
        <div class="col-md-12 head">
            <h5>Lead Data</h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="form.php" class="btn btn-success"><i class="plus"></i>Add New Lead</a>
            </div>
        </div>

        <!-- Status message -->
        <?php if(!empty($statusMsg)){ ?>
            <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
        <?php } ?>

        <!-- List of lead -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th width="5%">id</th>
                <th width="10%">Name</th>
                <th width="10%">Contact number</th>
                <th width="20%">Address</th>
                <th width="15%">City</th>
                <th width="14%">State</th>
                <th width="15%">Employment</th>
                <th width="10%">Loan</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($users)){ $i=0; foreach($users as $row){ $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['Lead_name']; ?></td>
                <td><?php echo $row['Contact_number']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['City']; ?></td>
                <td><?php echo $row['State_name']; ?></td>
                <td><?php echo $row['Employment_type']; ?></td>
                <td><?php echo $row['Loan_status']; ?></td>
                <td>
                    <a href="form.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Update</a>
                    <a href="action_performed.php?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?');">delete</a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="5">No user(s) found...</td></tr>
            <?php }  ?>
            </tbody>
        </table>
    </div>