
    <?php
session_start();
include("../db.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}

include "sidenav.php";
include "topheader.php";
?>
 <style>
    .div-1 {
        background-color: #EBEBEB;
    }
    
    .div-2 {
      background-color: #ABBAEA;
    }
    
    .div-3 {
      background-color: #FBD603;
    }
    .div-4{
      background-color: #484848;
    }
</style>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="div-2">
                <h4 class="card-title">Orders  / Page <?php echo $page;?> </h4>
              </div>
              <div class="div-4">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>Order id</th><th>User id</th><th>Customer name</th><th>Email</th><th>Address</th><th>Product Count</th><th>Total Amount</th><th></th><!-- <th>Time</th> -->
                    </tr></thead>
                    <tbody>
                      <?php 
                       // $result=mysqli_query($con,"select order_id, product_title, first_name, mobile, email, address1, address2, product_price,address2, qty from orders,products,user_info where orders.product_id=products.product_id and user_info.user_id=orders.user_id Limit $page1,10")or die ("query 1 incorrect.....");
$statusNew= "Pending";
$result=mysqli_query($con,"SELECT `order_id`, `user_id`, `f_name`, `email`, `address`, `prod_count`, `total_amt` from orders_info where `Status` = '$statusNew'  Limit $page1,10")or die ("query 1 incorrect.....");



                        while(list($order_id,$user_id,$f_name,$email,$address,$prod_count,$total_amt)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$order_id</td><td>$user_id</td><td>$f_name</td><td>$email</td><td>$address</td><td>$prod_count</td><td>$total_amt</td><td></td>
                        <form method='post'>
<td>
<input  type='hidden' name='IDNEw' value='$order_id'>

<input  type='hidden' name='email' value='$email'>
<input  type='hidden' name='address' value='$address'>
<input  type='hidden' name='total_amt' value='$total_amt'>
<input  type='hidden' name='prod_count' value='$prod_count'>



                       <input class=' btn btn-success' type='submit' name='AcceptBtn' value='Accept'>
                        </td>
  <td>
                        <input class=' btn btn-danger' type='submit' name='DeclineBtn' value='Decline'>
                        </td>



                        </form>
                        </tr>";
                        }
                        ?>


<?php
include("../db.php");

if(isset($_POST['AcceptBtn'])) 
{

$IDOFTABLE=$_POST['IDNEw'];
$NEWSTATUS="Accepted";


 $email=$_POST['email'];
 $address=$_POST['address'];
 $total_amt=$_POST['total_amt'];
 $prod_count=$_POST['prod_count'];






//"UPDATE user_info set Status='$NEWSTATUS' order_id='$IDOFTABLE'"


$sqlInsert = "UPDATE `orders_info` SET `Status`='$NEWSTATUS' WHERE `order_id`= '$IDOFTABLE'";

if($con->query($sqlInsert)==TRUE)
{

$_SESSION['IDOFTABLE'] = $IDOFTABLE;
$_SESSION['email'] = $email;

$_SESSION['address'] = $address;
$_SESSION['total_amt'] = $total_amt;
$_SESSION['prod_count'] = $prod_count;

$get_parameters = "<script>window.open('invoice_bill.php')</script>";

//echo "<script>location.href='invoice_bill.php' </script>";
echo $get_parameters;
/*echo "<a href=\"invoice_bill.php\" target=\"_blank\" ></a>";*/
//echo ''+ $get_parameters;


//header("location: invoice_bill.php");

}

else
{


}


}
?>    





<?php
include("../db.php");

if(isset($_POST['DeclineBtn'])) 
{

$IDOFTABLE=$_POST['IDNEw'];
$NEWSTATUS="Rejected";

mysqli_query($con,"UPDATE `orders_info` SET `Status`='$NEWSTATUS' WHERE `order_id`= '$IDOFTABLE'")or die("Query 2 is inncorrect..........");

//header("location: manageuser.php");
mysqli_close($con);
}
?> 








                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>

