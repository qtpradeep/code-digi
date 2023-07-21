<?php include("header.php");

$res= $conn->userCampaigns($user['id']);
?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>My Campaign</h1>
          
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Campaign Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dt">
                        <thead>
                          <tr>
               
                            <th>Campaign ID</th>
                            <th>Type</th>
                            <th>Link</th>
                            <th>Influencers(Alloted)</th>
                            <th>Influencers(Worked)</th>
                            <th>View</th>
                            <th>Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(mysqli_num_rows($res)>0){
                                    while($row= mysqli_fetch_assoc($res)){
                                        ?><tr>
                                            <th class="text-danger"><?php echo $row['campaignid'];?></td>
                                            <td><?php echo $row['type'];?></td>
                                            <td><?php echo $row['url'];?></td>
                                            <td><?php echo $row['influencers'];?></td>
                                            <td><?php echo $conn->displayInfluencersCount($row['id']);?></td>
                                            <td>
                                                <?php if($row['status']==1){?>
                                                    <a href="campaign-report.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Promotion Details</a></td>
                                                <?php }?>
                                                
                                            <td>
                                                <?php echo ($row['status']==1)? '<span class=text-success><b>Running</b></span>' : '<span class=text-danger><b>Pending For Verification</b></span>';?>
                                            </td>
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