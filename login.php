<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require "functions.php";
        session_start();
        if(isset($_SESSION['status_login'])){
            if($_SESSION['status_login']==true){
                echo "
                        <script>
                            window.location='dashboard.php';
                        </script>
                        ";
            }
        }
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($username == "admin" and $password == "admin"){
                $_SESSION['status_login'] = true;
                $_SESSION['id'] = $row['username'];
                echo "
                        <script>
                            window.location='dashboard.php';
                        </script>
                        ";
            } else{
                $error = true;
            }
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background-color: #d1e4f3;
            overflow: hidden;
            width: 100vw;
            height: 100vh;
        }
        .title-login{
            font-family: "Times New Roman";
        }
        form{
            background-color: white;
            border-radius: 5px;
            padding: 30px 20px;
        }
        p{
            font-weight: 700;
        }
        input{
            width: 100%;
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #D0D0D0;
            margin: 10px 0;
        }
        input[type="submit"]{
            background-image: linear-gradient(to left, #369A90, #005571);
            color: white;
        }
    </style>
</head>
<body class="d-flex flex-column justify-content-center align-items-center">
    <h1>Selamat Datang</h1>
    <h1 class="title-login">SISTEM INFORMASI PENDAFTARAN PASIEN KLINIK DOKTER IDA</h1>
    <p class="mb-5">Utara Masjid Nurul Huda Jatisrono RT 02 / RW 03, Jatisrono, Wonogiri</p>
    <div class="wrap-form">
        <form action="" method="post" class="text-center">
            <img src="asset/logo.png" class="text-center">
            <p class="text-center
                <?php
                    if(isset($error)){
                        echo 'text-danger">Username or password wrong';
                    } else {
                        echo '">Input username and password to login';
                    }
                ?></p>
            <input type="text" name="username" placeholder="Username" autocomplete="off">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="login" name="submit">
        </form>
    </div>
</body>
</html>