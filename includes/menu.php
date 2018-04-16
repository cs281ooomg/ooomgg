<nav>
	<ul>
		<?php if($session_set){ ?>
		<li><a href="profile.php">
		<?php
		  echo $acc->getFNAME().' '.$acc->getLNAME();
        ?>
		</a></li>
		<?php } ?>
		<li><a href="index.php" class="active">Home</a></li>
		<?php if(!$session_set){ ?>
		<li><a href="register.php">Register</a></li>
		<?php } ?>
		<li><a href="about.php">About</a></li>
		<li><a href="404.php">Team</a></li>
		<?php if ($session_set){?>
		<?php if ($acc->getTYPE() == '1'){ ?>
		<li><a href="add_Catagory.php">Add Catagory</a></li>
		<li><a href="add_Product.php">Add Product</a></li>
		<?php } ?>
		<?php }?>
		<li><a href="product.php">Shop Now</a></li>
		<li><a href="contact.php">Contact</a></li>
		<?php if($session_set){ ?>
		<li><a href="logout.php">Logout</a></li>
		<?php } ?>
	</ul>
</nav>