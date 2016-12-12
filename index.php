<?php include_once "calculator.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tip calculator</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="header">
                <h2><?php if(!(is_numeric($sub_total) && is_numeric($tip_percentage) && is_numeric($people))){ echo 'Must enter numbers!'; } ?></h2>
                <form name="calculator" action="" method="post">
                    <label for="bill-subtotal">Bill subtotal</label><br>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <input type="text" id="bill-subtotal"  name="subtotal" value="<?php echo isset($_POST['subtotal']) ? $_POST['subtotal'] : '0.00' ?>" required>
                    <br><br>
                    <label for="tip-percentage">Tip percentage</label><br>
                    <?php 
                        for($i = 10 ; $i <= 20; $i += 5 ){
                            echo "<label for=\"$i\">$i%</label><input class=\"checkbox\" type=\"radio\" id=\"$i\" name=\"amount\" onClick=\"val(this.id)\">";
                        } 
                    ?>
                    
                    <br>
                    <i class="fa fa-percent" aria-hidden="true"> </i><input  type="text" id="tip-amount" name="tip-percentage" value="<?php echo isset($_POST['tip-percentage']) ? $_POST['tip-percentage'] : '0' ?>" required>
                    <br>
                    <br>
                    <label for="split">Number of people</label>
                    <br>
                    <i class="fa fa-users" aria-hidden="true"></i><input type="text" id="split" name="people" value="<?php echo isset($_POST['people']) ? $_POST['people'] : '1' ?>" required>
                    <input type="submit" value="calculate" id="calculate" class="button">
                </form>
            </div>
              <?php if(is_numeric($sub_total) && ($sub_total != 0) && is_numeric($tip_percentage) && ($tip_percentage != 0) && is_numeric($people)){
                    echo "
                    <div class='results'>
                        
                    <br>
              
                    <div class='total'>          
                        <h3>Total</h3>
                        <h4>Tip: $$tip</h4>

                        <h4>Bill Total: $$total </h4>
                    </div>
                    ";
                    if($people > 1){
                        echo " 
                        <div class='split'>
                            <h3>Split amount</h3>
                            <h4>Tip: $$split_tip</h4>

                             <h4>Total: $$split_total</h4>
                        </div>
                        ";
                    }
                    
                    
                }
                ?>
            </div>

        </div>

        <script>

            function val(id){
                document.getElementById("tip-amount").value = id;
            }
        </script>
    </body>

</html>