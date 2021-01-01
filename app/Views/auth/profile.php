


<div class="container">
    <div class="row">
        <div class="col-12  col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3 class="  mt-3"><?=$user['first_name'].' '.$user['last_name']?></h3>
                <hr>
                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
               <form action="/profile" method="post">

               <div class="row">

               <div class="col-12 col-sm-6">
                   <div class="form-group">
                     <label for="first_name">First Name</label>
                     <input type="text" class="form-control" name="first_name" id="first_name"  placeholder="First Name" value="<?=set_value('first_name',$user['first_name'])?>">

                   </div>
               </div>
               <div class="col-12 col-sm-6">
                   <div class="form-group">
                     <label for="last_name">Last Name</label>
                     <input type="text" class="form-control" name="last_name" id="last_name"  placeholder="Last Name" value="<?=set_value('last_name',$user['last_name'])?>">
                    </div>
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" readonly value="<?=$user['email']?>">
                 
                </div>
                <div class="form-group ">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
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
               <div class="col-12 col-sm-4"> <button type="submit" class="btn btn-primary">Submit</button></div>
               <div class="col-12 col-sm-8"><a href="/register">Already have an account?</a></div>
               </div>
            
            </form>
            </div>
        </div>
    </div>
</div>