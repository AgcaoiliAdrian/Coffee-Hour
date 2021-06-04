<?php
require('top.inc.php');
isAdmin();

$condition='';
$condition1='';

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='2';		
		}
		$update_status_sql="update reservation set status='$status' $condition1 where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from reservation where id='$id' $condition1";
		mysqli_query($con,$delete_sql);
	}
}
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="container">
			 <div class="card">
				<div class="card-header">
					<nav class="navbar-light">
						<div class="container-xl" style="color:#fff";>
							<!-- <a class="navbar-brand" href="#">Products</a> -->Reservation
							<input id="myInput" type="text" placeholder="Search..">
						</div>
					</nav>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
							<thead>
								<tr>
                                    <th class="product-thumbnail">Reservation ID</th>
                                    <th class="product-thumbnail">Name</th>
                                    <th class="product-name"><span class="nobr">Date of Reservation</span></th>
                                    <th class="product-price"><span class="nobr">Time</span></th>
                                    <th class="product-stock-stauts"><span class="nobr">Status</span></th>
                                    <th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								// $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status order by `order`.id desc");
                                $res=mysqli_query($con,"select * from reservation");
								while($row=mysqli_fetch_assoc($res)){
								?>
								<tr>
									<td class="product-name"><?php echo $row['reserve_id']?></td>
                                    <td class="product-name"><?php echo $row['name']?></td>
                                    <td class="product-name"><?php echo $row['date']?></td>
                                    <td class="product-name"><?php echo $row['time']?></td>
                                    <td><?php 
							   if($row['status']==0){
								echo 'Pending';
							   }else if($row['status']==1){
								echo 'Accepted';
								}else if($row['status']==2){
                                    echo 'Declined';
                                }
							   ?></td>
							   
							   <td>
								<?php
								if($row['status']==0){
									echo "<span class='badge badge-complete'><a <a onClick=\"javascript: return confirm('Do you want to proceed?');\" href='?type=status&operation=active&id=".$row['id']."'>Accept</a></span>&nbsp;";
								}else if($row['status']==1){
									echo "<span class='badge badge-complete'><a <a onClick=\"javascript: return confirm('Do you want to proceed?');\" href='?type=status&operation=deactive&id=".$row['id']."'>Accept</a></span>&nbsp;";
								}else if($row['status']==2){
									echo "<span class='badge badge-pending'><a <a onClick=\"javascript: return confirm('Do you want to proceed?');\" href='?type=status&operation=active&id=".$row['id']."'>Decline</a></span>&nbsp;";
                                }			
								echo "<span class='badge badge-delete'><a onClick=\"javascript: return confirm('Are you sure you want to delete this data?');\" href='?type=delete&id=".$row['id']."'>Delete</a></span>";								
								?>
							   </td>
							</tr>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>