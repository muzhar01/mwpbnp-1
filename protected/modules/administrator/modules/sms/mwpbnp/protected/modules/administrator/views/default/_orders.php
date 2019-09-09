                   <tr>
                      <td> <?php echo CHtml::link($data->id,$this->createUrl('/administrator/products/orders/view/id/'.$data->id)); ?></td>
                      <td><?php echo $data->products->product_name; ?></td>
                      <td>
                      <?php 
                        if($data->payment_status == 'Completed'){
                        	echo '<span class="label label-success">'.$data->payment_status.'</span>';
                        }else if($data->payment_status == 'Created'){
                        	echo '<span class="label label-success">'.$data->payment_status.'</span>';
                        }else if($data->payment_status == 'Denied'){
                        	echo '<span class="label label-danger">'.$data->payment_status.'</span>';
                        }else if($data->payment_status == 'Expired'){
                        	echo '<span class="label label-danger">'.$data->payment_status.'</span>';
                        }else if($data->payment_status == 'Pending'){
                        	echo '<span class="label label-warning">'.$data->payment_status.'</span>';
                        }else if($data->payment_status == 'Canceled'){
                        	echo '<span class="label label-danger">'.$data->payment_status.'</span>';
                        }else if($data->payment_status == 'Refunded'){
                        	echo '<span class="label label-info">'.$data->payment_status.'</span>';
                        }else if($data->payment_status == 'Reversed'){
                        	echo '<span class="label label-info">'.$data->payment_status.'</span>';
                        }else if($data->payment_status == 'Closed'){
                        	echo '<span class="label label-danger">'.$data->payment_status.'</span>';
                        }else

                       ?>
                          </td>
                      <td><?php echo date('d-m-Y',$data->order_date); ?></td>
                    </tr>

                    
<!--Modified by me--> 