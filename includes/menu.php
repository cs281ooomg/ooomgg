<nav>
	<ul>
		<?php if($session_set){ ?>
		<li><a href="#" onclick ="alert('Profile Coming Soon!!!')">
		<?php
		  echo $acc->getFNAME().' '.$acc->getLNAME();
        ?>
		</a></li>
		<?php } ?>
		<li><a href="index.php" class="active">Home</a></li>
		<?php if(!$session_set){ ?>
		<li><a href="register.php">Register</a></li>
		<?php } ?>
		<li><a href="history.php?acc_id=<?php echo $account->getID()?>">History</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="404.php">Team</a></li>	
		<?php if ($session_set){ ?>
		    <li><a href="product_fav.php">My Favourite</a></li> 
		    <?php if ($acc->getTYPE() == '1'){ ?>
            		<li><a href="add_category.php">Add Catagory</a></li>
            		<li><a href="add_product.php">Add Product</a></li>
            		<li><a href="promotion_mgnt.php">Promotion Manage</a></li>
			<?php } 
		      }?>
		<li><a href="product.php">Shop Now</a></li>
		<li><a href="contact.php">Contact</a></li>
		<?php if($session_set){ ?>
		<li><a href="logout.php">Logout</a></li>
		<?php } ?>
	</ul>
</nav>