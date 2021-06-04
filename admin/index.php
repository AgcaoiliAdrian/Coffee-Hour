<?php
require('top.inc.php');
	$get_users = "select * from users";
	$run_users = mysqli_query($con,$get_users);
	$count_users = mysqli_num_rows($run_users);

	$get_product = "select * from product";
	$run_product = mysqli_query($con,$get_product);
	$count_product = mysqli_num_rows($run_product);	

	$get_income = "select * from categories";
	$run_income = mysqli_query($con,$get_income);
	$count_income = mysqli_num_rows($run_income);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Dashboard </h4>
				</div>
			</div>
		  </div>
	   </div>
	</div>
</div>
<main>
    <div class="dashboard-cards">
        <div class="card-single users">
		<div>
			<span><i class="fas fa-users"></i></span>
            </div>
            <div>
                <h1><?php echo $count_users; ?> </h1>
                <span>Users</span>
            </div>

        </div>

        <div class="card-single order">
		<div>
		<span><i class="fas fa-coffee"></i></span>
            </div>
            <div>
                <h1><?php echo $count_product; ?></h1>
                <span>Products</span>
            </div>
        </div>
       
        <div class="card-single income">
		<div>
		<span><i class="fas fa-list"></i></span>
            </div>
            <div>
                <h1><?php echo $count_income; ?></h1>
                <span>Categories</span>
            </div>
        </div>
    </div>

	<div class="content pb-0">
	<div class="orders">
	   <div class="container">
			 <div class="card">
				<div class="card-header">
					<nav class="navbar-light">
						<div class="container-xl" style="color:#fff";>
							<!-- <a class="navbar-brand" href="#">Products</a> -->Orders
						</div>
					</nav>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
							<thead>
								<tr>
									<th class="product-name"><span class="nobr">Order Date</span></th>
									<th class="product-name"><span class="nobr">Name</span></th>
									<th class="product-name"><span class="nobr">No</span></th>
									<th class="product-price"><span class="nobr"> Address </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
									<th class="product-thumbnail"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status order by `order`.id desc");
								while($row=mysqli_fetch_assoc($res)){
								?>
								<tr>
									<td class="product-name"><?php echo $row['added_on']?></td>
									<td class="product-name"><?php echo $row['user_name']?></td>
									<td class="product-name"><?php echo $row['contact']?></td>
									<td class="product-name">
									<?php echo $row['address']?><br/>
									<?php echo $row['city']?><br/>
									<?php echo $row['pincode']?>
									</td>
									<td class="product-name"><?php echo $row['payment_type']?></td>
									<td class="product-name"><?php echo $row['payment_status']?></td>
									<td class="product-name"><?php echo $row['order_status_str']?></td>
									<td class="product-add-to-cart"><a href="order_master_detail.php?id=<?php echo $row['id']?>" class="update"><?php $row['id']?>Update</a><br/><br/>
									<a href="../order_pdf.php?id=<?php echo $row['id']?>" class="pdf">PDF</a></td>
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
</main>
