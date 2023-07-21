<?php include("header.php");?>

<div class="main-content">
        <section class="section">
          <div class="section-header d-block">
            <h1>Update Video Undetaking</h1>
          
          
          </div>
          <div class="section-body">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="function.php" enctype="multipart/form-data">
                               <div class="form-group">
                                  <strong>SubscriptionID *</strong>
                                <input type="text" class="form-control" name="subsid" placeholder="Enter SubscriptionID" required>
                                </div>
                                
                                <div class="form-group">
                                    <strong>Upload Video Undertaking *</strong>
                                    <input type="file" class="form-control" name="video" accept="video/*" required>
                                </div>
                                
                                 <div class="form-group">
                                   <input type="submit" name="updatevideo" class="btn btn-primary " value="Upload Video">
                                </div>
                    
                                
                               
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
            
            
          </div>
        </section>
        
      </div>

<?php include("footer.php");?>
<script>
    $(function(){
        $("#ddmode").hide();
        $("#neftmode").hide();
            
        $("#dd").click(function(){
            $("#ddmode").show();
            $("#neftmode").hide();
        })
        
         $("#neft").click(function(){
            $("#ddmode").hide();
            $("#neftmode").show();
        })
    })
</script>
