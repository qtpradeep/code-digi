<?php include("header.php");
    include("connector.php");
    $res= $conn->taskPaymentDetails();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage Payment Details</h1>
            
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-striped table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Task ID</th>
                              <th>DD/UTR Number</th>
                              <th>Influencer</th>
                              <th>Amount</th>
                              <th>TDS</th>
                              <th>Final Amount</th>
                              <th>Payment Date</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    $infres= $conn->getUser($row['influencer_id']);
                                    $infrow= mysqli_fetch_assoc($infres);
                                    ?>
                                        <tr>
                                            <td><?php echo "DZTASK".$row['taskid'];?></td>
                                            <td><?php echo $row['dd_utr'];?></td>
                                            <td><?php echo $infrow['fname'].' '.$infrow['lname'];?></td>
                                            <td><?php echo $row['amount'];?></td>
                                            <td><?php echo $row['tds'];?></td>
                                            <td><?php echo $row['amount']-$row['tds'];?></td>
                                            <td><?php echo $row['payment_date'];?></td>
                                    
                                        </tr>
                                    
                                    <?php
                                }
                            }
                          ?>
                      </tbody>
                  </table>
              </div>
         </div>
        </section>
 </div>
 
<?php include("footer.php");?>