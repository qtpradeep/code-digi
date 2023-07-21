<?php include("header.php");
   if(isset($_SESSION['userid'])){
       $id= $_SESSION['userid'];
       $frid= $_SESSION['frid'];
       $res= $conn->myReferrals($frid); 
       
   }
?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>My Referrals</h1>
    
          </div>
          <div class="section-body">
              <table class="table" id="dt">
                  <thead>
                  <tr>
                      <th>User Name</th>
                      <th>User ID</th>
                      <th>Registration Date</th>
                      
                      
                  </tr>
                  </thead>
                  
                  <tbody>
                      <?php if(mysqli_num_rows($res)>0){
                          while($row= mysqli_fetch_assoc($res)){
                              ?>
                              
                              <tr>
                                  <td><?php echo $row['firstname'].$row['lastname'];?></td>
                                  <td><?php echo $row['userid'];?></td>
                                  <td><?php echo $row['reg_date'];?></td>
                                  
                                  
                                 
                              </tr>
                              
                              <?php
                          }
                      }?>
                  </tbody>
              </table>
          </div>
        </section>
 </div>
 
<?php include("footer.php");?>