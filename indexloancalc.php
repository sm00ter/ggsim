/*index.php for loancalc */
<!DOCTYPE HTML>
    <html>
        <head>
            <title>Loan Calculator</title>
            <link rel=stylesheet href=style.css>
            <script src="script.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        </head>
        <body>
            <div id="header">
                <h1>Loan Calculator</h1>
                <div id="wrapper">
                    <div>
                        <h2>Loan Balance<span style="font-size: x-small; vertical-align: text-top"> ($)</span></h2>
                        <input type="number" id="balance"></div>
                    <div>
                        <h2>Term of Loan</h2>
                        <input type="number" id="termofloan"><br>
                        <input type="radio" name="term" id="months" value="months">Months 
                        <input type="radio" name="term" id="years" value ="years">Years
                    </div>
                    <div>
                        <h2 id="interestrate">Interest Rate <span style="font-size: x-small; vertical-align: text-top">(%)</span></h2>
                        <input type="number" id="rate">
                    </div>
                    <div>
                        <h2>Starting Date</h2>
                        <select id="month">
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
                        <input type="number" id="startyear">
                    </div>
                    <p><span style="color:#ff0000" id="error"></span></p>
                    <input type="submit" id="submit" onclick="start()">
                </div>
            </div>
            <div id="schedule">
                <table id="table">
                    <tr>
                        <th class="date">Date of Payment</th>
                        <th>Monthly Payment</th>
                        <th>Principal</th>
                        <th>Interest</th>
                        <th>Total Interest Payed</th>
                        <th>Balance</th>
                    </tr>
                </table>
            </div>
        </body>
    </html>
