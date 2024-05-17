


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <?php 
            include("models/Employee.php")            
        ?>

        <!-- <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> This alert box could indicate a successful or positive action.
        </div> -->

        <div class="list">
            <?php include("widgets/new_employee.php") ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
                    $result = Employee::getAll();
                    
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                ?>

                <tr>
                    <td><?= $row["ID"] ?></td>
                    <td><?= $row["lname"] ?></td>
                    <td><?= $row["fname"] ?></td>
                    <td><?= $row["position"] ?></td>
                    <td>
                        <a href="update_employee.php?id=<?= $row["ID"] ?>" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger">Delete</button>
                     </td>
                </tr>

                <?php 
                    }
                }
                ?>
              
            </table>
        </div>
    </div>
</body>
</html>