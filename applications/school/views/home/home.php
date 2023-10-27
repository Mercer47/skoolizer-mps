<?php $this->view('header') ?>
<div class="col-md-12" style="padding: 20px;">
      <?php if($this->session->userdata('usertype')->usertype != "admin") { ?>
       
      <?php } else { ?>
         <?php $this->view('dashboard'); ?>
         <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<?php $this->view('footer') ?>
      <?php } ?>
</div>

