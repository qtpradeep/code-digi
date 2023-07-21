<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>DigiZeal User Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
          <a href="/" class="btn btn-primary">Back <i class="fa fa-home"></i></a>
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4" >
              <div class="text-center">
                <img src="https://digizeal.biz/images/dznewlogo.png" width="160">
              </div>
            <div class="card card-primary">
              <div class="card-header">
                <h4>Create New Password</h4>
              </div>
              <div class="card-body">
                <form id="recoverpass">
                  <div class="form-group">
                    <label for="email">OTP</label>
                    <input id="otp" type="number" class="form-control" name="otp" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please Enter OTP
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="email">Password</label>
                    <input id="pass1" type="password" class="form-control" name="password" tabindex="1" required autofocus>
                  
                  </div>
                  
                   <div class="form-group">
                    <label for="email">Re-Enter Password</label>
                    <input id="pass2" type="password" class="form-control" name="cpass" tabindex="1" required autofocus>
                    
                  </div>
                  
                  <div class="form-group">
                     <input type="hidden" name="email" value="<?php echo $_REQUEST['e'];?>"> 
                     <input type="hidden" name="recoverpass" value="recoverpass">
                    <button type="submit" name="btnlogin" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Create Password
                    </button>
                  </div>
                </form>
                <p id="msg" class="alert alert-success"></p>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script>
    $(function(){
        $("#msg").hide();
        
       
            $("#recoverpass").submit(function(e){
                e.preventDefault()
                
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
                        if(res=="OK"){
                            $("#msg").show()
                            $('button').hide();
                            $("#msg").html("New Password Created Successfully.")
                        }
                    }
                    
                })
                
            }
            else{
             alert("Password Didn't Matched");
             window.location.reload();
            }
        })
       
    })
</script>
</body>
</html>