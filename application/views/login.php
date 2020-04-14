<!DOCTYPE html>
<html>
<head>
  <title><?= $title ?></title> 
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/icons.css'); ?>"> 
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login.css'); ?>">
  <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
</head>
<body >
  <div class="card col-md-5 mt-5">

    <h4 class="p-2 mt-3 text-center"><i class="ti ti-key"></i> Login Account</h4>
    
    <div class="text-center"><?= $this->session->flashdata('message'); ?></div>
    
    <div class="card-content p-2">
      <form action="<?= base_url('Sistem/login') ?>" method="POST" id="formlogin" name="formlogin">
        <div class="form-group row">
          <label class="col-sm-1 col-form-label"><i class="fa fa-user-o"></i></label>
          <div class="col-sm-11">
            <input type="text" name="username" placeholder="Enter Username" class="form-control" autocomplete="off" value="<?= set_value('username'); ?>">
            <?= form_error('username','<small class="text-danger">','</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label"><i class="ti ti-lock"></i></label>
          <div class="col-sm-11">
            <div class="input-group">
              <input type="password" name="password" placeholder="Enter Password" class="form-control" autocomplete="off">
              <div class="input-group-append">
               <span id="btn_view" class="input-group-text" onclick="view()"><i class="fa fa-eye"></i></span>
               <span id="btn_hide" class="input-group-text" onclick="hide()"><i class="fa fa-eye-slash"></i></span>
             </div>
           </div>
           <?= form_error('password','<small class="text-danger">','</small>'); ?>
         </div>
       </div>
       <button type="submit" class="btn text-white w-100 mb-4" style="background-color:#4a69bb ">Login Now</button>
     </form>
   </div>
 </div>

 <!-- Footer -->
 <script type="text/javascript">
  // Buton //
  function view(){
    document.formlogin.password.type="text";
    document.getElementById("btn_view").style.display="none";
    document.getElementById("btn_hide").style.display="block";
  } 
  function hide(){
    document.formlogin.password.type="password";
    document.getElementById("btn_view").style.display="block";
    document.getElementById("btn_hide").style.display="none";
  }
</script> 
</body>
</html>