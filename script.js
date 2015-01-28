//global variables
var multiplier = 1;
var mults = 0;
var gateChoice = "";
var gatesp = 0;
var aby = new Gate(0);
var delta = new Gate(128);
var epsilon = new Gate(99);
var zeta = new Gate(111);
var kappa = new Gate(120);
var lambda = new Gate(45);
//capitalize function for gatename display
function capitalize(s){
    return s[0].toUpperCase() + s.slice(1);
};
//multiplier function to work multipliers
var mult = function(){
    if(multiplier === 2){
        multiplier = 1;
        return 2;
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

    if(gate === "aby"){
        aby.buildABY();
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
    }else{
        alert("Error");
    }
};
//gate class constructor
function Gate(pieces){
    this.pieces = pieces; //number of pieces this gate requires to be built
    this.piece = undefined; //new piece created every time a piece is spun
    this.built = 0; //number of gates built
    this.currentPieces = 0; //number of unique pieces collected
    this.tracker = []; //tracker array that keeps track of unique pieces  
    //aby specific vars
    var alphaPieces = 34;
    var betaPieces = 48;
    var gammaPieces = 82;
    var alphaCurrent = 0;
    var betaCurrent = 0;
    var gammaCurrent = 0;
    var alphasBuilt = 0;
    var betasBuilt = 0;
    var gammasBuilt = 0;
    var alphaTracker = [];
    var betaTracker = [];
    var gammaTracker = [];
    var abyRand = 0;
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
            if(this.tracker[i] != undefined) {
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
        //var gate = capitalize(gateChoice);
        document.getElementById("gateinfo").innerHTML = this.built + " Built " + this.currentPieces + "/" + this.pieces;
    };
    this.buildABY = function(){
        alphaTracker.length = alphaPieces;
        betaTracker.length = betaPieces;
        gammaTracker.length = gammaPieces;
        alphaCurrent = 0;
        betaCurrent = 0;
        gammaCurrent = 0;
        abyRand = rand(3);
        if(abyRand === 0){
            //buildalpha
            this.piece = rand(alphaPieces);
            if(alphaTracker[this.piece] === undefined){
                alphaTracker[this.piece] = this.piece;
                gatesp++;
            }else{
                multiplier++;
                mults++;
            }
            //count how many unique pieces we have
            for(var i = 0;i <= alphaTracker.length;i++){
                if(alphaTracker[i] != undefined) {
                    alphaCurrent++;
                }
            }
            //checks if we finished building a gate
            if(alphaCurrent === alphaPieces){
                alphasBuilt++;
                alphaTracker = [];
                alphaTracker.length = alphaPieces;
            }
            //update display
            //var gate = capitalize(gateChoice);
            document.getElementById("alphainfo").innerHTML = "Alphas: " + alphasBuilt + " " + alphaCurrent + "/" + alphaPieces;
        }else if(abyRand === 1){
            //buildbeta
            this.piece = rand(betaPieces);
            if(betaTracker[this.piece] === undefined){
                betaTracker[this.piece] = this.piece;
                gatesp++;
            }else{
                multiplier++;
                mults++;
            }
            //count how many unique pieces we have
            for(var i = 0;i <= betaTracker.length;i++){
                if(betaTracker[i] != undefined) {
                    betaCurrent++;
                }
            }
            //checks if we finished building a gate
            if(betaCurrent === betaPieces){
                betasBuilt++;
                betaTracker = [];
                betaTracker.length = betaPieces;
            }
            //update display
            //var gate = capitalize(gateChoice);
            document.getElementById("betainfo").innerHTML = "Betas: " + betasBuilt + " " + betaCurrent + "/" + betaPieces;
        }else if(abyRand === 2){
            //buildgamma
            this.piece = rand(gammaPieces);
            if(gammaTracker[this.piece] === undefined){
                gammaTracker[this.piece] = this.piece;
                gatesp++;
            }else{
                multiplier++;
                mults++;
            }
            //count how many unique pieces we have
            for(var i = 0;i <= gammaTracker.length;i++){
                if(gammaTracker[i] != undefined) {
                    gammaCurrent++;
                }
            }
            //checks if we finished building a gate
            if(gammaCurrent === gammaPieces){
                gammasBuilt++;
                gammaTracker = [];
                gammaTracker.length = gammaPieces;
            }
            //update display
            //var gate = capitalize(gateChoice);
            document.getElementById("gammainfo").innerHTML = "Gammas: " + gammasBuilt + " " + gammaCurrent + "/" + gammaPieces;
        }else{
            alert("Error");
        }
    };
    this.resetABY = function(){
    alphasBuilt = 0;
    betasBuilt = 0;
    gammasBuilt = 0;
    alphaTracker = [];
    betaTracker = [];
    gammaTracker = [];
    }
};
//reset gate
function reset(obj){
    if(obj === "aby"){
        aby.resetABY();
    }else if(obj === "delta"){
        delta.built = 0;
        delta.tracker = [];
        delta.tracker.length = delta.pieces;
    }else if(obj === "epsilon"){
        epsilon.built = 0;
        epsilon.tracker = [];
        epsilon.tracker.length = epsilon.pieces;
    }else if(obj === "zeta"){
        zeta.built = 0;
        zeta.tracker = [];
        zeta.tracker.length = zeta.pieces;
    }else if(obj === "kappa"){
        kappa.built = 0;
        kappa.tracker = [];
        kappa.tracker.length = kappa.pieces;
    }else if(obj === "lambda"){
        lambda.built = 0;
        lambda.tracker = [];
        lambda.tracker.length = lambda.pieces;
    }else{
        alert("Error");
    }
};

//main functions--------------------------------------------
function gateSelect(g){
    //select gate and display
    gateChoice = g;
    if(g === "aby"){
        document.getElementById("gatename").innerHTML = "A/B/Ys Built";
        document.getElementById("gateinfo").innerHTML = "";
        document.getElementById("alphainfo").innerHTML = "Alpha:";
        document.getElementById("betainfo").innerHTML = "Beta:";
        document.getElementById("gammainfo").innerHTML = "Gamma:";
        
    }else{
        var gate = capitalize(g);
        document.getElementById("gatename").innerHTML = gate + "s Built";
        document.getElementById("gateinfo").innerHTML = "";
        document.getElementById("alphainfo").innerHTML = "";
        document.getElementById("betainfo").innerHTML = "";
        document.getElementById("gammainfo").innerHTML = "";

    }
};

function start(){
    //get spins and display
    var spins = document.getElementById("inputspins").value;
    document.getElementById("spins").innerHTML = spins;
    //declare variables
    var ammo = 0;
    var nano = 0;
    var xeno = 0;
    var rep = 0;
    var ldisks = 0;
    gatesp = 0;
    mults = 0;
    reset(gateChoice);
    //reset variables display
    document.getElementById("ammo").innerHTML = ammo;
    document.getElementById("nano").innerHTML = nano;
    document.getElementById("xeno").innerHTML = xeno;
    document.getElementById("rep").innerHTML = rep;
    document.getElementById("ldisks").innerHTML = ldisks;
    document.getElementById("gates").innerHTML = gatesp;
    document.getElementById("mults").innerHTML = mults;
    
    while(spins > 0){
        var chance = rand(100);
        if (chance === 0) {
            ldisks += (1 * mult());
            document.getElementById("ldisks").innerHTML = ldisks;
        } else if (chance >= 1 && chance <= 67) {
            ammo += (1 * mult());
            document.getElementById("ammo").innerHTML = ammo;
        } else if (chance >= 68 && chance <= 71) {
            nano += (1 * mult());
            document.getElementById("nano").innerHTML = nano;
        } else if (chance >= 72 && chance <= 74) {
            rep += (1 * mult());
            document.getElementById("rep").innerHTML = rep;
        } else if (chance >= 75 && chance <= 86) {
            xeno += (1 * mult());
            document.getElementById("xeno").innerHTML = xeno;
        } else if (chance >= 87 && chance <= 99) {
            for(j = 0;j <= mult();j++){
                gateBuilder(gateChoice);
            }
            document.getElementById("gates").innerHTML = gatesp;
            document.getElementById("mults").innerHTML = mults;
        }else {
            alert("Error");
        }
        spins--;
    }
}
