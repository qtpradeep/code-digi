<?php include("header.php");
    if(isset($_REQUEST['id'])){
        $campaign= $_REQUEST['id'];
        $res= $conn->getsharedcampaignfromInfluecners($campaign);
        
    }
    
?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Campaign Report</h1>
          </div>
          <div class="section-body">
              <table class="table table-bordered">
                  <tr>
                      <th>Campaign ID</th>
                      <th>Influencer Name</th>
                      <th>Shared URL</th>
                      <th>Post Date</th>
                      <th>Action</th>
                  </tr>
                  <?php
                    if(mysqli_num_rows($res)>0){
                        while($row= mysqli_fetch_assoc($res)){
                            $infres= $conn->getInfluencer($row['influencer_id']);
                            $influencer = mysqli_fetch_assoc($infres);
                            ?>
                                <tr>
                                  <th class="text-danger"><?php echo $conn->getCampaignID($row['campaign_id']);?></th>
                                  <td><?php echo $influencer['fname'].' '.$influencer['lname'];?></td>
                                  <td><?php echo $row['post_link'];?></td>
                                  <td><?php echo $row['submit_date'];?></td>
                                  <td>
                                      <?php
                                      if($row['is_reported']==1){
                                          echo "<b class=text-danger>Task Reported</b>";
                                      }else{
                                      ?>
                                      <a href="report-influencer.php?camp=<?php echo $row['campaign_id'];?>&inf=<?php echo $influencer['id'];?>&task=<?php echo $row['id'];?>" class="btn btn-primary">Report To Influecner</a></td>
                                    <?php }?>
                                  
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