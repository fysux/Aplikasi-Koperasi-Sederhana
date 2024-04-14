<?php
include 'dbconfig.php';

if(isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username, $password]);
    if($stmt->rowCount() > 0) {
        header("Location: index.php");
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php        
        if(isset($_POST['login'])) {
            if($stmt->rowCount() == 0) {
                echo "<div class='alert alert-danger'>Username or password is incorrect!</div>";
            }
        }
    ?>
    <div class="container mt-5 mb-5 align-items-center d-flex justify-content-center">
        <form action="" method="POST" class="bg-light p-5 rounded shadow w-50 mt-5 mb-5">
            <div class="mb-3 row d-flex justify-content-center">
                <input type="text" name="email" placeholder="email" class="form-control">
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <input type="password" name="password" placeholder="password" class="form-control">
            </div>
            <input type="submit" name="login" value="login" class="btn btn-primary d-flex justify-content-center text-center">
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>