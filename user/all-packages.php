<?php include("header.php");
    $res= $conn->allPackages();
?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Packages</h1>
           
          </div>
          <div class="section-body">
            <div class="row">
                
                <?php
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            ?>
                             <div class="col-12 col-md-3 col-lg-4 p-3 ml-3">
                                <div class="card">
                                  <div class="card-header bg-light d-block shadow">
                                        <strong><?php echo $row['name'];?></strong>
                                    <div class="pricing-price float-right">
                                     <span class="text-danger"><strong><?php echo "Rs ".$row['price']+($row['price']*0.18);?></strong></span>
                                    </div>
                                  </div>
                                  <div class="pricing-padding card-body text-center">
                                    <p>
                                       <?php echo $row['description'];?> 
                                    </p>
                                    <div class="pricing-details">
                                      <div class="pricing-item">
                                        <div class="pricing-item-label font-weight-bold">
                                            <i class="fas fa-check"></i> <?php echo $row['influencers']. " Influencers";?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="pricing-cta card-footer text-center">
                                    <a href="buy-subscription.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Get Started <i class="fas fa-arrow-right"></i></a>
                                  </div>
                                </div>
                            </div>
                            
                            <?php
                        }
                    }
                
                ?>
             
             
            </div>
          </div>
        </section>
</div>
<style>
    .font-weight-bold{
        font-weight: bold;
    }
   
</style>


<?php include("footer.php");?>