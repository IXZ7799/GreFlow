<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../admin/index.php");
    exit;
}
include 'loginlayout.php';
require_once "../includes/DatabaseConnection.php";
$username = $password = "";
$username_err = $password_err = $login_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                        
                            header("location: ../admin/index.php");
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }
    unset($pdo);

}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>

	<body class="container">
		<div class="row justify-content-center">
			<div class="col-4">
				<div class="my-4">
					<h3>Login</h3>
					<p class="text-muted">Please fill in your credentials to login.</p>
				</div>

				<?php
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }
                ?>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="form-group my-2">
						<label class="mb-1">Username</label>
						<input type="text" name="username" placeholder="Example: Joker"
							class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
							value="<?php echo $username; ?>">
						<span class="invalid-feedback"><?php echo $username_err; ?></span>
					</div>
					<div class="form-group my-2">
						<label class="mb-1">Password</label>
						<input type="password" name="password" placeholder="Example: BatmanSucks123"
							class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
						<span class="invalid-feedback"><?php echo $password_err; ?></span>
					</div>
					<div class="form-group my-4">
						<input type="submit" class="btn btn-outline-primary" value="Login">
					</div>
					<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
				</form>
			</div>
		</div>
	</body>

</html>