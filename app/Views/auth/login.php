<div class="container">
    <div class="row">
        <div class="col-12 card col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3 class=" card-title mt-3">Login</h3>
                <hr>

                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
               <form action="/" method="post">
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=set_value('email')?>">
                 
                </div>
                <div class="form-group my-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <?php if(isset($validation)): ?>
                <div class="col-12 mt-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $validation->listErrors();?>   
                </div>
                </div>
                <?php endif ?>
                <div class="row">
               <div class="col-12 col-sm-4"> <button type="submit" class="btn btn-primary">Submit</button></div>
               <div class="col-12 col-sm-8"><a href="/register">Don't have any account?</a></div>
               </div>
            </form>
            </div>
        </div>
    </div>
</div>