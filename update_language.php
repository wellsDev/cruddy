<?php
include_once 'dbconnect.php';

if (isset($_GET['langid'])) {
    $sql = "SELECT * FROM tbl_language WHERE id=" . $_GET['langid'];
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
}

// update record
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($con, $_POST['lid']);
    $name = mysqli_real_escape_string($con, $_POST['lname']);
    $code = mysqli_real_escape_string($con, $_POST['lcode']);

    if(mysqli_query($con, "UPDATE tbl_language SET lname='$name', lcode='$code' WHERE id=" .  $id)) {
        $success = "Record updated successfully!";
        header("Location: /");
    } else {
        $error = "Error updating record...";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP MySQL Simple CRUD | Update Demo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <style type="text/css">
    form {
        margin: 0 auto;
        width: 60%;
    }
    </style>
</head>
<body>
<div class="container" style="margin-top: 20px;">
<div class="row">
    <div class="col-xs-8 col-xs-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3>PHP CRUD: Update Language</h3>
            </div>
            <div class="panel-body">
                <form name="insertform" method="post" action="update_language.php">
                    <div class="form-group">
                        <input type="hidden" name="lid" value="<?php if(isset($row['id'])) { echo $row['id']; } ?>" />
                        <input type="text" name="lname" placeholder="Enter Language Name" value="<?php if(isset($row['lname'])) { echo $row['lname']; } ?>" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="lcode" placeholder="Language Code" value="<?php if(isset($row['lcode'])) { echo $row['lcode']; } ?>" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update" class="btn btn-info btn-block" />
                    </div>
                    <span class="text-success"><?php if (isset($success)) { echo $success; } ?></span>
                    <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                </form>
            </div>
            <div class="panel-footer text-center">
                <a href="/">« Back to index page</a>
            </div>
        </div>
    </div>
</div>
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
