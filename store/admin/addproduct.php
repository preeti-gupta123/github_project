<?php
include('config.php');
if(isset($_GET['edit']))
{
	$product_edit=$_GET['edit'];
	$stmt=$conn->prepare("SELECT * FROM store WHERE id=?");
	$stmt->bind_param("i",$product_edit);
		$stmt->execute();
	$stmt->bind_result($pid,$pname,$pprice,$pimage,$pcategory);
	while($stmt->fetch())
		{
			$rname=$pname;
			$rprice=$pprice;
		}
	
		$stmt->close();
		$conn->close();
}


?>










<?php include 'header.php'; ?>

<?php $page= basename($_SERVER['PHP_SELF']); ?>

<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
<?php include 'sidebar.php'; ?>

		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?? with PRODUCTS..</p>
			
			<div class="clear"></div> <!-- End .clear -->



		
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
				</div> <!-- End .content-box-header -->
				
				
				<div class="content-box-content">
				
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						


						<form action="data.php" method="post" enctype="multipart/form-data">

							<?php if(isset($_POST['submit'])): ?>


								<div class="notification attention png_bg">
									<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
									<div>
										This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
									</div>
								</div>
						
							<?php  endif; ?>


							<?php if(isset($_GET['edit'])): ?>

							<input type="hidden" name="edit" value="<?php echo $_GET['edit']; ?>" >
					
							<?php endif; ?>

							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Product Name</label>
									<input value="<?php if(isset($_GET['edit'])){echo $rname;} ?>" class="text-input small-input" type="text" id="small-input" name="name" /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
									
								</p>
								
								<p>
									<label>Product Price</label>
									<input value="<?php if(isset($_GET['edit'])){echo $rprice;} ?>"class="text-input small-input datepicker" type="text" id="medium-input" name="price" /> <span class="input-notification success png_bg">Successful message</span>
									<br /><small>A small description of the field</small>
								</p>
								
								<p>
									<label>Product Image</label>
										<input  class="text-input small-input" type="file" id="small-input" name="image" required /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								
					      <!--  <p>
									<label>Checkboxes</label>
									<input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
								</p>
								
								<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" /> This is a radio button<br />
									<input type="radio" name="radio2" /> This is another radio button
								</p>-->
								
								<p>
									<label>Select Category</label>              
									<select name="dropdown" class="small-input">
										<option value=""></option>
										<option value="Cosmetic"  value="Cosmetic" >Sports</option>
										<option value="dress"  value="dress" >Dress</option>
										<option value="Saree"  value="Saree" >Saree</option>
										
										<!--<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>-->
									</select> 
								</p>
									<!--<p>
									<input class="button" name="dropdown" type="Add Product" value="Add Product" />
								</p>-->
								
								
							<!--	<p>
									<label>Textarea with WYSIWYG</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>-->
								
								<p>
								<?php if(!isset($_GET['edit'])): ?>
									<input class="button" type="submit" name="submit" value="Add product" />
								<?php endif;?>

								<?php if(isset($_GET['edit'])): ?>
									<input class="button" name="update" type="submit" value="Update Product" />
									<?php endif; ?>

								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->

							
						</form>
				</div>
				</div>