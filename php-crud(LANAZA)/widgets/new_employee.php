<?php 
include_once("models/Employee.php");
   if (isset($_POST["submit"])){
    $newEmployee = new Employee($_POST["fname"],$_POST["lname"],$_POST["position"]);
    $newEmployee->save();
   }
?>

<form class="mt-3 mb-3 p-3 bg-info" action="index.php" method="POST">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Enter Position" name="position">
    </div>
    <div class="col">
        <input type="submit" class="btn btn-success" name="submit" value="Create New Employee">
    </div>
  </div>
</form>