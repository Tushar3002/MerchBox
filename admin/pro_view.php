<?php include("include/header.php");?>
<?php
         if(!isset($_SESSION['ses']))
          {
            header('location: signin.php');
          }

        if(isset($_GET['del'])){
            $del   = $_GET['del'];
            $query = "DELETE FROM `product` WHERE pid = $del";
            if(mysqli_query($con,$query)){
                echo "<script> alert('This product has been deleted');</script>";
        
            }
        }

        if(isset($_GET['status'])){
            $status   = $_GET['status'];
        }
 ?>
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-3">
            <?php include("include/sidebar.php");?>
        </div>
        
        <div class="col-md-9">
            
               <div class="row">

                 <div class="col-md-1">
                   <i class="fad fa-th-list fa-6x text-primary"></i>
                 </div> 

                 <div class="col-md-7">
                   <h2 class="display-4 ml-2 mt-4">View Products:</h2>
                 </div> 
                
            
                </div>
               <hr>
        <table class="table table-responsive table-hover ">
                      <thead class="thead-light">
                          <tr>
                              <th>Product Id</th>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Category</th>
                              
                              <th>Price </th>
                              <th>Detail</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th colspan="4">Actions(Edit/Del)</th>
                              <th colspan="4"></th>
                          </tr>
                      </thead>
                        <tbody>
                          <?php

                                       if(isset($status)){
                                           $pr_query = "SELECT * FROM product fp INNER JOIN categories cat ON fp.category = cat.id WHERE status = '$status' order by pid";
                                       } else{
                                           $pr_query = "SELECT * FROM product fp INNER JOIN categories cat ON fp.category = cat.id order by pid";
                                       }
                                        $pr_run   = mysqli_query($con,$pr_query);
                                        
                                        if(mysqli_num_rows($pr_run) > 0){
                                            while($pr_row = mysqli_fetch_array($pr_run)){
                                              $pid   = $pr_row['pid'];
                                              $title = $pr_row['title'];
                                              $category = $pr_row['category'];
                                              
                                              $price = $pr_row['price'];    
                                              $detail  = $pr_row['detail'];
                                              $image = $pr_row['image'];
                                              $status = $pr_row['status'];
                                              $date = $pr_row['date'];
                                              

                                            
                                              
                            ?> 
                             <tr>
                                 <td >
                                     <?php echo $pid;?>
                                 </td>
                                 <td width="120px">
                                     <img src="img/<?php echo $image;?>" width="100%">
                                 </td>

                                 <td width="150px">
                                    <?php echo $title;?>
                                 </td>

                                 <td>
                                    <?php echo $category;?>
                                 </td>

                                 

                                 <td><?php echo $price;?> </td>
                                 <td> 
                                 <?php echo $detail ?>  
                                </td>
                                <td><?php echo $status;?></td>
                                <td><?php echo $date;?></td>
                                <td colspan="20" class="text-center"> 
                                 <?php 
                                   
                                   
                                   ?>
                                    <a title="Edit Product" href="pro_edit.php?pid=<?php echo $pid;?> " class="btn btn-primary btn-sm">
                                    <i class="fal fa-edit"></i>
                                    </a>

                                    <a title="Delete Product" href="pro_view.php?del=<?php echo $pid;?>" class="btn btn-danger btn-sm">X </a>  
                                 </td>
                             </tr>   
                           <?php 
                               }

                            }else {
                                echo "<h2 class='text-center text-secondary'>You haven't added any product yet</h2>";
                                }
                        
                     
                    
                    ?>
                              
                          
                      </tbody>
                  </table>

        </div>



    </div>
</div>
<?php include("include/footer.php"); ?>