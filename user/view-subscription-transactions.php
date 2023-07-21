<?php include("header.php");
    if(isset($_REQUEST['id'])){
        $subscription= $_REQUEST['id'];
        $user= $user['id'];
        $res= $conn->creditInfluencers($subscription);
        $credit= mysqli_fetch_assoc($res);
        
        $campaignres= $conn->campaignTransactions($user, $subscription);
    }
    
?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Subscription Transactions</h1>
          </div>
          <div class="section-body">
              <table class="table table-bordered">
                  <tr>
                      <th>Particulars</th>
                      <th>Credit</th>
                      <th>Debit</th>
                      <th>Date</th>
                      <th>Balance</th>
                  </tr>
                  <tr>
                      <td>From Subscription:<br><?php echo $subscription;?></td>
                      <td><?php echo $credit['influencers'];?></td>
                      <td>--</td>
                      <td><?php echo $credit['subscription_date'];?></td>
                      <td><?php echo $credit['influencers'];?></td>
                      
                  </tr>
                  
                <?php
                    if(mysqli_num_rows($campaignres)>0){
                        $totaldebit=0;
                        while($row= mysqli_fetch_assoc($campaignres)){
                            $debit= $row['influencers'];
                            $totaldebit+=$debit;
                            $balance= $credit['influencers']-$totaldebit;
                            ?>
                            <tr>
                                <td><?php echo "To Campaign ID :<br>".$row['campaignid'];?></td>
                                <td>--</td>
                                <td><?php echo $debit;?></td>
                                <td><?php echo $row['campaign_date'];?></td>
                                <td><?php echo $balance;?></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
              </table>
          </div>
        </section>
</div>

<?php include("footer.php");?>