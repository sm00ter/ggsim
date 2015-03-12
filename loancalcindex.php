<!DOCTYPE HTML>
    <html>
        <head>
            <title>Loan Calc widget</title>
            <link rel=stylesheet href=style.css>
        </head>
        <body>
            <div class="widget">
                <div class="content">
                <form method="get" action="loancalc.php">
                    <h1>Loan Calculator</h1>
                    <div class="box1">
                        <h2>Loan Balance<span style="font-size: x-small; vertical-align: text-top"> ($)</span></h2>
                        <input type="text" name="balance" id="balance">
                    </div>
                    <div class="box2">
                        <h2>Term of Loan</h2>
                        <input type="text" id="termofloan" name="termofloan">
                        <select id="termunits" name="termunits">
                            <option name="term" id="months" value="months">Months</option>
                            <option name="term" id="months" value="years">Years</option>
                        </select>
                    </div>
                    <div class="box3">
                        <h2>Interest Rate <span style="font-size: x-small; vertical-align: text-top">(%)</span></h2>
                        <input type="text" id="rate" name="rate">
                    </div>
                    <div class="box4">
                        <h2>Starting Date</h2>
                        <select id="month" name="sm">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <input type="text" id="startyear" name="sy">
                    </div>
                    <input type="submit">
                </form>
                </div>
            </div>
        </body>
    </html>
