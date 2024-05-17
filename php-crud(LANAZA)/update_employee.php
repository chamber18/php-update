<?php 

if (isset ($_GET["id"]) && $_GET["id"]){
    include_once("models/Employee.php");
    $empID = $_GET["id"];
    //search db for employees
    $emp = Employee::search($empID);
     if($_SERVER["REQUEST_METHOD"] === "POST"){
        //update db
        $emp->lname = $_POST["lname"];
        $emp->fname = $_POST["fname"];
        $emp->position = $_POST["position"];
        $emp->update();
     }
}else {
    header("location:index.php");
    die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5 p-5 bg-light">
        <p>Employee ID: <strong><?= $empID ?></strong></p>
        <form action="update_employee.php?id=<?= $empID ?>" method = "POST">
        <div class="mb-3 mt-3">
            <label for="fname" class="form-label">Firstname:</label>
            <input value="<?= $emp->fname ?>" type="text" class="form-control"  placeholder="Enter firstname" name="fname">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">lastname:</label>
            <input value="<?= $emp->lname ?>" type="text" class="form-control"  placeholder="Enter lastname" name="lname">
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position:</label>
            <input value="<?= $emp->position ?>" type="text" class="form-control" placeholder="Enter position" name="position">
        </div>
        
        <button type="submit" class="btn btn-primary">Update Employee Information</button>
        </form>
    </div>

</body>
</html>