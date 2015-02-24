//global variables
var multiplier = 1;
var mults = 0;
var mSelect = 2;
var gateChoice = "";
var gatesp = 0;
var ammo = 0;
var nano = 0;
var xeno = 0;
var rep = 0;
var ldisks = 0;
var spins;
var kronos = false;
var dbgate;
//create gate objects
var aby = new Gate(0);
var delta = new Gate(128);
var epsilon = new Gate(99);
var zeta = new Gate(111);
var kappa = new Gate(120);
var lambda = new Gate(45);
var hades = new Gate(45);
var alpha = new Gate(34);
var beta = new Gate(48);
var gamma = new Gate(82);
//capitalize function for gatename display
function capitalize(s){
    return s[0].toUpperCase() + s.slice(1);
};
//multiplier function to work multipliers
var mult = function(){
    if(multiplier === mSelect){
        multiplier = 1;
        return mSelect;
    }else{
        return 1;
    }
};
//random function to work randoms
var rand = function(num){
    return Math.floor(Math.random()*num);
};
//gatebuilder function to call which gate to start building
var gateBuilder = function(gate){
    if(gate === "aby" || gate === "alpha" || gate === "beta" || gate === "gamma"){
        var r = rand(3);
        if(r === 0){
            alpha.buildGate();
        }else if(r === 1){
            beta.buildGate();
        }else if(r === 2){
            gamma.buildGate();
        }
    }else if(gate === "delta"){
        delta.buildGate();
    }else if(gate === "epsilon"){
        epsilon.buildGate();
    }else if(gate === "zeta"){
        zeta.buildGate();
    }else if(gate === "kappa"){
        kappa.buildGate();
    }else if(gate === "lambda"){
        lambda.buildGate();
    }else if(gate === "hades"){
        hades.buildGate();
    }
};
//gate class constructor
function Gate(pieces){
    this.pieces = pieces; //number of pieces this gate requires to be built
    this.piece = undefined; //new piece created every time a piece is spun
    this.built = 0; //number of gates built
    this.currentPieces = 0; //number of unique pieces collected
    this.tracker = []; //tracker array that keeps track of unique pieces  
    this.buildGate = function(){
        this.tracker.length = this.pieces;
        this.currentPieces = 0;
        this.piece = rand(this.pieces);
        //check if new piece or duplicate, if duplicate then add to multiplier
        if(this.tracker[this.piece] === undefined){
            this.tracker[this.piece] = this.piece;
            gatesp++;
        }else{
            multiplier++;
            mults++;
        }
        //count how many unique pieces we have
        for(var i = 0;i <= this.tracker.length;i++){
            if(this.tracker[i] !== undefined) {
                this.currentPieces++;
            }
        }
        //checks if we finished building a gate
        if(this.currentPieces === this.pieces){
            this.built++;
            this.tracker = [];
            this.tracker.length = this.pieces;
        }
        //update display
        if(!kronos){
            if(gateChoice === "aby"){
                $("#alphainfo").text("Alpha: " + alpha.built + " Built " + alpha.currentPieces + "/" + alpha.pieces);
                $("#betainfo").text("Beta: " + beta.built + " Built " + beta.currentPieces + "/" + beta.pieces);
                $("#gammainfo").text("Gamma: " + gamma.built + " Built " + gamma.currentPieces + "/" + gamma.pieces);
            }else{
                $("#gateinfo").text(this.built + " Built " + this.currentPieces + "/" + this.pieces);
            }
        }
    };
    this.reset = function(){
        this.built = 0;
        this.tracker = [];
        this.tracker.length = this.pieces;
    };
};
//reset gate
function resetGate(obj){
    if(!kronos){
        if(obj === "aby"){
            alpha.reset();
            beta.reset();
            gamma.reset();
        }else if(obj === "delta"){
            delta.reset();
        }else if(obj === "epsilon"){
            epsilon.reset();
        }else if(obj === "zeta"){
            zeta.reset();
        }else if(obj === "kappa"){
            kappa.reset();
        }else if(obj === "lambda"){
            lambda.reset();
        }else if(obj === "hades"){
            hades.reset();
        }
    }else{
        alpha.reset();
        beta.reset();
        gamma.reset();
        delta.reset();
        epsilon.reset();
        zeta.reset();
        kappa.reset();
        lambda.reset();
    }
};
//multSelect function for changing which multiplier to activate;
function multSelect(){
        mSelect = $("#multselect0").val();
        if(mSelect >= 2 && mSelect < 6){
            mSelect++;
        }else{
            mSelect = 2;
        }
        $("#multselect0").val(mSelect);
        $("#multselect1").val(mSelect);
};
//main functions--------------------------------------------
function gateSelect(g){
    //select gate and display
    gateChoice = g;
    if(g === "aby"){
        $("#gatename").text("A/B/Y Gate");
        $("#gateinfo").text("");
        $("#alphainfo").text("Alpha:");
        $("#betainfo").text("Beta:");
        $("#gammainfo").text("Gamma:");
    }else if(g === "Kronos"){
        var gate = capitalize(g);
        $("#gatename").text(gate + " Gate");
        $("#gateinfo").text("");
        $("#alphainfo").text("");
        $("#betainfo").text("");
        $("#gammainfo").text("");
    }else {
        var gate = capitalize(g);
        $("#gatename").text(gate + " Gate");
        $("#gateinfo").text("");
        $("#alphainfo").text("");
        $("#betainfo").text("");
        $("#gammainfo").text("");
    }
};
//main start function
function start(){
    //get spins and display
    spins = $("#inputspins").val();
    $("#spins").text(spins);
    //reset vars
    ammo = 0;
    nano = 0;
    xeno = 0;
    rep = 0;
    ldisks = 0;
    gatesp = 0;
    mults = 0;
    resetGate(gateChoice);
    //reset variables display
    $("#ammo").text(ammo);
    $("#nano").text(nano);
    $("#xeno").text(xeno);
    $("#rep").text(rep);
    $("#ldisks").text(ldisks);
    $("#gates").text(gatesp);
    $("#mults").text(mults);
    run();
};
function run(){
        //alert(kappa.currentPieces + " " + spins);
        while(spins > 0){
        var chance = rand(100);
        if (chance === 0) {
            ldisks += (1 * mult());
            $("#ldisks").text(ldisks);
        } else if (chance >= 1 && chance <= 67) {
            ammo += (1 * mult());
            $("#ammo").text(ammo);
        } else if (chance >= 68 && chance <= 71) {
            nano += (1 * mult());
            $("#nano").text(nano);
        } else if (chance >= 72 && chance <= 74) {
            rep += (1 * mult());
            $("#rep").text(rep);
        } else if (chance >= 75 && chance <= 86) {
            xeno += (1 * mult());
            $("#xeno").text(xeno);
        } else if (chance >= 87 && chance <= 99) {
            for(j = 0;j <= mult();j++){
                gateBuilder(gateChoice);
            }
            $("#gates").text(gatesp);
            $("#mults").text(mults);
        }else {
            alert("Error");
        }
        spins--;
    }
};
function buildKronos(){
    //4 alpha, 3 beta, 1 gamma, 1 delta, 4 epsilon, 1 zeta, 2 kappa, 5 lambda
    $("#gatename").text("Kronos Gate");
    kronos = true;
    resetGate();
    //build a gate;
    var totalspins = 0;
    ammo = 0;
    nano = 0;
    xeno = 0;
    rep = 0;
    ldisks = 0;
    gatesp = 0;
    mults = 0;
    //var k = ['alpha','alpha','alpha','alpha','beta','beta','beta','gamma','delta','epsilon','epsilon','epsilon','epsilon','zeta','kappa','kappa','lambda','lambda','lambda','lambda','lambda']
    gateChoice = 'aby';
    while(alpha.built < 4){
        spins = 1;
        run();
        totalspins++;
    }
    //build b gate
    while(beta.built < 3){
        spins = 1;
        run();
        totalspins++;
    }
    //build y gate
    while(gamma.built < 1){
        spins = 1;
        run();
        totalspins++;
    }
    //build delta gate
    gateChoice='delta';
    while(delta.built < 1){
        spins = 1;
        run();
        totalspins++;
    }
    //build epsilon gate
    gateChoice='epsilon';
    while(epsilon.built < 4){
        spins = 1;
        run();
        totalspins++;
    }
    //build zeta gate
    gateChoice='zeta';
    while(zeta.built < 1){
        spins = 1;
        run();
        totalspins++;
    }
    //build kappa
    gateChoice = 'kappa';
    while(kappa.built < 2){
        spins = 1;
        run();
        totalspins++;
    }
    //build lambda
    gateChoice = 'lambda';
    while(lambda.built < 5){
        spins = 1;
        run();
        totalspins++;
    }
    //output result
    $("#gateinfo").text("It took " + totalspins + " spins to build Kronos Gate.");
};
function dbinput(){
    var i = $('input[name="input"]:checked').val();
    if(i === "spins"){
        $("#dbspins").prop('disabled', false);
        $("#average").prop('disabled', false);
        $("#dbgatestobuild").prop('disabled', true);
    }else{
        $("#dbspins").prop('disabled', true);
        $("#average").prop('disabled', true);
        $("#dbgatestobuild").prop('disabled', false);
    }
};
function dbGateChoice(gate){
    dbgate = gate;
    if(gate === "aby"){
        $("#abyradio").show();
        dbgate = $('input[name="aby"]:checked').val();
    }else if(gate === "kronos"){
        $("#abyRadio").hide();
        $("#gatenum").prop("checked", true);
        dbinput();
    }else{
        $("#abyradio").hide();
    }
};
function averageStart(){
    var which = $('input[name="input"]:checked').val();
    var dbspins = $("#dbspins").val();
    var average = $("#average").val();
    var numGates = $("#dbgatestobuild").val();
    var dbmult = $("#multselect1").val();
    if(which === "spins"){
        dbspins = parseInt(dbspins);
        average = parseInt(average);
        numGates = undefined;
    }else if(which === "gatenum"){
        numGates = parseInt(numGates);
        dbspins = undefined;
        average = undefined;
    }

    //Process(); function that sends this information to the server to be processed/stored on db and then returns averages but for now its going to be client sided js

    averageProcess(dbgate,dbspins,average,numGates,dbmult);
};
function averageProcess(gate,dspins,average,numGates,mult){
    alert(gate+" "+dspins+" "+average+" "+numGates+" "+mult);
    if(dspins === undefined){
        var totalSpins = 0;
        var gateCost = []; //push each gatecost in, sort, first = min last= max add all together and / by length = average;
        var aveAmmo = [];
        var aveNano = [];
        var aveXeno = [];
        var aveRep = [];
        var aveLdisks = [];
        gateChoice = gate;
        mSelect = mult;
        var num = numGates;
        while(num > 0){
            if(gateChoice === "alpha"){
                while(alpha.built < 1){
                    spins = 1;
                    run();
                    totalSpins++;
                }
            }else if(gateChoice === "beta"){
                while(beta.built < 1){
                    spins = 1;
                    run();
                    totalSpins++;
                }
            }else if(gateChoice === "gamma"){
                while(gamma.built < 1){
                    spins = 1;
                    run();
                    totalSpins++;
                }
            }else if(gateChoice === "delta"){
                while(delta.built < 1){
                    spins = 1;
                    run();
                    totalSpins++;
                }
            }else if(gateChoice === "epsilon"){
                while(epsilon.built < 1){
                    spins = 1;
                    run();
                    totalSpins++;
                }
            }else if(gateChoice === "zeta"){
                while(zeta.built < 1){
                    spins = 1;
                    run();
                    totalSpins++;
                }
            }else if(gateChoice === "kappa"){
                while(kappa.built < 1){
                    spins = 1;
                    run();
                    totalSpins++;
                }
            }else if(gateChoice === "lambda"){
                while(lambda.built < 1){
                    spins = 1;
                    run();
                    totalSpins++;
                }
            }else if(gateChoice === "hades"){
                while(hades.built < 1){
                    spins = 1;
                    run();
                    totalSpins++;
                }
            }
            gateCost.push(totalSpins);
            totalSpins = 0;
            aveAmmo.push(ammo);
            ammo = 0;
            aveNano.push(nano);
            nano = 0;
            aveXeno.push(xeno);
            xeno = 0;
            aveRep.push(rep);
            rep = 0;
            aveLdisks.push(ldisks);
            ldisks = 0;
            gatesp = 0;
            mults = 0;
            if(gateChoice === "alpha"){
                alpha.built = 0;
            }else if(gateChoice === "beta"){
                beta.built = 0;
            }else if(gateChoice === "gamma"){
                gamma.built = 0;
            }else if(gateChoice === "delta"){
                delta.built = 0;
            }else if(gateChoice === "epsilon"){
                epsilon.built = 0;
            }else if(gateChoice === "zeta"){
                zeta.built = 0;
            }else if(gateChoice === "kappa"){
                kappa.built = 0;
            }else if(gateChoice === "lambda"){
                lambda.built = 0;
            }else if(gateChoice === "hades"){
                hades.built = 0;
            }
            kappa.built = 0;
            num--;
        }
        gateCost.sort();
        var totalCost = 0;
        for(var i = 0;i < gateCost.length;i++){
            totalCost += gateCost[i];
        }
        $("#mincost").text(gateCost[0]);
        $("#avecost").text(totalCost/gateCost.length);
        $("#maxcost").text(gateCost[gateCost.length - 1]);
        
        aveAmmo.sort();
        var totalAmmo = 0;
        for(var i = 0;i < aveAmmo.length;i++){
            totalAmmo += aveAmmo[i];
        }
        $("#minammo").text(aveAmmo[0]);
        $("#aveammo").text(totalAmmo/aveAmmo.length);
        $("#maxammo").text(aveAmmo[aveAmmo.length - 1]);
        aveNano.sort();
        var totalNano = 0;
        for(var i = 0;i < aveNano.length;i++){
            totalNano += aveNano[i];
        }
        $("#minnano").text(aveNano[0]);
        $("#avenano").text(totalNano/aveNano.length);
        $("#maxnano").text(aveNano[aveNano.length - 1]);
        aveXeno.sort();
        var totalXeno = 0;
        for(var i = 0;i < aveXeno.length;i++){
            totalXeno += aveXeno[i];
        }
        $("#minxeno").text(aveXeno[0]);
        $("#avexeno").text(totalXeno/aveXeno.length);
        $("#maxxeno").text(aveXeno[aveXeno.length - 1]);
        aveRep.sort();
        var totalRep = 0;
        for(var i = 0;i < aveRep.length;i++){
            totalRep += aveRep[i];
        }
        $("#minrep").text(aveRep[0]);
        $("#averep").text(totalRep/aveRep.length);
        $("#maxrep").text(aveRep[aveRep.length - 1]);
        aveLdisks.sort();
        var totalLdisks = 0;
        for(var i = 0;i < aveLdisks.length;i++){
            totalLdisks += aveLdisks[i];
        }
        $("#minldisks").text(aveLdisks[0]);
        $("#aveldisks").text(totalLdisks/aveLdisks.length);
        $("#maxldisks").text(aveLdisks[aveLdisks.length - 1]);
        $("#numGates").show();
    }else{
        //for when average of # per # of spins
        $("#title").text("Min/Ave/Max Items")
        var ave = average;
        while(ave > 0){
            gateChoice = gate;
            mSelect = mult;
            spins = dspins;
            run();
            
        }
        
    }
}

/*function storeresult(gate,spins,ammo,nano,xeno,rep,ldisks,gatesp,mults,gatesbuilt){
    if (window.XMLHttpRequest) {
        storeSpinResult = new XMLHttpRequest();
    }else{
        storeSpinResult = new activeXObject("Microsoft.XMLHTTP");
    }
    storeSpinResult.onreadystatechange = function(){
        if(storeSpinResult.readyState == 4 && storeSpinResult.status == 200){
            document.getElementById("storeresult").innerHTML = "Result Stored!";
        }
    }
    storeSpinResult.open("GET","storeresultindb.php?gate="+gate+"&spins="+spins+"&ammo="+ammo+"&nano="+nano+"&xeno="+xeno+"&rep="+rep+"&ldisks="+ldisks+"&gatesp="+gatesp+"&mults="+mults+"&gatesbuilt"+gatesbuilt,true);
    storeSpinResult..send();
}*/
