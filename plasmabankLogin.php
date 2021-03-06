<!doctype html>
<html lang="en">
  <head>
    <title>Welcome</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


    <?php
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $adminid = "admin@gmail.com";
            $adminPassword = "admin@123";

            include "conn.php";
            $creds = "SELECT * FROM plasma_banks where email = '$email'";
            $result = mysqli_query($conn,$creds);
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] == $password) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['pid'] = $row['id'];
                // var_dump($_SESSION['pid']);
                header("location: plasmadashboard.php");
            }
            else {
                header("location: index.php");
            }
            

        }  

    ?>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <li class="nav-item navbar-brand">
                <a class="navbar-brand" href="#">Plasma Therapy</a>
            </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="plasmabankRegister.php">Register a Plasma Bank</a>
                </li>
            </ul>
            <!-- <li class="navbar-nav ml-auto">
                <a class="nav-link" href="logout.php">
                    <span class="material-icons">login</span>
                </a>
            </li> --> 
        </nav>

        <div class="container mt-5 p-5 my-5 bg-dark  border">
      <div class="row justify-content-center">
      <div class="col-md-8">
      <div class="card">
      <div class="card-header">Plasma Login</div>
            <form action="plasmabankLogin.php" method="POST">

            <div class="form-group row">
                <label for="" class="col-md-4 col-form-label text-md-right">Email:</label>
                <div class="col-md-6">
                <input type="email" class="form-control" name="email" id="" placeholder="Enter Email">
                </div>
            </div>

                <div class="form-group row">
                <label for="" class="col-md-4 col-form-label text-md-right">Password:</label>
                <div class="col-md-6">
                <input type="password" class="form-control" name="password" id="" placeholder="Enter Password">
                </div>
                </div>
                <div class="col-md-6 offset-md-4">
                <input type="submit" name="login" value="Login" class="btn btn-success">        
            
            </form>
            <!-- <a href="register.php">
                <button class="btn btn-danger">Register</button>
            </a> -->
        </div>
        </div></div></div></div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>