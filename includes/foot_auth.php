<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 05-09-19
 * Time: 22.19
 */

$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];
?>

<!-- Bootstrap core JavaScript-->
<!--<script src="/--><?php //echo $ressourceRoot ?><!--/resources/vendor/jquery/jquery.min.js"></script>-->
<script src="/<?php echo $ressourceRoot ?>/resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/<?php echo $ressourceRoot ?>/resources/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
