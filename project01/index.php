<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LOGIN</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&display=swap" rel="stylesheet">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #f1f1f1;
  color: black;
  font-weight: 700;
  font-size: 1rem;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  border-radius:15px
}

.registerbtn:hover {
  opacity: 1;
  background-color: white;
  border: 2px lightblue solid;
  transition: .5s ease;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
  font-size: 1.1rem;
  font-family: "Pacifico", cursive;
}
</style>
</head>
<body>

    <form action="" method="post">
    <div class="container">
        <h1>Log In</h1>
        <p>Please fill in this form to log in.</p>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
        <hr>
        <p>By log in you agree to our <a href="#">Terms & Privacy</a>.</p>

        <button type="submit" class="registerbtn">Log In</button>
    </div>
    
    <div class="container signin">
        <h4>Prima Medika Hospital</h4>
    </div>
    </form>

    <?php
            session_start();
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once 'dbkoneksi.php';

                $email = $_POST['email'];
                $password = $_POST['psw'];

                $user_query = "SELECT * FROM users WHERE email = ? AND password = ?";
                $stmt = $dbh->prepare($user_query);
                $stmt->execute([$email, $password]);
                $result_user = $stmt->fetch();

                $admin_query = "SELECT * FROM admin_dashboard WHERE email = ? AND password = ?";
                $stmt1 = $dbh->prepare($admin_query);
                $stmt1->execute([$email, $password]);
                $result_admin = $stmt1->fetch();

                if ($result_user !== false) {
                    header("location: Landing Page/index.html");
                    // exit(); 
                } elseif ($result_admin !== false) {
                    header("location: dashboard.php");
                    // exit(); 
                } else {
                    header("location: index.php");
                    // exit(); 
                }
            }
    ?>
</body>
</html>
