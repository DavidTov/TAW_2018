

<body>
<header>								
<?php
	if($before_login)
	{
?>
<center>
	<nav class="navegacion">
		<ul class="menu">
		<li><a href="index.php?page=index">Home</a></li>
		<li><a href="index.php?page=register">Register</a></li>
		<li><a href="index.php?page=login">Login</a></li>
		<li><a href="index.php?page=forgot_password">Forgot Password</a></li>
		</ul>
	</nav>
	</center>
<?php
	}
	else if($after_login)
	{
?>
<center>
	<nav class="navegacion">
		<ul class="menu">
		<li><a href="index.php?page=home">Home</a></li>
		<li><a href="index.php?page=profile">Profile</a></li>
		<li><a href="index.php?page=book_add">Add Book</a></li>
		<li><a href="index.php?page=book_list">List Book</a></li>
		<li><a href="index.php?page=logout">Logout</a></li>
		</ul>
	</nav>
	</center>
<?php
	}
?>

	</header>

