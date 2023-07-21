<?php include("header.php");
   if(isset($_SESSION['userid'])){
       $id= $_SESSION['userid'];
       $frid= $_SESSION['frid'];
       
   }
?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>My Sales</h1>
    
          </div>
          <div class="section-body">
              <table class="table" id="dt">
                  <thead>
                  <tr>
                      <th>User Name</th>
                      <th>Sponsor ID</th>
                      <th>Franchise ID</th>
                      <th>Subscription ID</th>
                      <th>Amount</th>
                      <th>Subscription Date</th>
                      
                  </tr>
                  </thead>
                  
                  <tbody>
                      <?php 
                        $json = $conn->mySales($frid);
                        $data= json_decode($json, true);
                        
                        foreach($data as $d){
                            $i=0;
                                $res= $conn->displayReferralSales($d['id']);
                                if(mysqli_num_rows($res)>0){
                                    while($row= mysqli_fetch_assoc($res)){
                                        
                                    ?>
                                        
                                        <tr>
                                           <td><?php echo $d['firstname'].' '.$d['lastname'];?><br><?php echo $d['userid'];?></td>
                                           <td><?php echo $d['sponsor_id'];?></td>
                                           <td><?php echo $frid;?></td>
                                           <td><?php echo $row['subscriptionID'];?></td>
                                           <td><?php echo $row['amount'];?></td>
                                           <td><?php echo $row['subscription_date'];?></td>
                                        </tr>
                                    
                                    <?php
                              $i++;  }
                           
                        }
                        }
                        
                        
                     
                        
                      
                      
                       ?>
                  </tbody>
              </table>
          </div>
        </section>
 </div>
 
<?php include("footer.php");?>