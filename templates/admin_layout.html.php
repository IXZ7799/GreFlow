<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title><?=$title?></title>
		<link rel="icon" type="image/x-icon" href="../images/gf-logo.ico">
	</head>

	<body class="container">
		<nav class="navbar navbar-light border-bottom" style="background-color: #000001;">
			<div class="container">
				<div class="nav-item">
					<h5 style="color:white;">GreFlow</h5>
				</div>
				<div class="nav-item"><a class="nav-link" style="color:white;" href="index.php">Home</a></div>
				<div class="nav-item"><a class="nav-link" style="color:white;" href="questions.php">Manage Questions</a></div>
				<div class="nav-item"><a class="nav-link" style="color:white;" href="categories.php">Manage Categories</a></div>
				<div class="nav-item"><a class="nav-link" style="color:white;" href="authors.php">Manage Authors</a></div>
				<div class="nav-item"><a class="nav-link" style="color:white;" href="addauthors.php">Add Authors</a></div>
				<div class="nav-item"><a class="nav-link" style="color:white;" href="../index.php">Public Site</a></div>
			</div>
		</nav>
		<main>
			<?=$output?>
		</main>
	</body>

</html>