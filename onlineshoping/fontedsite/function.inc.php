<?php
 function pr($arr)
 {
     echo '<pre>';
     print_r($arr);
 }
 function prx($arr)
 {
     echo'<pre>';
     print_r($arr);
     die();
 }
 function get_sefe_value($con,$str)
 {
     if($str!='')
     {
     $str=trim($str);
     return mysqli_real_escape_string($con,$str);
     }
 }
 function get_product($con,$limit='',$cat_id='',$product_id='',$search_str='',$sub_categories='',$is_best_seller='')
 {
     $sql="SELECT product.*,categories.categories from product,categories where product.status=1";
     if($cat_id!='')
     {
        $sql= " $sql and product.categories_id=$cat_id ";  
     }
     if($product_id!='')
     {
        $sql= " $sql and product.id=$product_id ";  
     }
     if($sub_categories!='')
     {
        $sql= " $sql and product.subcategories_id=$sub_categories ";  
     }
     if($is_best_seller!='')
     {
        $sql= " $sql and product.best_seller=1";  
     }
     $sql= " $sql and product.categories_id=categories.id ";
     if($search_str!='')
     {
        $sql= " $sql and ( product.name like '%$search_str%' or product.description like '%$search_str%' ) ";  
     }
     $sql= "$sql order by product.id desc";
     if($limit!= '')
     {
         $sql="$sql limit $limit";
     }
      
     $res=mysqli_query($con,$sql);
     $data=array();
     while($row=mysqli_fetch_assoc($res))
     { 
         
         $data[]=$row;
     }
     return $data;
 }


 function cart($query) {
    $result = mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
    }		
    if(!empty($resultset))
        return $resultset;
}

function numRows($query) {
    $result  = mysqli_query($con,$query);
    $rowcount = mysqli_num_rows($result);
    return $rowcount;	
}


 
?> 