<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>


  <ul>
    <li><a href="<?php echo url_for('/birds.php'); ?>">View Birds</a></li>

    <?php if($session->is_admin_logged_in()) { ?>

      <li><a href="<?php echo url_for('members/index.php'); ?>">View Members</a></li> 

    <?php } ?>

    <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
    <li><a href="<?php echo url_for('/signup.php'); ?>">Sign Up</a></li>

  </ul>
    

<?php include(SHARED_PATH . '/public_footer.php'); ?>
