<div class="container">
    <div class="row">
        <div class="col-12  col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3 class="  mt-3">Register</h3>
                <hr>
               
               <form action="/register" method="post">

               <div class="row">
               
               <div class="col-12 col-sm-6">
                   <div class="form-group">
                     <label for="first_name">First Name</label>
                     <input type="text" class="form-control" name="first_name" id="first_name"  placeholder="First Name">

                   </div>
               </div>
               <div class="col-12 col-sm-6">
                   <div class="form-group">
                     <label for="last_name">Last Name</label>
                     <input type="text" class="form-control" name="last_name" id="last_name"  placeholder="Last Name">
                    </div>
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=set_value('email')?>">
                 
                </div>
                <div class="form-group ">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div> 
                <div class="form-group ">
                  <label for="confirm_password">Confirm Password</label>
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                </div> 
            </div>
            <?php if(isset($validation)): ?>
                <div class="col-12 mt-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $validation->listErrors();?>   
                </div>
                </div>
                <?php endif ?>
                <div class="row mt-3">
               <div class="col-12 col-sm-4"> <button type="submit" class="btn btn-primary">Update</button></div>
               </div>
            
            </form>
            </div>
        </div>
    </div>
</div>
