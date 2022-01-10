<!-- <pre>
<?=print_r($this->session)?>
</pre> -->
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="<?=base_url()?>" class="text-white"><b>Little</b>HATHEE</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body p-4 login-card-body">
        <p class="text-center py-3"><img src="<?=base_url('uploads/logoDark.png')?>" class="w-50" alt=""></p>
      <p class="login-box-msg">Sign in to start your session</p>
      <?php
        if($this->session->flashdata('msg') != '')
        {
            ?>
            <div class="alert flash-msg <?=$this->session->flashdata('type')?>">
                <span class="text-white"><i class="fa fa-times"></i> <?=$this->session->flashdata('msg')?></span>
            </div>
            <?php
        }
      ?>
      

      <form action="<?=base_url('Auth/Login')?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required="">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required="">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <p class="mt-2"><a href="#">I forgot my password</a></p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn bg-navy btn-block"><i class="fa fa-chevron-circle-right"></i> Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
      </p>
      <p class="mb-0">
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
