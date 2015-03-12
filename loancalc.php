<!DOCTYPE HTML>
<?php
$ok = true;
$termE = true;
$rateE = true;
$balE = true;
$startYearE = true;
$bal = $_GET['balance'];
if(strlen($bal) >= 0 && strlen($bal) < 10){
    $bal = (double)$bal;
    if(empty($bal)){
        $ok = false;
        $balE = false;
    }else if($bal == 0){
        $ok = false;
        $balE = false;
    }
}else{
    $ok = false;
    $balE = false;
}
$term = $_GET['termofloan'];
if(strlen($term) >= 0 && strlen($term) < 6){
    $term = (int)$term;
    if(empty($term)){
        $ok = false;
        $termE = false;
    }else if($term == 0){
        $ok = false;
        $termE = false;
    }
}else{
    $ok = false;
    $termE = false;
}
$termunits = $_GET['termunits'];
if(strlen($termunits) == 5 || strlen($termunits) == 6){
    if($termunits == "years"){
        $term *= 12;
    }
}else{
    $ok = false;
}
$rate = $_GET['rate'];
if(strlen($rate) >= 0 && strlen($rate) < 13){
    $rate = (double)$rate;
    if(empty($rate)){
        $ok = false;
        $rateE = false;
    }else if($rate == 0 || $rate > 100){
        $ok = false;
        $rateE = false;
    }
}else{
    $ok = false;
    $rateE = false;
}
$startMonth = $_GET['sm'];
if(strlen($startMonth) == 1 || strlen($startMonth) == 2){
    $startMonth = (int)$startMonth;
}else{
    $ok = false;
}
$startYear = $_GET['sy'];
if(strlen($startYear) > 0){
    $startYear = (int)$startYear;
    if(empty($startYear)){
        $ok = false;
        $startYearE = false;
    }else if($startYear == 0){
        $ok = false;
        $startYearE = false;
    }
}else{
    $ok = false;
    $startYearE = false;
}
if($ok){
    //build schedule table and return it.
    /*payment  per monthformula = M=P*(J/(1-(1+J)^-N))
     *where m = monthly payment
     *where p = loan amount
     *where j = interest rate
     *where n = number of months
     *
     *interest per month = (interest/12)*balance)
     *
     *principal per month = (interest per month - payment per month)
     */
    $loanAmount = $bal;
    $monthlyPay = 0;
    $interest = ($rate/100)/12;
    
    $table = "<table><tr><th class='date'>Date of Payment</th><th>Monthly Payment</th><th>Principal</th><th>Total Principal</th><th>Interest</th><th>Total Interest Payed</th><th>Balance</th></tr>";
    
    //<tr><td class='date'>" . $dateOfPay . "</td><td>" . $monthlyPay . "</td><td>" . $prinicipal . "</td><td>" . $interest . "</td><td>" . $totalInterest . "</td><td>" . $balance . "</td></tr>";
    
    //calculate payments per month
    $monthlyPay = $loanAmount*($interest/(1-(1+$interest)**-$term));
    $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
    //build first entry
    $month = $startMonth;
    $year = (float)$startYear;
    $date = $months[$month -1] . " " . $year;
    $monthlyInterest = $interest*(float)$bal;
    $principal = $monthlyPay - $monthlyInterest;
    $totalInterest = $monthlyInterest;
    $balance = ($bal)-$principal;
    $totalPrincipal = $principal;
    if($term == 1){
        $balance = 0.00;
    }
    $table .= "<tr><td>".$date."</td><td>$".roundNum($monthlyPay)."</td><td>$".roundNum($principal)."</td><td>$".roundNum($totalPrincipal)."</td><td>$".roundNum($monthlyInterest)."</td><td>$".roundNum($totalInterest)."</td><td>$".roundNum($balance)."</td></tr>";
    //build the rest of the results
    for($i = 1;$i < $term; $i++){
        //new date
        if($month < 12){
            $month++;
        }else{
            $month = 1;
            $year++;
        }
        $date = $months[$month -1]." ".$year;
        //new monthlyinterest
        $monthlyInterest = $interest*$balance;
        
        //new monthlyprincipal
        $principal = $monthlyPay-$monthlyInterest;
        //new totalinterest
        $totalInterest += $monthlyInterest;
        //new balance
        $balance -= $principal;
        $totalPrincipal +=$principal;
        if($i == $term -1){
            $balance = 0.00;
        }
        //add entry to result
        $table .= "<tr><td>".$date."</td><td>$".roundNum($monthlyPay)."</td><td>$".roundNum($principal)."</td><td>$".roundNum($totalPrincipal)."</td><td>$".roundNum($monthlyInterest)."</td><td>$".roundNum($totalInterest)."</td><td>$".roundNum($balance)."</td></tr>";
    }
}
function roundNum($num){
    $num = round($num, 2);
    return $english_format_number = number_format($num, 2);
}


