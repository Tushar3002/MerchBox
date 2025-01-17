<?php include('include/header.php'); ?>

        <div class="container sign-in-up">
          <div class="row">
            <div class="col-md-6">
              <h1>MERCHBOX</h1>
              <p>MerchBox is an new merchandise brand that brings you the most amazing merches inspired from some pop culture! MerchBox offers a wide range of products from cool t shirts and sweatshirts to different accessories .At MerchBox, we work with some of the best designers and illustrators from all around the globe to offer you a fresh and unique selection of designer t-shirts.
<p>If you’re looking for a t-shirt to help you express yourself and the things you love, we have you covered. Check out our collection of cool t shirts online in India. We try to provide merchandise inspired by your favourite movie and TV show and anime characters. We have something for everyone!</p>
                    <p>All artwork posted on this website is intended as fan art and is not purported to be official merchandise unless indicated otherwise. If you have any issues regarding the artwork, do write in to us at contact@merchbox.in</p>

                        </p>
            </div>
            
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h1 class="text-center mt-5">Register Account</h1>
                  
                  
                  <form method="post" class="mt-5 p-3">
                    
                    <?php 
                      if(isset($_POST['register'])){
                          
                          $fullname = $_POST['fullname'];
                          $email = $_POST['email'];
                          $password = $_POST['password'];
                          $conf_pass = $_POST['confirm-password'];
                          $address = $_POST['address'];
                          $city = $_POST['city'];
                          $postal_code = $_POST['code'];
                          $number = $_POST['phone_number'];
                          
                          if(!empty($fullname) or !empty($email) or !empty($password) or !empty($conf_pass) or !empty($address) or !empty($city) or !empty($postal_code) or !empty($number)){

                            if($password === $conf_pass){

                              $cust_query="INSERT INTO customer(`cust_name`,`cust_email`,`cust_pass`,`cust_add`,`cust_city`,`cust_postalcode`,`cust_number`) VALUES('$fullname','$email','$password','$address','$city','$postal_code','$number')";


                              if(mysqli_query($con,$cust_query)){
                                  $message="You Are Registered Successfully!";
                              }
                              
                              
                              
                            } 
                            else{
                                $error="Passwords do not Match";
                            }
                          }
                            else{
                          $error="All (*) Fields Required";
                      }
                      }
                    
                      ?>
                      <?php
                      if(isset($error)){
                      
                        echo "<div class='alert bg-danger' role='alert'>
                                <span class='text-white text-center'> $error</span>
                              </div>";
                    
                        }
                      else if(isset($message)){
                      
                        echo "<div class='alert bg-success' role='alert'>
                                <span class='text-white text-center'> $message</span>
                              </div>";
                    
                        }
                      
                      ?>
                    <div class="form-group">
                    
                      <input type="text" name="fullname" placeholder="Full Name" class="form-control" >
                     </div>

                    <div class="form-group">
                      <input type="text" name="email" placeholder="Email" class="form-control" >
                     </div>

                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <input type="password" name="password" placeholder="password" class="form-control" >
                          </div>
                        </div>
                        <div class="col-sm-6 col-12 col-md-6 ">
                          <div class="form-group">
                            <input type="password" name="confirm-password" placeholder="Confirm password" class="form-control" >
                          </div>
                        </div>
                      </div>
                  

                      <div class="form-group">
                        <input type="text" name="address" placeholder="Address" class="form-control" >
                    </div>
                     
                    <div class="row">
                      <div class="col-md-6 col-6">
                        <div class="form-group">
                          <input type="text" name="city" placeholder="City" class="form-control" >
                       </div>
                      </div>
                      
                      <div class="col-md-6 col-6">
                        <div class="form-group">
                          <input type="number" name="code" placeholder="Postal code" class="form-control" maxlength="6">
                       </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <input type="number" name="phone_number" placeholder="Phone Number" class="form-control" maxlength="10">
                   </div>

                      <div class="form-group text-center mt-4">
                        <input type="submit" name="register" class="btn btn-primary" value="Register">
                      </div>

                      <div class="text-center mt-4"> Already a Member? <a href="sign-in.php"> Sign in </a></div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
   
        <?php include('include/footer.php');?>