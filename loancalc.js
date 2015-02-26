function start(){
        $("#error").text("");
        var balance = $("#balance").val();
        if (balance === "") {
            $("#error").text("Please specify the Loan Balance.");
        }
        var term = $("#termofloan").val();
        if (term === "") {
            $("#error").text("Please specify the Term of Loan.");
        }
        var termUnits = $('input[name="term"]:checked').val();
        if (termUnits === "years") {
            term = term*12;
        }else if (termUnits === undefined) {
            $("#error").text("Please specify whether the term is in months or years.");
        }
        var rate = $("#rate").val();
        if (rate === "") {
            $("#error").text("Please specify the Interest Rate.");
        }
        var startMonth = $("#month").val();
        var startYear = $("#startyear").val();
        if (startYear === "") {
            $("#error").text("Please specify the Starting Year.");
        }
        var error = $("#error").text();
        if (error === "") {
            buildSchedule(balance,term,rate,startMonth,startYear);
        }

};

function buildSchedule(bal,term,rate,startMonth,startYear){
 var loanAmount = parseFloat(bal);
 var termLength = parseFloat(term);
 var month = startMonth;
 var year = parseFloat(startYear);
 var monthlyPay = 0;
 var interest = (parseFloat(rate)/100)/12;
 var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var result = "<tr><th class='date'>Date of Payment</th><th>Monthly Payment</th><th>Principal</th><th>Total Principal Paid</th><th>Interest</th><th>Total Interest Paid</th><th>Balance</th></tr>";
 monthlyPay = loanAmount*(interest/(1-Math.pow((1+interest),-termLength)));

 //make first entry
 var date = months[month -1] + "<br>" + year;
 var monthlyInterest = interest*loanAmount;
 var principal = monthlyPay - monthlyInterest;
 var totalPrincipal = principal;
 var totalInterest = monthlyInterest;
 var balance = loanAmount - principal;
 if(termLength === 1){
     balance = 0.00;
 }
 result = result.concat("<tr><td>"+date+"</td><td>$"+monthlyPay.toFixed(2)+"</td><td>$"+principal.toFixed(2)+"</td><td>$"+totalPrincipal.toFixed(2)+"</td><td>$"+monthlyInterest.toFixed(2)+"</td><td>$"+totalInterest.toFixed(2)+"</td><td>$"+balance.toFixed(2)+"</td></tr>");
 for(var i=1;i<termLength;i++){
     //new date
     if(month < 12){
         month++;
     }else{
         month = 1;
         year++;
     }
     date = months[month-1]+"<br>"+year;
     monthlyInterest = interest*balance;
     principal = monthlyPay - monthlyInterest;
     totalPrincipal += principal;
     totalInterest += monthlyInterest;
     balance -= principal;
     if(i === termLength - 1){
         balance = 0.00;
     }
     result = result.concat("<tr><td>"+date+"</td><td>$"+monthlyPay.toFixed(2)+"</td><td>$"+principal.toFixed(2)+"</td><td>$"+totalPrincipal.toFixed(2)+"</td><td>$"+monthlyInterest.toFixed(2)+"</td><td>$"+totalInterest.toFixed(2)+"</td><td>$"+balance.toFixed(2)+"</td></tr>");
 }
 document.getElementById("table").innerHTML = result;
}

