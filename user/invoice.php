<?php include("header.php");
if(isset($_SESSION['userid']) && isset($_REQUEST['id'])){
    $userres= $conn->getUser($_SESSION['userid']);
    $userrow= mysqli_fetch_assoc($userres);
    
    $res= $conn->getSubscription($_SESSION['userid'], $_REQUEST['id']);
    $row= mysqli_fetch_assoc($res);
    
    $packageres= $conn->getPackageByCode($row['package_id']);
    $package= mysqli_fetch_assoc($packageres);
}
?>
<style>
  
    
</style>

<div class="main-content">
        <section class="section">
          <div class="section-header d-block">
            <h1>Invoice</h1>
            <div class="float-right">
            <input type="button" class="btn btn-danger" onclick="printDiv('invoice')" value="Print" />
            </div>
          
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body" id="invoice">
                    
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            
                        <table cellpadding="10" cellspcaing=0 width=100% class="invoicetable">
                            <tr style="border: 1px solid #000;">
                                <td colspan="3" style="border: 1px solid #000;"s>
                                    <img src="https://digizeal.biz/images/dznewlogo.png" style="width:150px;">
                                    <div style="display:inline-block; width:75%"><h4 style="text-align:center">DigiZeal Infosultions Pvt Ltd</h4>
                                    <?php ?>
                                    </div>
                                </td>
                              
                            </tr>
                            
                            <tr style="border: 1px solid #000;">
                                <td colspan='3' style="border: 1px solid #000;">
                                    Bill To:<br>
                                    <b><?php echo $userrow['firstname'].' '.$userrow['lastname'];?></b><br>
                                    <?php echo $userrow['address'].','.$userrow['pincode'];?><br>
                                    
                                    
                                    
                                </th>
                            </tr>
                            <tr style="border: 1px solid #000;">
                                <th colspan="2" style="border: 1px solid #000;">Invoice No : <?php echo "DZ-".$_REQUEST['id'];?></td>
                                <th style="border: 1px solid #000;">Purchase Date: <?php echo date_format(date_create($row['subscription_date']), 'd-m-Y');?></th>
                                
                            </tr>
                            <tr style="border: 1px solid #000;">
                                <th width="45%" style="border: 1px solid #000;">Services</th>
                                <th style="border: 1px solid #000;">Subscription ID</th>
                                <th style="border: 1px solid #000;">Total Amount</th>
                            </tr>
                            <?php
                                if(mysqli_num_rows($res)>0){
                                    $total= $row['amount']+($row['amount']*$row['gst'])/100;
                                    echo "<tr style='border: 1px solid #000;'><th>".$package['description']."<br><br><span style='color:red'>Package Code: ".$package['name']."</span></th>".
                                    "<td style='border: 1px solid #000;'>".$row['subscriptionID']."</td>".
                                    "<td style='border: 1px solid #000;'>".$row['amount']."</td>";
                                    
                                }
                            
                            ?>
                            <tr style="border: 1px solid #000;">
                                <td colspan='2' align='right' style="border: 1px solid #000;"s><b>GST</b></td>
                                <td style="border: 1px solid #000;"><?php echo $row['gst'];?></td>
                            </tr>
                            
                            <tr style="border: 1px solid #000;">
                                <td colspan='2' align="right" style="border: 1px solid #000;"><b>Total Amount</b></td>
                                <td style="border: 1px solid #000;"><?php echo $total;?></td>
                            </tr>
                            
                             <tr style="border: 1px solid #000;">
                                <td colspan='2' align="right" style="border: 1px solid #000;"><b>Discount</b></td>
                                <td style="border: 1px solid #000;"><?php $net= $row['net_amount'];
                                        echo $total-$net ?></td>
                            </tr>
                            <tr style="border: 1px solid #000;">
                                <td colspan='2' align="right" style="border: 1px solid #000;"><b>Total Paid</b></td>
                                <td style="border: 1px solid #000;"><?php echo $row['net_amount'];?></td>
                            </tr>
                            <tr style="border: 1px solid #000;">
                            
                                <td colspan="3" style="border: 1px solid #000;">
                                    <small>*Terms & Conditions Apply</small>
                                </td>
                            </tr>
                        </table>
                    </div>
                        </div>
                        <div class="col-lg-2"></div>
                        
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

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>