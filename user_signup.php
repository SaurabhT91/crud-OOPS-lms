<!DOCTYPE html>
<html>
<head>
    <title>User Sign up</title>
</head>
<body>
<div class="row">
    <div class="col-md-12 head">
        <h2>SIGN UP</h2>

        <!-- Back link -->
        <div class="float-right">
            <a href="user_page.php" class="btn btn-success"><i class="back" ></i> Back</a>
        </div><br>
    </div>



    <div class="col-md-12">
        <form method="post" action="action_performed.php" class="form">
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" name="USER_NAME" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" required="">
            </div><br>
            <div class="form-group">
                <label>User Password</label>
                <input type="password" class="form-control" name="PASSWORD" value="<?php echo !empty($postData['PASSWORD'])?$postData['PASSWORD']:''; ?>" required="">
            </div><br>

            <div class="form-group">
                <label>User ID</label>
                <input type="number" name="USER_ID" value="<?php echo !empty($_POST['USER_ID'])?trim($_POST['USER_ID']):''; ?>" required="">
            </div><br>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="NAME" value="<?php echo !empty($postData['USER_NAME'])?$postData['USER_NAME']:''; ?>" required="">
            </div><br>

            <input type="hidden" name="action_type" value="signup"/>
            <input type="submit" class="form-control btn-primary" name="submit" value="Save"/>

        </form>
    </div>
</div>


</body>
</html>