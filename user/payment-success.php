<?php include("header.php");
if(isset($_SESSION['userid']) && isset($_REQUEST['id'])){
    $res= $conn->getSubscription($_SESSION['userid'], $_REQUEST['id']);
    $row= mysqli_fetch_assoc($res);
    
    $packageres= $conn->getPackageByCode($row['package_id']);
    $package= mysqli_fetch_assoc($packageres);
}
?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Payment Confirmation</h1>
          
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="alert alert-success"><h5>We have received your payment details, Your subscription will be activated once we verify your payment. It will take 24 to 48 Hours.</h5>
                    </div>
                  
                  
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
        
      </div>

<?php include("footer.php");?>