<?php include("header.php");
if(isset($_SESSION['userid']) && isset($_REQUEST['camp']) && isset($_REQUEST['inf']) && isset($_REQUEST['task'])){
   $campaign= $_REQUEST['camp'];
   $influencer= $_REQUEST['inf'];
   $task= $_REQUEST['task'];
   $user= $_SESSION['userid'];
}
?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Report Influencer</h1>
          
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form id="reportform">
                        <div class="form-group">
                            <textarea class="form-control" name="reporttext" placeholder="Type your text..."></textarea>
                        </div>
                        
                      
                           <input type="hidden" name="campaign" value="<?php echo $campaign ;?>">
                       
                            <input type="hidden" name="task" value="<?php echo $task;?>">
                     
                           <input type="hidden" name="influencer" value="<?php echo $influencer;?>">
                           
                           <input type="hidden" name="user" value="<?php echo $user;?>">
                       
                        
                            <div class="form-group">
                                <input type="hidden" name="action" value="reportinf">
                               <input type="submit" name="btnreport" class="btn btn-primary" value="Report Influencer">
                            </div>
                    </form>    
                </div>
                  
                  
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
        $("#reportform").submit(function(e){
            e.preventDefault();
            
            $.ajax({
                type: "post",
                url: "function.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res){
                    if(res==1){
                        alert("We have saved your report against influencer");
                        window.location.reload();
                    }else{
                        alert(res);
                    }
                   
                }
            })
        })
    })
</script>