
							<tbody>
							<?php foreach ($products as $key => $value): ?>
								<tr>

									
									<td><input type="checkbox" /></td>
									<td><?php echo $value['name']; ?></td>
									<td><a href="#" title="title"><?php echo $value['price']; ?></a></td>
									<td><img style="width: 150px;height: 200px;" src='../uploads/images/<?php echo $value['image'];?>'  ></td>
									<td><?php echo $value['dropdown']; ?></td>



									<td>
										<!-- Icons -->
										 <a href="addproduct.php?edit=<?php echo $value['id']; ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="manage.php?dlid=<?php echo $value['id']; ?>"  title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								
									
								
								</tr>
								<?php endforeach; ?>
								
									
								
							</tbody>


							<li>
					<a href="#" class="nav-top-item">
					Tags
					</a>
					<ul>
						<li><a href="#">Upload Images</a></li>
						<li><a href="#">Manage Galleries</a></li>
						<li><a href="#">Manage Albums</a></li>
						<li><a href="#">Gallery Settings</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Events Calendar
					</a>
					<ul>
						<li><a href="#">Calendar Overview</a></li>
						<li><a href="#">Add a new Event</a></li>
						<li><a href="#">Calendar Settings</a></li>
					</ul>
				</li>