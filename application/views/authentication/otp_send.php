<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Skydash Admin</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/feather/feather.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/css/vendor.bundle.base.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/plugin/sweetalert2/sweetalert2.min.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/vertical-layout-light/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon.png" />

	<!-- plugins:js -->
	<script src="<?= base_url('assets/'); ?>vendors/js/vendor.bundle.base.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets/plugin/sweetalert2/sweetalert2.min.js"></script>
</head>

<body>
  <!-- ALERT -->
  <?php if ($this->session->flashdata('error')) { ?>
  <script>
    Swal.fire({
      text: '<?php echo $this->session->flashdata('error');?>',
      icon: 'info',
    })

  </script>
  <?php }?>

  <?php if ($this->session->flashdata('warning')) { ?>
  <script>
    Swal.fire({
      text: '<?php echo $this->session->flashdata('warning');?>',
      icon: 'warning',
    })

  </script>
  <?php }?>

  <?php if ($this->session->flashdata('success')) { ?>
  <script>
    Swal.fire({
      text: '<?php echo $this->session->flashdata('success');?>',
      icon: 'success',
    })

  </script>
  <?php }?>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth px-0">
				<div class="row w-100 mx-0">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left py-5 px-4 px-sm-5">
							<div class="brand-logo">
								<img src="<?= base_url('assets/'); ?>images/logo.svg" alt="logo">
							</div>
							<center>
								<h4>Verifikasi OTP</h4>
							</center>
              <center><small class="text-warning">Hai <b><?= $this->session->userdata('nama');?></b>, pilih salah satu
                  metode dibawah ini untuk menerima kode OTP sebelum login.</small></center>
              <div class="mt-3">
                <div class="btn-group btn-block" role="group" aria-label="Basic example" id="send-button">
                  <a href="<?= site_url('send-otp/email');?>" class="btn btn-primary ">Kirim OTP Email</a>
                  <a href="<?= site_url('send-otp/sms');?>" class="btn btn-primary ">Kirim OTP SMS</a>
                </div>
              </div>
              <div class="text-center mt-4 font-weight-light">
                Change account? <a href="<?= site_url('logout');?>" class="text-primary">logout</a>
              </div>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->

<script>
  $('form').submit(function(event) {
    $('#send-button').prop("disabled", true);
    // add spinner to button
    $('#send-button').html(
      `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
      );
    return;
  });
</script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="<?= base_url('assets/'); ?>js/off-canvas.js"></script>
	<script src="<?= base_url('assets/'); ?>js/hoverable-collapse.js"></script>
	<script src="<?= base_url('assets/'); ?>js/template.js"></script>
	<script src="<?= base_url('assets/'); ?>js/settings.js"></script>
	<script src="<?= base_url('assets/'); ?>js/todolist.js"></script>
	<!-- endinject -->
</body>

</html>
