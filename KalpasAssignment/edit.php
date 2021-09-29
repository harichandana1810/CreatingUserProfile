<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $db->update();
    $id = $_GET['id'];
    $result = $db->get_record($id);
    $data = mysqli_fetch_assoc($result);
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

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Update Record </h2>
                    </div>
                        <?php $db->update(); ?>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input type="text" name="name" placeholder="name" class="form-control mb-2" required value=
                                "<?php echo $data['name']; ?>" >
                                <input type="Email" name="email" placeholder=" User Email ID" class="form-control mb-2" required value="<?php echo $data['email']; ?>" >
                                <br>
                                <input type="text" name="mobile" placeholder="User Mobile Number" class="form-control mb-2" required value="<?php echo $data['mobile']; ?>">
                                <input type="text" name="password" placeholder="Edit Password" class="form-control mb-2" required value="<?php echo $data['password']; ?>">
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Update </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>