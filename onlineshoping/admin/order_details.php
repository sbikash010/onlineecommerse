<?php

require('top.inc.php');
$sql="select * from order_detail order by id desc";
$res=mysqli_query($con,$sql);
?>

                                                                            
                       <div class="body">
                           <div class="order">
                               <h2 class="add">order_details</h2>
                            </div>
                            
                                <table>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>order_id</th>
                                            <th>product_name</th>
                                            <th>product_price</th>
                                            <th>qty</th>
                                            <th>total_price</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($row=mysqli_fetch_assoc($res)) {?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['order_id'] ?></td>
                                            <td><?php echo $row['product_name'] ?></td>
                                            <td><?php echo $row['product_price'] ?></td>
                                            <td><?php echo $row['qty'] ?></td>
                                            <td><?php echo $row['product_price']*$row['qty']  ?></td>
                                            
                                        </tr>
                                        <?php } ?>
                                     </tbody>

                                </table>


<?php
require('footer.inc.php')
?>