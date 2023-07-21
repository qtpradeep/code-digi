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
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form id="forgetpass">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    
                  </div>
                  
                  <div class="form-group">
                     <input type="hidden" name="sendotp" value="sendotp">
                    <button type="submit" name="btnlogin" class="btn btn-primary btn-lg btn-block" tabindex="4">
                     Send OTP
                    </button>
                  </div>
                </form>
                <p id="msg" class="alert alert-success"></p>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="register.php">Create One</a>
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
        
        $("#forgetpass").submit(function(e){
            e.preventDefault()
            var email= $("#email").val();
            $.ajax({
                type: "POST",
                url: "function.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res){
                    if(res=="OK"){
                       alert("OTP is Sent To Registered Email. Please Proceed To Recover Password");
                       window.location.href="recover-password.php?e="+email;
                    }
                }
                
            })
        })
    })
</script>
</body>
</html>