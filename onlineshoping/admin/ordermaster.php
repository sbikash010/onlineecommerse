<?php 
    require('top.inc.php');
    

?>

<div class="row" style="background-color:ghostwhite;">
   
        <table>
        
           <thead>
                <tr>
                    <th style="text-align:cemter;" width="300px" height="5px">user id</th>
                    <th style="text-align:cemter;" width="300px" height="5px">order id</th>
                    <th style="text-align:cemter;" width="300px" height="5px">order date</th>
                    <th style="text-align:cemter;" width="300px" height="5px">address</th>
                    <th style="text-align:cemter;" width="300px" height="5px">payment type</th>
                    <th style="text-align:cemter;" width="300px" height="5px">total price</th>
                    <th style="text-align:cemter;" width="300px" height="5px">payment status</th>
                    <th style="text-align:cemter;" width="100px" height="5px">order status </th>
            
                </tr>
            </thead>
            <tbody>
                <?php
            
              $res=mysqli_query($con,"SELECT  orders.*,`order_status`.names  from orders,`order_status` 
              where  `order_status`.id=orders.order_status");
              while($row=mysqli_fetch_assoc($res)){
              ?>
              <tr >
                        <td style="padding-left:40px;">
                            <?php echo $row['user_id'];?>
                        </td>
                        <td style="padding-left:40px;widht:20px;height:20px;">
                           order details:<a href="ordermasterdetail.php?id=<?php echo $row['id']?>" style="widht:20px;height:20px; background-color:red;"><?php echo $row['id'];?></a>

                        </td>
                        <td style="padding-left:40px;">
                            <?php echo $row['add_on'];?>
                        </td>
                        
                        <td style="padding-left:40px;">
                            street address:<?php echo $row['street_add'];?>
                            city:<?php echo $row['city'];?>
                            pin code:<?php echo $row['pin_code'];?>
                        </td>
                        
                        <td style="padding-left:40px;">
                            <?php echo $row['payment_type'];?>
                        </td>
                        <td style="padding-left:40px;">
                            <?php echo $row['tatal_price'];?>
                        </td>
                        <td style="padding-left:40px;">
                            <?php echo $row['payment_status'];?>
                        </td>
                        <td style="padding-left:40px;">
                            <?php echo $row['names'];?>
                        </td>
                        
                        
                    </tr>
              <?php } ?>
            </tbody>
        </table>
</div>
               