?>
<html>
    <head>
        <title>Loan Calc widget</title>
        <link rel=stylesheet href=style.css>
    </head>
    <body>
        <div class=schedule>
            <?php
            if($ok){
                echo $table . "</table>";
            }
            ?>
        </div>
        <div class="widget">
            <div class="content">
            <form method="get" action="loancalc.php">
                <h1>Loan Calculator</h1>
                <div class="box1">
                    <h2>Loan Balance<span style="font-size: x-small; vertical-align: text-top"> ($)</span></h2>
                    <?php if(!$balE){echo "<p id='error'>Please enter a valid number.</p>";}?>
                    <input type="text" name="balance" id="balance" value=<?php echo $bal;?>>
                </div>
                <div class="box2">
                    <h2>Term of Loan</h2>
                    <?php if(!$termE){echo "<p id='error'>Please enter a valid number.</p>";}?>
                    <input type="text" id="termofloan" name="termofloan" value=<?php echo ($termunits == "months") ? $term : $term/12;?>>
                    <select id="termunits" name="termunits" value=<?php echo $termunits;?>>
                        <option name="term" value="months"<?php echo($termunits == "months") ? 'selected="selected"' : '';?>>Months</option>
                        <option name="term" value="years"<?php echo($termunits == "years") ? 'selected="selected"' : '';?>>Years</option>
                    </select>
                </div>
                <div class="box3">
                    <h2>Interest Rate <span style="font-size: x-small; vertical-align: text-top">(%)</span></h2>
                    <?php if(!$rateE){echo "<p id='error'>Please enter a valid number.</p>";}?>
                    <input type="text" id="rate" name="rate" value=<?php echo $rate ?>>
                </div>
                <div class="box4">
                    <h2>Starting Date</h2>
                    <?php if(!$startYearE){echo "<p id='error'>Please enter a valid number.</p>";}?>
                    <select id="month" name="sm">
                        <option value="1"<?php echo($startMonth == 1) ? 'selected="selected"' : '';?>>January</option>
                        <option value="2"<?php echo($startMonth == 2) ? 'selected="selected"' : '';?>>February</option>
                        <option value="3"<?php echo($startMonth == 3) ? 'selected="selected"' : '';?>>March</option>
                        <option value="4"<?php echo($startMonth == 4) ? 'selected="selected"' : '';?>>April</option>
                        <option value="5"<?php echo($startMonth == 5) ? 'selected="selected"' : '';?>>May</option>
                        <option value="6"<?php echo($startMonth == 6) ? 'selected="selected"' : '';?>>June</option>
                        <option value="7"<?php echo($startMonth == 7) ? 'selected="selected"' : '';?>>July</option>
                        <option value="8"<?php echo($startMonth == 8) ? 'selected="selected"' : '';?>>August</option>
                        <option value="9"<?php echo($startMonth == 9) ? 'selected="selected"' : '';?>>September</option>
                        <option value="10"<?php echo($startMonth == 10) ? 'selected="selected"' : '';?>>October</option>
                        <option value="11"<?php echo($startMonth == 11) ? 'selected="selected"' : '';?>>November</option>
                        <option value="12"<?php echo($startMonth == 12) ? 'selected="selected"' : '';?>>December</option>
                    </select>
                    <input type="text" id="startyear" name="sy" value=<?php echo $startYear;?>>
                </div>

                <input type="submit">
            </form>
                                <?php
                    function Error($e, $i){
                    echo "<p id='error'>".$e." is not a valid input for ".$i.", please re-enter a valid number.</p>";
                    }
                    ?>
            </div>
        </div>
    </body>
</html>
