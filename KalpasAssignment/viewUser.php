<?php 
    
    require_once('./config/dbconfig.php');
    $id = $_GET['id'];
    $db = new operations();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Crud Operation in Php Using OOP</title>
</head>
<body class="bg-dark">

    
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark"> Users Record </h2>
                    </div>
                    <h3><b><a rel="hover" class="button_hover" href="view.php">Home</a></b></h3>
                    <h3><a href="index.php">Add users</a></h3>
                    <div class="card-body">
                        
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%"> ID </td>
                                <td style="width: 10%"> Name </td>
                                <td style="width: 20%"> Mobile </td>
                                <td style="width: 20%"> Email </td>
                            </tr>
                            <tr>
                                <?php 
                                $username = "root";
                                $password = "";
                                $database = "kalpas";
                                $mysqli = new mysqli("localhost", $username, $password, $database);
                                $query = "SELECT * FROM users where id='$id'";
                                if ($result = $mysqli->query($query)) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row["id"];
                                    $name = $row["name"];
                                    $mobile = $row["mobile"];
                                    $email = $row["email"];
                                    echo '
                                        
                                        <tr border="1px">
                                        <td>'.$id.'</td><br>
                                        <td>'.$name.'</td> <br>
                                        <td>'.$mobile.'</td> <br>
                                        <td>'.$email.'</td> <br>
                                        </tr>
                                        </h3>
                                        </center>

                                    ';
                                }
                                $result->free();
                            }
                        ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
