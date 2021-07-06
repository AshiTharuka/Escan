  <?php

include("../db.php");
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
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="div-2">
              <div class="div-2">
                <h5 class="title">Add New Category</h5>
              </div>
              <div class="div-4">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Category</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
    
              <div class="card-body">
                
                 
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          <?php

include("../db.php");


if(isset($_POST['btn_save']))
{
$product_category=$_POST['product_name'];


//mysqli_query($con,"insert into product (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_keywords) values ('$product_type','$brand','$product_name','$price','$details','$pic_name','$tags')") or die ("query incorrect");

$sqlInsert = "INSERT into categories (cat_title) values ('$product_category')";

if($con->query($sqlInsert)==TRUE)
{



 echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                                            <span class='badge badge-pill badge-success'>Success</span>
                                             New User Insert Done.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                 <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";
 //header("location: sumit_form.php?success=1");
}
else
{
  echo "Error:".$sqlInsert."<br>".$con->error;
echo "<div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
                                            <span class='badge badge-pill badge-Danger'>Failed</span>
                                            Registeration Failed.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";

}



}

?>
          
        </div>
      </div>
      <?php
include "footer.php";
?>