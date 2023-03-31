<div id="successMessage" style="margin-top: 2px;">
    <?php if($msg = $this->session->flashdata('msg')):?>
    <div class="alert alert-dismissible alert-secondary">
      <?php echo $msg;
        unset($_SESSION['msg']);
      ?>
    </div>
  <?php endif;  ?>
  </div>