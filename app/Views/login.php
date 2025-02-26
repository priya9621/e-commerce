<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page Design</title>
    
    <!--bootstrap links-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!--css link-->
    <link rel="stylesheet" href="<?=base_url()?>public/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>public/css/responsive.css">
    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--owl slider link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
   
</head>
<body>
    
    <!--signup section start hare-->
    <section class="Signup_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="Signup_textsc">
                        <div class="Signup_lefttxtbox">
                            <img src="<?=base_url()?>public/images/15.jpg" alt="" class="Signup_img">
                        </div>
                        <div class="Signup_righttxtbox">
                            <?php if(isset($validation)): ?>
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <?=$validation->listErrors();?>
                                    </div>
                                </div>
                             <?php endif;?>   
                            <h3>Login</h3>
                            <form action="<?=base_url()?>login" method="post" class="Signup_formsc">
                                <input type="text" name="email" value="<?=set_value('email')?>" placeholder="Email" class="Signup_input" >
                                <div class="Signup_passwordbox">
                                    <input type="text" name="password" placeholder="Password" class="Signup_input1" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="Signup_passwordicon" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                      </svg>
                                </div>
                                <button class="Signup_formbtn">Login</button>
                            </form>
                            <h5><a href="<?=base_url()?>signup">Need An Account <span></span></a></h5> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--signup section end hare-->
    

    <!--bootstrap links-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--owl slider link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <!-- toastr -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <?php $session = session() ?>

      <?php if($session->getFlashdata('success') != null): ?>
          <script type='text/javascript'>
              toastr.success('<?= $session->getFlashdata('success') ?>');
          </script>
      <?php elseif($session->getFlashdata('error') != null): ?>
          <script type='text/javascript'>
              toastr.error('<?= $session->getFlashdata('error') ?>');
          </script>
      <?php elseif($session->getFlashdata('info') != null): ?>
          <script type='text/javascript'>
              toastr.info('<?= $session->getFlashdata('info') ?>');
          </script>
      <?php elseif($session->getFlashdata('warning') != null): ?>
          <script type='text/javascript'>
              toastr.warning('<?= $session->getFlashdata('warning') ?>');
          </script>
    <?php endif;?>

</body>
</html>