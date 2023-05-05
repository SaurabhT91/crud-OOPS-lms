<?php



session_start();


if(!$_SESSION['LOGGED_IN'] === TRUE)
{
    header("Location: index.php");
}
else
{
    $conditions = $_SESSION['USER_ID'];
}

// Include and initialize DB class
require_once 'database_class.php';
$db = new DB();

//    // Fetch the users data

$users = $db->get_leads_by_USER_ID('lead_data',$conditions);
//    $users2 = $db->get_all_users('USERS');



?>

<div class="row">
    <div class="col-md-12 head">
        <h4>Lead Data</h4>
        <!-- Add link -->
        <h5><?php echo " Hello ".$_SESSION['NAME'];?></h5>
        <div class="float-right">
            <button><a href="form.php" class="btn btn-success"><i class="plus"></i>Add New Lead</a></button>
        </div>
        <div>
            <button><a href='logout.php' class="btn btn-danger ml-3">Sign Out</a></button>
        </div>
        <!-- Status message -->
        <?php if(!empty($statusMsg)){ ?>
            <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
        <?php } ?>

        <!-- List the users -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th width="5%">id</th>
                <th width="10%">Name</th>
                <th width="10%">Contact number</th>
                <th width="30%">Address</th>
                <th width="12%">City</th>
                <th width="15%">State</th>
                <th width="15%">Employment</th>
                <th width="5%">Loan</th>
                <th width="5">USER_ID</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($users)) { $i=0;foreach($users as $row) { $i++; ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['Lead_name']; ?></td>
                    <td><?php echo $row['Contact_number']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><?php echo $row['City']; ?></td>
                    <td><?php echo $row['State_name']; ?></td>
                    <td><?php echo $row['Employment_type']; ?></td>
                    <td><?php echo $row['Loan_status']; ?></td>
                    <td><?php echo $row['USER_ID']; ?></td>

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

