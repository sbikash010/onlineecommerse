<?php

require('top.inc.php');


$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc='';
$description='';
$best_seller='';
$subcategories_id='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!='')
{
    $image_required='';
    $id=get_sefe_value($con,$_GET['id']);
    $res=mysqli_query($con,"SELECT * FROM product where id='$id' ");
    $check=mysqli_num_rows($res);
    if($check>0)
    {
        $row=mysqli_fetch_assoc($res);
        $categories_id=$row['categories_id'];
        $categories_id=$row['subcategories_id'];
        $name =$row['name'];
        $mrp=$row['mrp'];
        $price=$row['price'];
        $qty=$row['qty'];
        $short_desc=$row['short_desc'];
        $description=$row['description'];
        $best_seller=$row['best_seller'];

    }
    else {
        header('location:categories.php');
        die();
    }
    
}

if(isset($_POST['submit']))
 {
    $categories_id=get_sefe_value($con,$_POST['categories_id']);
    $subcategories_id=get_sefe_value($con,$_POST['subcategories_id']);
    $name=get_sefe_value($con,$_POST['name']);
    $mrp=get_sefe_value($con,$_POST['mrp']);
    $price=get_sefe_value($con,$_POST['price']);
    $qty=get_sefe_value($con,$_POST['qty']);
    $short_desc=get_sefe_value($con,$_POST['short_desc']);
    $description=get_sefe_value($con,$_POST['description']);
    $best_seller=get_sefe_value($con,$_POST['best_seller']);
    

    $res=mysqli_query($con,"SELECT * FROM product where name='$name' ");
    $check=mysqli_num_rows($res);
            if($check>0)
            {
                    if(isset($_GET['id']) && $_GET['id']!='')
                    {
                        $getdata=mysqli_fetch_assoc($res);
                        if($id==$getdata['id'])
                        {

                          }else{
                            $msg="product already exits"; 
                        }
                    }
                    else{
                    $msg="product already exits";
                    }
            }
            if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg')
            {
                $msg="please select only png,jpg and jpeg image format";
            }
   if($msg==''){ 
                        if(isset($_GET['id']) && $_GET['id']!='')
                    {
                        if($_FILES['image']['name']!='')
                        {
                            $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
                            $update_sql="UPDATE product set categories_id='$categories_id',subcategories_id='$subcategories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',image='$image',short_desc='$short_desc',description='$description',best_seller='$best_seller' where id='$id'";
                         } else
                            {
                                $update_sql="UPDATE product set categories_id='$categories_id',subcategories_id='$subcategories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',image='$image',short_desc='$short_desc',description='$description',best_seller='$best_seller' where id='$id'";
                                }

                        
                        mysqli_query($con,$update_sql);
                    }  
                    else {
                        $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
                    mysqli_query($con,"INSERT INTO product (categories_id,subcategories_id,name,mrp,price,qty,image,short_desc,description,best_seller,status) Values('$categories_id','$subcategories_id','$name','$mrp','$price','$qty','$image','$short_desc','$description','$best_seller',1) ");
                        }
                    header('location:product.php');
                    die();
                    
                 }
}
?>
    
        <div class="addform">
            <div class="addh">
                <strong>product</strong><small>Form</small>
            </div>
                <form method="post" enctype="multipart/form-data">
                    
                    <div class="fselect">
                            <label>categories</label>
                            <select  name="categories_id" style="width:300px;height:30px;margin-bottom:20px;">
                            <option>select category </option>
                            <?php
                            $res=mysqli_query($con,"SELECT id,categories from categories order by categories asc");
                            while($row=mysqli_fetch_assoc($res)){
                                if($row['id']==$categories_id)
                                {
                                    echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                }
                                else{
                                echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                }
                            }

                            ?>
                            </select>
                    </div>
                    <div class="fselect">
                            <label>sub categories</label>
                            <select  name="subcategories_id" style="width:300px;height:30px">
                            <option>select sub category </option>
                            <?php
                            $res=mysqli_query($con,"SELECT id,subcategories from subcategories order by subcategories asc");
                            while($row=mysqli_fetch_assoc($res)){
                                if($row['id']==$subcategories_id)
                                {
                                    echo "<option selected value=".$row['id'].">".$row['subcategories']."</option>";
                                }
                                else{
                                echo "<option value=".$row['id'].">".$row['subcategories']."</option>";
                                }
                            }

                            ?>
                            </select>
                    </div>
                    <div>
                            <label>product name</label>
                            <input type="text" name="name" placeholder="Enter product name " class="input-group" required value="<?php echo $name?>" >
                    </div>
                    <div>
                            <label>best seller</label>
                            <select class="input-group" name="best_seller" style="width:300px;height:30px;margin-bottom:20px;">
                            <option value=''>select</option>
                            <?php 
                            if($best_seller==1)
                            {
                               echo '<option value="1" selected>yes</option>
                               <option value="0">No</option>'; 
                            }
                            elseif($best_seller==0)
                            {
                                echo '<option value="1" >yes</option>
                               <option value="0" selected>No</option>';
                            }
                            else
                            {
                                echo '<option value="1">yes</option>
                               <option value="0">No</option>';
                            }
                            ?>
                          </selct>
                    </div>
                    <div>
                            <label>MRP</label>
                            <input type="text" name="mrp" placeholder="Enter product mrp " class="input-group" required value="<?php echo $mrp?>" >
                    </div>
                    <div>
                            <label>price</label>
                            <input type="text" name="price" placeholder="Enter product price " class="input-group" required value="<?php echo $price?>" >
                    </div>
                    <div>
                            <label>Qty</label>
                            <input type="text" name="qty" placeholder="Enter qty " class="input-group" required value="<?php echo $qty?>" >
                    </div>
                    <div>
                            <label>Image</label>
                       
                            <input type="file" name="image"  class="input-group" <?php echo $image_required ?> >
                    </div>
                    <div>
                            <label>description</label>
                            <textarea name="description" placeholder="Enter product description " class="input-group"  value="<?php echo $description?>" cols="150" rows="10"></textarea>
                    </div>

                    
                    <div>
                            <button type="submit" name="submit" class="bnt"
                            style="margin:20  px;
                            width:200px;
                            font-size:22px;
                            border-radius:10px;
                            background:red;"> submit</button>
                    </div>
                    <?php echo $msg?>
                </form>
        </div>
    </div>
