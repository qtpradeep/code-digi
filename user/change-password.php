<?php include("header.php");?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Password</h1>
            
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4> Update Password</h4>
                  </div>
                  <div class="card-body">
                <form id="changepassword">
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>New Password</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="password" name='newpass' id="pass1" class="form-control">
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Confirm Password</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="password" id='pass2' class="form-control">
                      </div>
                    </div>
                     
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                          <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'];?>">
                         <input type="hidden" name="action" value="changepassword">
                        <button class="btn btn-primary" type="submit">Update Password</button>
                      </div>
                    </div>
                </form>
                
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
</div>

<?php include("footer.php");?>
<script>
    $(function(){
      
        $("#changepassword").submit(function(e){
            e.preventDefault();
            
             var pass1= $("#pass1").val();
            var pass2= $("#pass2").val();
            if(pass1===pass2){
            
            $.ajax({
                type: "POST",
                url: "function.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res){
                   if(res=="OK")
                    alert("Password Updated Successfully");
                    location.reload();

                }
                
            })
            }else{
                alert("Passwords Didn't Match");
                
            }
        })
    })
</script>