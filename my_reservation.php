<?php 
require('top.php');
?>
<div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Reservation ID</th>
                                                <th class="product-name"><span class="nobr">Date of Reservation</span></th>
                                                <th class="product-price"><span class="nobr">Time</span></th>
												<th class="product-stock-stauts"><span class="nobr">Status</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$uid=$_SESSION['USER_ID'];
											// $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status order by `order`.id desc");
                                            $res=mysqli_query($con,"select * from reservation");
											while($row=mysqli_fetch_assoc($res)){
											?>
                                            <tr>
                                                <td class="product-name"><?php echo $row['reserve_id']?></td>
                                                <td class="product-name"><?php echo $row['date']?></td>
                                                <td class="product-name"><?php echo $row['time']?></td>
                                                <td><?php 
                                                if($row['status']==0){
                                                    echo 'Pending';
                                                }else if($row['status']==1){
                                                    echo 'Accepted';
                                                }else{
                                                    echo 'Declined';
                                                }
                                                ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php require('footer.php')?>
