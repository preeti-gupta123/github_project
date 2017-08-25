<div id="header">
		<h1 id="logo">Logo</h1>
		<ul id="menu">
				<li><a href="task13.php">Home </a></li>
				<li><a href="task13.php">Products</a></li>
				<li><a href="">Contact</a></li>
			</ul>
		</nav>
		<div>
		<?php
		if(isset($_SESSION['cart']) && isset($_SESSION['user']) && isset($_SESSION['total_quantity']))	
			{
				
					echo "Added to cart:".$_SESSION['total_quantity'];
					echo "<br>Total Amount $:".$_SESSION['total_amount'];

					
			}	
?>

<?php 
				if(isset($_SESSION['user']))
				{
					echo "<h2>".$_SESSION['role']."</h2>";
					echo "<br>"; 
					echo "Welcome"." ".$_SESSION['user']."<br>";
				}
			?>
		</div>
		<nav>
			<ul id="menu">

				
			</ul>
		</nav>
		<div>
		

   			<?php

		
				if(isset($_SESSION['user']))
				{
				echo $_SESSION['role'];
				echo "<br>"; 
				echo "Welcome"." ".$_SESSION['user'];
			    }
			?>
			

			<a href="checkout.php"><?php if(isset($_SESSION['user'])) echo "Checkout" ?></a>
			<a href="login.php"><?php if(!isset($_SESSION['user']))echo "Login" ?></a>
			<a href="logout.php"><?php if(isset($_SESSION['user']))echo "Logout" ?></a>
			<a href="register.php">Register </a>
			

		
		</div>
	</div>