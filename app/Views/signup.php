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
                                <?php if(isset($validation)):?>
                                    <div class="col-12">
                                        <div class="alert alert-danger">
                                        <?= $validation->listErrors() ?>
                                        </div>
                                    </div>
                                <?php endif;?>
                            <h3>Sign Up</h3>
                           
                            <form acction="<?=base_url()?>signup" method="post" class="Signup_formsc">
                                <input type="text" value="<?=set_value('username')?>" name="username" placeholder="User Name" class="Signup_input" >
                                <input type="text" value="<?=set_value('email')?>" name="email" placeholder="Email" class="Signup_input" >
                                <input type="number" value="<?=set_value('mobile')?>" name="mobile" placeholder="Phone Number" class="Signup_input">
                                <input type="password" name="password" placeholder="Password" class="Signup_input" >
                                <input type="text" name="c_password" placeholder="Confirm Password" class="Signup_input" >
                                <button class="Signup_formbtn">Sign Up</button>
                            </form>
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
    
    <!-- tostr -->
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