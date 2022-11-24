<?php 
    require('top.inc.php');
   
    $order_id='';
    if(isset($_GET['id']) )
    {
        $order_id=$_GET['id'];
       
    }
    if(isset($_POST['update_order_status'])){
        $update_order_status=$_POST['update_order_status'];
        mysqli_query($con,"UPDATE orders set order_status='$update_order_status' where id='$order_id'");
    }

?>
<div class="row" style="background-color:ghostwhite;">
<div style="background-color:ghostwhite;border:1px solid brown;width:1080px;height:100px;">
        <strong>order status</strong>
        <?php
        
        $order_status=mysqli_fetch_assoc(mysqli_query($con,"SELECT `order_status`.names from `order_status`,`orders` where `orders`.id='$order_id' and `order_status`.id=`orders`.order_status "));
        echo $order_status['names']; 
        ?>
        <div>
            <form method="post">
                <select name="update_order_status">
                    <option>select status</option>
                    <?php 
                    $res=mysqli_query($con,"SELECT * from `order_status` ");
                    while($row=mysqli_fetch_assoc($res))
                    {
                        if($row['id']==$categories_id)
                        {
                            echo "<option selected value=".$row['id'].">".$row['names']
                            ."</option>";
                        }
                        else {
                            echo "<option value=".$row['id'].">".$row['names']."</option>";
                        }
                    }
                    ?>
                    <input type="submit">
            </form>
        </div>
   </div>
        <table>
        
           <thead>
                <tr>
                    <th style="text-align:cemter;" width="300px" height="5px">product Name</th>
                    <th style="text-align:cemter;" width="300px" height="5px">Qty</th>
                    <th style="text-align:cemter;" width="300px" height="5px">price</th>
                    <th style="text-align:cemter;" width="300px" height="5px">total price</th>
                    
                
                </tr>
            </thead>
            <tbody>
                <?php
                   
                  $total_price=0;
                  $itemCounter =0;
                  $res=mysqli_query($con,"SELECT distinct(order_detail.id), order_detail.* from order_detail,orders
                   where order_detail.order_id='$order_id'  ");
            
              while($row=mysqli_fetch_assoc($res)){
                $total_price=$total_price+($row['qty']*$row['product_price']);
                $itemCounter+=$row['qty'];
                ?>
                                                <tr >
                                                    
                                                    <td style="padding-left:40px;">
                                                        <?php echo $row['product_name'];?>
                                                    </td>
                                                    
                                                    
                                                    <td style="padding-left:40px;">
                                                        <?php echo $row['qty'];?>
                                                    </td>
                                                    <td style="padding-left:40px;">
                                                        <?php echo $row['product_price'];?>
                                                    </td>
                                                    <td style="padding-left:40px;">
                                                        <?php echo $row['qty']*$row['product_price'];?>
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            <?php } ?>
                                                <tr class="border-top border-bottom">
                                                    <td style="padding-left:300px;">Total</td>
                                                    <td style="padding-left:70px; ">Total items:
                                                        <strong>
                                                            <?php 
                                                                echo ($itemCounter==1)?$itemCounter.' item':$itemCounter.' items'; ?>
                                                        </strong>
                                                    </td>
                                                    <td style="padding-left:240px;" colspan="2"><strong>Total :Rs<?php echo $total_price;?></strong></td>
                                                </tr>

                                             
           </tbody>
        
        </table> 

</div>
        
<?php
require('footer.inc.php')
?>