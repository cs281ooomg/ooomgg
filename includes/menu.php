<nav>
	<ul>
		<?php if($session_set){ ?>
		<li><a href="profile.php">
		<?php
		$conn = new mysqli('192.168.1.10:3307', 'ooomg', '12345678', 'ooomg');
		$accType = "SELECT * FROM ACCOUNT WHERE ACC_ID = '" . $_SESSION['ACC_ID'] . "'";
		$query = $conn->query($accType);
		$result = $query->fetch_assoc();
		echo $result["ACC_FNAME"] . ' ' .$result["ACC_LNAME"];
		$conn->close();
    ?>
		</a></li>
		<?php } ?>
		<li><a href="index.php" class="active">Home</a></li>
		<?php if(!$session_set){ ?>
		<li><a href="register.php">Register</a></li>
		<?php } ?>
		<li><a href="about.php">About</a></li>
		<li><a href="404.php">Team</a></li>
		<li><a href="product.php">Shop Now</a></li>
		<li><a href="contact.php">Contact</a></li>
		<?php if($session_set){ ?>
		<li><a href="logout.php">Logout</a></li>
		<?php } ?>
	</ul>
</nav>