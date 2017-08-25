

<?php
 include("config.php");

if(isset($_GET['delete']))
{
	echo "<script type='text/javascript'>";
	echo "alert('Deleted Successfully')";
	echo "</script>";

		$id_to_delete=$_GET['delete'];
		$stmt=$conn->prepare("DELETE FROM store WHERE id=?");
		$stmt->bind_param("i",$id_to_delete);
		$stmt->execute();

	}

$stmt=$conn->prepare("SELECT COUNT(*) FROM store");
	$stmt->bind_result($num_rows);
	$limit_page=4;
	$offset=0;
	$stmt->execute();

	while($stmt->fetch())
	{
		$total=$num_rows;
	}

	//echo $total;

	$total_pages=ceil($total/$limit_page);

	if(isset($_GET['lid']))
	{
		for($i=1;$i<=$total_pages;$i++)
		{
			if($i==$_GET['lid'])
			{
				$offset=($i-1)*$limit_page;
			}
		}
	}





	


 $products=array();

 $stmt=$conn->prepare("SELECT * FROM store LIMIT ?,?");
 $stmt->bind_param("ii",$offset,$limit_page);
 $stmt->execute();

 $stmt->bind_result($id,$name,$price,$image,$category);
 while($stmt->fetch())
 {
 	array_push($products,array("id"=>$id,"name"=>$name,"price"=>$price,"image"=>$image,"dropdown"=>$category));
 }

 $stmt->close();
 $conn->close();

?>


<?php include("header.php"); ?>

	<?php $page=basename($_SERVER['PHP_SELF']); ?>
		
		<?php include("sidebar.php"); ?>
		
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
			<p id="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set">
				
				<!--<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
					Write an Article
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Create a New Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/clock_48.png" alt="icon" /><br />
					Add an Event
				</span></a></li>
				
				<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>-->
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>

								   <th>Name</th>
								   <th>Price</th>
								   <th>Image</th>
								   <th>Category</th>
								   <th>Action</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">

										<?php for($i=1;$i<=$total_pages;$i++)
											{


												echo '<a href="manage.php?lid='.$i.'" class="number" title="1"> '.$i.' </a>';


											} ?>
											</div>
										<!--	<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
							<?php foreach ($products as $key => $value): ?>
								<tr>

									
									<td><input type="checkbox" /></td>
									<td><?php echo $value['name']; ?></td>
									<td><a href="#" title="title"><?php echo $value['price']; ?></a></td>
									<td><img style="width: 90px;height: 50px;" src='../uploads/images/<?php echo $value['image'];?>'  ></td>
									<td><?php echo $value['dropdown']; ?></td>



									<td>
										<!-- Icons -->
										 <a href="addproduct.php?edit=<?php echo $value['id']; ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="manage.php?delete=<?php echo $value['id']; ?>"  title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								
									
								
								</tr>
								<?php endforeach; ?>
								
									
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="content-box column-left">
				
				<div class="content-box-header">
					
					<h3>Content box left</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>Maecenas dignissim</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="content-box column-right closed-box">
				
				<div class="content-box-header"> <!-- Add the class "closed" to the Content box header to have it closed by default -->
					
					<h3>Content box right</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>This box is closed by default</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			
			   	<!--<div class="notification attention png_bg">
					<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
					</div>
				</div>
			
				<div class="notification information png_bg">
					<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
					</div>
				</div>
				
				<div class="notification success png_bg">
					<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
					</div>
				</div>
				
				<div class="notification error png_bg">
					<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
					</div>
				</div>-->
			
			<!-- End Notifications -->
			
			<?php include("footer.php"); ?>
			
		</div> <!-- End #main-content -->
	</div></body>
</html>
