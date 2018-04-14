<div class="wrapper_top_w3layouts">
	<div class="header_agileits">
		<div class="logo inner_page_log">
			<h1>
				<a class="navbar-brand" href="index.php"><span class="panter">OO</span>
					<i class="panter">OMG</i></a>
			</h1>
		</div>
		<div class="overlay overlay-contentpush">
			<button type="button" class="overlay-close">
				<i class="fa fa-times" aria-hidden="true"></i>
			</button>

			<nav>
				<ul>
					<li><a href="index.php" class="active">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="404.php">Team</a></li>
					<li><a href="product.php">Shop Now</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
		</div>
		<div class="mobile-nav-button">
			<button id="trigger-overlay" type="button">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>
		</div>
		<!-- cart details -->
		
		<div class="top_nav_right_acc">
		<!-- button class="top_shoe_cart dropdown-toggle" data-toggle="dropdown">
			<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
		</button-->
		<button class="top_shoe_cart" onclick="window.location.href='login.php'">
			<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
		</button>
		<ul id="login-dp" class="dropdown-menu">
			<li>
				<div class="row">
					<div class="col-md-12">
						<p>LOGIN</p>
						<form class="form" role="form" method="post"
							action="control/login_auth.php" accept-charset="UTF-8"
							id="login-nav">
							<div class="form-group">
								<label class="sr-only" for="usernameIn">Username</label> <input
									type="text" class="form-control" id="usernameIn"
									placeholder="Username" required>
							</div>
							<div class="form-group">
								<label class="sr-only" for="passwordInput">Password</label> <input
									type="password" class="form-control" id="passwordInput"
									placeholder="Password" required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">LOGIN</button>
							</div>
						</form>
					</div>
					<div class="bottom text-center">
						New here ? <a href="register.php"><b>REGISTER</b></a>
					</div>
				</div>
			</li>
		</ul>
	</div>
	
		<div class="top_nav_right">
			<button class="top_shoe_cart" onclick="window.location.href='checkout.php'">
				<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
			</button>
		</div>
	</div>
</div>