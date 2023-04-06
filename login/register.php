<?php
// Include config file
require_once "../includes/DatabaseConnection.php";
include 'loginlayout.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Sign Up</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>

	<body class="container">
		<div class="row justify-content-center">
			<div class="col-4">
				<div class="my-4">
					<h3>Sign Up</h3>
					<p class="text-muted">Please fill this form to create an account.</p>
				</div>
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
							class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
							value="<?php echo $password; ?>">
						<span class="invalid-feedback"><?php echo $password_err; ?></span>
					</div>
					<div class="form-group my-2">
						<label class="mb-1">Confirm Password</label>
						<input type="password" name="confirm_password" placeholder="Example: BatmanSucks123"
							class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
							value="<?php echo $confirm_password; ?>">
						<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
					</div>
					<div class="form-group my-4">
						<input type="submit" class="btn btn-outline-primary" value="Create Account">
					</div>
					<p>Already have an account? <a href="login.php">Login here</a>.</p>
				</form>
			</div>
		</div>
	</body>

</html>