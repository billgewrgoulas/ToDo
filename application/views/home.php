<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>Welcome <?php echo $name ?></h1>
<h1>Email: <?php echo $email ?></h1>

<div id="body">
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
        <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
    </p>
</div>