<!--footer section start hare-->
<footer class="defpooter_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Copyright © Micron Shop all rights reserved. Powered by <b>Micron Infotech</b></p>
                </div>
            </div>
        </div>
    </footer>
    <!--footer section end hare-->
    <!--bootstrap links-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--owl slider link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- <script>
        $('.slider2').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            aotuplay:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:5
                }
            }
        });
        
        $('.slider1').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            aotuplay:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:1
                }
            }
        })
    </script> -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="<?=base_url()?>public/js/custom1.js"></script>

    
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