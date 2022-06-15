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

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<!--<script src="/--><?php //echo $ressourceRoot ?><!--/resources /vendor/jquery/jquery.min.js"></script>-->
<script src="/<?php echo $ressourceRoot ?>/resources /vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/<?php echo $ressourceRoot ?>/resources /vendor/jquery-easing/jquery.easing.min.js"></script>

<script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="/<?php echo $ressourceRoot ?>/resources /vendor/chart.js/Chart.min.js"></script>
<script src="/<?php echo $ressourceRoot ?>/resources /vendor/datatables/jquery.dataTables.js"></script>
<script src="/<?php echo $ressourceRoot ?>/resources /vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="/<?php echo $ressourceRoot ?>/resources /js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="/<?php echo $ressourceRoot ?>/resources /js/demo/datatables-demo.js"></script>
<script src="/<?php echo $ressourceRoot ?>/resources /js/demo/chart-area-demo.js"></script>

<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


<script>
    $(document).ready(function () {
        $.post('../process_data/ajax_operation.php',{

        },function (data, status) {
            console.log(data);
            data = $.parseJSON(data);
            var total = data.total,
                clothD = data.clothD,
                cloth = data.cloth,
                foodD = data.foodD,
                food = data.food,
                moneyD = data.moneyD,
                money = data.money,
                blood = data.blood;
            console.log(data);
            $('.total-number').html(total);
            $('.cloth-d').html(clothD);
            $('.cloth').html(cloth);
            $('.money-d').html(moneyD);
            $('.money').html(money);
            $('.food-d').html(foodD);
            $('.food').html(food);
            $('.blood').html(blood);
        });

        setInterval(function () {
            $.post('../process_data/ajax_operation.php',{

            },function (data, status) {
                console.log(data);
                data = $.parseJSON(data);
                var total = data.total,
                    clothD = data.clothD,
                    cloth = data.cloth,
                    foodD = data.foodD,
                    food = data.food,
                    moneyD = data.moneyD,
                    money = data.money,
                    blood = data.blood;
                console.log(data);
                $('.total-number').html(total);
                $('.cloth-d').html(clothD);
                $('.cloth').html(cloth);
                $('.money-d').html(moneyD);
                $('.money').html(money);
                $('.food-d').html(foodD);
                $('.food').html(food);
                $('.blood').html(blood);
            });
        },5000)

    });
</script>



</body>

</html>
