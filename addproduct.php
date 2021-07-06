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
            <div class="card">
              <div class="div-2">
                <h5 class="div-2">Add Product</h5>
              </div>
              <div class="div-4">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="div-2">
                <h5 class="div-2">Categories</h5>
              </div>
              <div class="div-4">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Category</label>
                        <input type="number" id="product_type" name="product_type" required="[1-6]" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Product Brand</label>
                        <input type="number" id="brand" name="brand" required class="form-control">
                      </div>
                    </div>
                     
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Keywords</label>
                        <input type="text" id="tags" name="tags" required class="form-control" >
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="div-4">
                  <button type="submit" id="btn_save" name="btn_save"  required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
         


  <form class="form-horizontal" id="Manoo" method="post" action="barcode.php" target="_blank">
    <div class="form-group">
      <label class="control-label col-sm-2" for="product">Product name:</label>
      <div class="col-sm-10">
        <input autocomplete="OFF" type="text" required=""     class="form-control" id="product" name="product">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_id">Product id:</label>
      <div class="col-sm-10">
        <input autocomplete="OFF" type="text" required="" class="form-control" id="product_id" name="product_id">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="rate">category Id</label>
      <div class="col-sm-10">          
        <input autocomplete="OFF" type="text" class="form-control" id="rate"  name="rate">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="print_qty">Barcode Quantity</label>
      <div class="col-sm-10">          
        <input autocomplete="OFF" type="print_qty"   required=""   class="form-control" id="print_qty"  name="print_qty">
      </div>
    </div>
<hr>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit"   class="btn btn-default">Create Barcode</button>

       
      </div>
      <hr>
    </div>

  </form>
















         
          <?php

include("../db.php");


if(isset($_POST['btn_save']))
{
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
//$c_price=$_POST['c_price'];
$product_type=$_POST['product_type'];
$brand=$_POST['brand'];
$tags=$_POST['tags'];

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
  if($picture_size<=50000000)
  
    $pic_name=time()."_".$picture_name;
    move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
    



//mysqli_query($con,"insert into product (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_keywords) values ('$product_type','$brand','$product_name','$price','$details','$pic_name','$tags')") or die ("query incorrect");

$sqlInsert = "INSERT into products (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_keywords) values ('$product_type','$brand','$product_name','$price','$details','$pic_name','$tags')";

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



}}

?>
          
        </div>
      </div>
      <?php
include "footer.php";
?>
