<!DOCTYPE html>
<html lang="en">
<head>              
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        * {
            margin:0;
            padding:0;
        }

        .container {
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            margin:35vh auto;
            gap:1rem;
            padding:1rem;
            border:0.5px solid grey;
            border-radius:20px;
            width:20rem;
            height:20rem;
            box-shadow:
            -1px -1px 1px #000, /* Shadow di kiri atas */
            1px -1px 1px #000,  /* Shadow di kanan atas */
            -1px 1px 1px #000,  /* Shadow di kiri bawah */
            1px 1px 1px #000;   /* Shadow di kanan bawah */
        }

        h1 {
            font-family:Verdana;
            margin:0 0 4rem 0;
        }

        form {
            /* margin-right:4rem;
            margin-bottom:6rem;
            position:relative; */
        }

        label {
            font-weight:700;
        }

        input {
            width:30px;
            padding:1rem:
        }

        input:focus {
            width: 100%;
            transition:1.5s ease;
        }

        button {
            width:20rem;
            height:2.5rem;
            border-radius:0.5rem;
            border: 1.5px solid ;
            color:white;
            background-color:navy;
            transition:1.5s ease;
            font-size:15px;
        }

        button:hover {
            background-color:lightblue;
            color:black;
        }
    </style>
</head>

<?php
if(isset($_POST['submit'])) {
    require_once 'dbkoneksi.php';

    $user = $dbh->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $user->execute([$_POST['email'], $_POST['password']]);

    $count = $user->rowCount();

    if($count > 0) {
        session_start();

        $_SESSION['user'] = $user-> fetch();
        header("location:index.php");
    } else {
       header("location:login.php");
    }
}
?>

<body>
    <div class="container">
        <h1>LOG IN</h1>
        <form action="" method="POST">
            <div>
                <label for="">Email:</label> <br>
                <input type="email" name="email" required>
            </div>
            <br>
            <div>
                <label for="">Password:</label> <br>
                <input type="password" name="password" required>
            </div>
            <br>
            <div>
                <button type="submit" name="submit">LOG IN</button>
            </div>
        </form>
    </div>
</body>
</html>