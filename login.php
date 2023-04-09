<!DOCTYPE html>
<html>
<head>
	<title>Duns-hub</title>
	<link rel="icon" href="images/hubicon2.png" />
	 <!-- Bootstrap CSS -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-7lJX9oGXLGD6j1T6Ttrf6F1aRJf+6wNCrGxgbZgGGXpwXIKq3oHCFMVK98zCQ2++tBIVq5wA2vZ5Wt2N41YR0A==" crossorigin="anonymous" />
    
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-Rnn7z8pPimEJjcAHJdn1xkmZVJj9e9h7VlQvCv+7V8o5Mws3lbq5wvSmiWS5W8QYrzRnUy4D4PjK4n8fmHfKzw==" crossorigin="anonymous"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-6pXz6TKHmKfNOiexTJ8eGOWw0TH/20pNoMdA/ksKfpy7VlSc9eN9Nz8a5fK0tJq3fQsdvUV/UsSKRdnFX+0yVQ==" crossorigin="anonymous"></script>
    
	<style>
		body {
			background: linear-gradient(to bottom, #663399, #9b59b6);
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		.container {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}
		form {
			background: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
			max-width: 400px;
			width: 100%;
			text-align: center;
		}
		input[type="text"],
		input[type="password"],
		input[type="email"],
		button {
			display: block;
			margin: 20px auto;
			width: 80%;
			padding: 10px;
			border-radius: 5px;
			border: none;
			box-shadow: 0px 0px 5px rgba(0,0,0,0.5);
			font-size: 1em;
			color: #666;
		}
		input[type="submit"] {
			background: #663399;
			color: #fff;
			font-weight: bold;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background: #9b59b6;
		}
		nav {
			background-color: #000;
			padding: 10px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
			margin-bottom: 20px;
			text-align: right;
		}
		nav a {
			color: #666;
			text-decoration: none;
			font-size: 1.2em;
			margin: 0 10px;
		}
		nav a:hover {
			color: #9b59b6;
		}
	</style>
</head>
<body>
	<nav>
		<a href="index.php">Home</a>
		<a href="aboutus.php">About</a>
		<a href="contactus.php">Contact</a>
	</nav>
	<div class="container">
		<form method="post" action="loginfunc.php">
			<h2>Login</h2>
			<input type="text" name="email" placeholder="Email" required>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit" name="login">Login</button>
		</form>
	</div>
</body>
</html>
