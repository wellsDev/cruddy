<?php
include_once 'dbconnect.php';

// insert record
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['lname']);
    $code = mysqli_real_escape_string($con, $_POST['lcode']);

    if(mysqli_query($con, "INSERT INTO tbl_language(lname, lcode) VALUES('$name', '$code')")) {
        $success = "Record inserted successfully!";
        header("Location: /");
    } else {
        $error = "Error inserting record...";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP MySQL Simple CRUD | Insert Demo</title>
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
                <h3>PHP CRUD: Add Language</h3>
            </div>
            <div class="panel-body">
                <form name="insertform" method="post" action="insert_language.php">
                    <div class="form-group">
                        <input type="text" name="lname" placeholder="Enter Language Name" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="lcode" placeholder="Language Code" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Insert" class="btn btn-info btn-block" />
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
