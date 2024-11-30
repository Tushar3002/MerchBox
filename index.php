<?php include('include/header.php'); 

if(isset($_SESSION['email'])){
  $custid = $_SESSION['id'];

  if(isset($_GET['cart_id'])){
    $p_id = $_GET['cart_id'];

    $sel_cart = "SELECT * FROM cart WHERE cust_id = $custid and product_id = $p_id ";
    $run_cart    = mysqli_query($con,$sel_cart);
  
    if(mysqli_num_rows($run_cart) == 0){
      $cart_query = "INSERT INTO `cart`(`cust_id`, `product_id`,quantity) VALUES ($custid,$p_id,1)";    
      if(mysqli_query($con,$cart_query)){
        header('location:index.php');
      }
    }
    if(mysqli_num_rows($run_cart) > 0){
      while($row = mysqli_fetch_array($run_cart)){
        $exist_pro_id = $row['product_id'];
          if($p_id == $exist_pro_id){
           $error="<script> alert('⚠️ This product is already in your cart  ');</script>";
          }
        }
      }


    }
  }
  else if(!isset($_SESSION['email'])){
   echo "<script> function a(){alert('⚠️ Login is required to add this product into cart');}</script>";
  }
?>
      <!--slider-->
      <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="img/nmban.png" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20" ><strong>Welcome To <br> MerchBox</strong></h1>
                            
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="img/op.png" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>ONE PIECE</strong></h1>
                            <p><a class="btn hvr-hover" href="product.php?cat_id=7">SHOP NOW</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="img/heroban.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>MARVEL</strong></h1>
                            <p><a class="btn hvr-hover" href="product.php?cat_id=8">SHOP NOW</a></p>
                        </div>
                    </div>
                </div>
            </li>
			<li class="text-right">
                <img src="img/bmban.png" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>BATMAN</strong></h1>
                            <p><a class="btn hvr-hover" href="product.php?cat_id=9">SHOP NOW</a></p>
                        </div>
                    </div>
                </div>
            </li>
			<li class="text-right">
                <img src="prod/cric.webp" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>CRICKET</strong></h1>
                            <p><a class="btn hvr-hover" href="product.php?cat_id=12">SHOP NOW</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        
    </div>
      <!--/.slider-->
      
      <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="prod/op.png" alt="" />
                        <a class="btn hvr-hover" href="product.php?cat_id=7">SHOP NOW</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="prod/marvel.png" alt="" />
                        <a class="btn hvr-hover" href="product.php?cat_id=8">SHOP NOW</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="prod/naruto.png" alt="" />
                        <a class="btn hvr-hover" href="product.php?cat_id=11">SHOP NOW</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="prod/dc.png" alt="" />
                        <a class="btn hvr-hover" href="product.php?cat_id=9">SHOP NOW</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="prod/wwe.png" alt="" />
                        <a class="btn hvr-hover" href="product.php?cat_id=10">SHOP NOW</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid"  src="prod/cric.webp" alt="" />
                        <a class="btn hvr-hover" href="product.php?cat_id=12">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
      <!--Latest product---->
      <section >
        <div class="container pt-5 pb-5">
        <div >
          <?php 
          if(isset($msg)){
            echo $msg;
           }
          else if(isset($error)){
                  echo $error;
                 }
              ?>
          </div>

           <h1 class="text-center">Latest Products</h1>
  
           <div class="row mt-4">
                
                <?php    
                  $p_query = "SELECT * FROM product ORDER BY pid DESC LIMIT 8";
                  $p_run   = mysqli_query($con,$p_query);
                  
                  if(mysqli_num_rows($p_run) > 0 ){
                      while($p_row = mysqli_fetch_array($p_run)){
                       $pid      = $p_row['pid'];
                       $ptitle  = $p_row['title'];
                       $pcat    = $p_row['category'];
                       $p_price = $p_row['price'];
                       $size    = $p_row['size'];
                       $img1    = $p_row['image'];
                     ?>
                 
                    <div class="col-md-3 mt-3">
                        <img src="img/<?php echo $img1; ?>" class="hover-effect" width="275px" height="300px">
                            <div class="text-center mt-3">
                             <h5 title="<?php echo $ptitle;?>"><?php echo substr($ptitle,0,20); ?>...</h5>
                              <h6>Rs  <?php echo $p_price; ?></h6>
                            </div>
                              
                             <div class="row">
                                  <div class="col-md-12 col-sm-12 col-12 text-center">
                                 
                                  <a href="index.php?cart_id=<?php echo $pid;?>" type="submit" onclick="a()" class="btn btn-primary btn-sm hover-effect">
                                      <i class="far fa-shopping-cart"></i>
                                  </a>
                                  <a href="product-detail.php?product_id=<?php echo $pid;?>" class="btn btn-default btn-sm hover-effect text-dark" >
                                       <i class="far fa-info-circle"></i> View Details
                                  </a>

                                  </div>
                            
                           </div>
                     </div>
                     
                    <?php  
                         }
                      }
                  else{
                    echo "<h3 class='text-center'> No Product Available Yet </h3>";
                  }

                ?>

           </div>
        </div>

      <!--end deal with-->
      
      <!---How to Shop -->
      <section class="back-gray pt-4 pb-4">
        <div class="container">
              <h2 class="text-center">How It Does Work</h2>
              <div class="row">
                
                <!--choose product card-->
                <div class="col-md-4 p-5">
                  <div class="card hover-effect" id="border-less">
                    <div class="card-body mt-3 text-center">
                       <i class="fal fa-phone-laptop fa-3x"></i>
                          <div class="heading mt-2">
                            <h4>Product</h4>
                            <h6 class="text-secandary">Choose your own product</h6>
                          </div>
                          <p class="mt-2">Add product to cart & proceed to checkout and put your shipping address then checkout that. </p>
                       
                    </div>
                  </div>
                </div>
                <!---end choose product-->

                
                <!--cash on deliver-->
                <div class="col-md-4 p-5">
                  <div class="card hover-effect" id="border-less">
                    <div class="card-body mt-3 text-center">
                       <i class="fal fa-hand-holding-box fa-3x"></i>
                          <div class="heading mt-2">
                            <h4>Recieve</h4>
                            <h6 class="text-secandary">Receive Your Product</h6>
                          </div>
                          <p class="mt-2">After checkout from cart your product will be deliver at your door step within 7 working days</p>
                       
                    </div>
                  </div>
                </div>
                <!---end cash on delivery-->

                
                <!--cash on deliver-->
                <div class="col-md-4 p-5">
                  <div class="card hover-effect" id="border-less">
                    <div class="card-body mt-3 text-center">
                       <i class="fal fa-wallet fa-3x"></i>
                          <div class="heading mt-2">
                            <h4>Cash</h4>
                            <h6 class="text-secandary">Cash on delivery</h6>
                          </div>
                          <p class="mt-2">On delivery of your product hold or receive your products then pay cash at that moment.</p>
                       
                    </div>
                  </div>
                </div>
                <!---end cash on delivery-->

              </div>
          </div>
      </section>
       <!---end How to shop-->
   
<?php include('include/footer.php'); ?>