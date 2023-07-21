<?php include("header.php");
if(isset($_SESSION['userid'])){
    $res= $conn->allSubscriptions($_SESSION['userid']);
}


?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>My Subscriptions</h1>
          
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Subscription Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dt">
                        <thead>
                          <tr>
                            <th>Subscription ID</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>GST</th>
                            <th>Net Amount</th>
                            <th>Payment Status</th>
                            <th>Payment Date</th>
                            <th>Invoice</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                if(mysqli_num_rows($res)>0){
                                    while($row= mysqli_fetch_assoc($res)){
                                        $discountres= $conn->displaycouponDiscount($row['coupon']);
                                        $discount= mysqli_fetch_assoc($discountres);
                                        if($row['payment_status']==0){
                                            $status="Pending";
                                        }elseif($row['payment_status']==1){
                                            $status="Approved";
                                            
                                        }elseif($row['payment_status']==2){
                                            $status="Disapproved";
                                        }
                                        
                                        ?>
                                            <tr>
                                                <th><?php echo $row['subscriptionID'];?></th>
                                                <th><?php echo $row['amount'];?></th>
                                                <td><?php echo isset($discount['discount'])? $discount['discount'].'%' : '';?><br>
                                                    <b><?php echo(!empty($row['coupon']))? '('.$row['coupon'].')' : '';?></b>
                                                </td>
                                                <td><?php echo $row['gst'];?></td>
                                                <th><?php echo $row['net_amount'];?></th>
                                                <td><?php echo $status; ?></td>
                                                <td><?php echo $row['subscription_date'];?></td>
                                                <td><?php if($status=="Approved"){
                                                    ?><a href="invoice.php?id=<?php echo $row['id'];?>" class="btn btn-success">View Invoice</a></a><?php
                                                }?>
                                                </td>
                                                <td><a href="view-subscription-transactions.php?id=<?php echo $row['subscriptionID'];?>" class="btn btn-primary">View Influencer Details</a></td>
                                                
                                            </tr>
                                            
                                        <?php
                                    }
                                }
                            
                            ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
        
      </div>

<?php include("footer.php");?>