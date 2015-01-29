<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='style.css'/>
	<script src='script.js'></script>
</head>
<body>

<div id="container">
    <div id="ammod">
    <h1> Ammo </h1>
    <p id="ammo"></p>
  </div>
  <div id="nanod">
    <h1> NanoHull </h1>
    <p id="nano"></p>
  </div>
  <div id="xenod">
    <h1> Xenomit </h1>
    <p id="xeno"></p>
  </div>
  <div id="repd">
    <h1> Repair Credits </h1>
    <p id="rep"></p>
  </div>
  <div id="ldisksd">
    <h1> Log Disks </h1>
    <p id="ldisks"></p>
  </div>
  <div id="gatesd">
    <h1> Gate Pieces </h1>
    <p id="gates"></p>
  </div>
</div>
<div id="gateselect">
    <h1>Select a Gate</h1>
    <input type="submit" name="confirmspin#" onclick="gateSelect('aby')" value="A/B/Y"/>
    <input type="submit" name="confirmspin#" onclick="gateSelect('delta')" value="Delta"/>
    <input type="submit" name="confirmspin#" onclick="gateSelect('epsilon')" value="Epsilon"/>
    <br>
    <input type="submit" name="confirmspin#" onclick="gateSelect('zeta')" value="Zeta"/>
    <input type="submit" name="confirmspin#" onclick="gateSelect('kappa')" value="Kappa"/>
    <input type="submit" name="confirmspin#" onclick="gateSelect('lambda')" value="Lambda"/>
</div>
<div id="spinselect">
    <h1>Input Spins</h1>
    <input type="text" name="spin#" id="inputspins"/>
    <br>
    <input type="submit" name="confirmspin#" onclick="start()"/>
</div>
<div id="result">
    <div id="spinsd">
        <h2>Spins</h2>
        <h1 id="spins"></h1>
    </div>
    <div id="gate">
        <h1 id="gatename"></h1>
        <h1 id="gateinfo"></h1>
        <p id="alphainfo"></p>
        <p id="betainfo"></p>
        <p id="gammainfo"></p>
        
    </div>
    <div id="multi">
        <h2>Multipliers</h2>
        <h1 id="mults"></h1>
    </div>
</div>
<?php
	//global variables
	$multiplier = 1;
	$mults = 0;
	$gateChoice = "";
	$gatesp = 0;
	$aby = new Gate(0);
	$delta = new Gate(128);
	$epsilon = new Gate(99);
	$zeta = new Gate(111);
	$kappa = new Gate(120);
	$lambda = new Gate(45);
	//capitalize first letter for displayer
	//function capitalize(s){
	//
	//}
	//multiplier function to work multipliers
	function mult(){
	    if($multiplier == 2){
	        $multiplier = 1;
	        return 2;
	    }else{
	        return 1;
	   }
	}
	//random function to work randoms
	function randNum($num){
	    return rand(0,$num);
	}
	//gatebuilder function to call which gate to start building
	function gateBuilder($gate){
	    if($gate == "aby"){
	        $aby->buildABY();
	    }else if($gate == "delta"){
	        $delta.buildGate();
	    }else if($gate == "epsilon"){
	        $epsilon.buildGate();
	    }else if($gate == "zeta"){
	        $zeta.buildGate();
	    }else if($gate == "kappa"){
	        $kappa.buildGate();
	    }else if($gate == "lambda"){
	        $lambda.buildGate();
	    }
	}
	/gate class constructor
	class Gate(pieces){
	    public $pieces; //number of pieces this gate requires to be built
	    public $piece = undefined; //new piece created every time a piece is spun
	    public $built = 0; //number of gates built
	    public $currentPieces = 0; //number of unique pieces collected
	    public $tracker = array(); //tracker array that keeps track of unique pieces  
	    //aby specific vars
	    public $alphaPieces = 34;
	    public $betaPieces = 48;
	    public $gammaPieces = 82;
	    public $alphaCurrent = 0;
	    public $betaCurrent = 0;
	    public $gammaCurrent = 0;
	    public $alphasBuilt = 0;
	    public $betasBuilt = 0;
	    public $gammasBuilt = 0;
	    public $alphaTracker = array();
	    public $betaTracker = array();
	    public $gammaTracker = array();
	    public $abyRand = 0;
	    public function __construct($pieces) {
		$this->pieces = $pieces;
	    public function buildGate() {
	        $this->tracker = array_fill(0, $this->pieces - 1, NULL;
	        $this->currentPieces = 0;
	        $this->piece = randNum($this->pieces);
	        
	        //check if new piece or duplicate, if duplicate then add to multiplier
	        if($this->tracker[$this->piece] == NULL){
	            $this->tracker[$this->piece] = $this->piece;
	            $gatesp++;
	        }else{
	            $multiplier++;
	            $mults++;
	        }
	        
	        //count how many unique pieces we have
		$length = count($this->tracker);
	        for($i = 0;$i <= $length;i++){
	            if($this->tracker[$i] != NULL) {
	                $this->currentPieces++;
	            }
	        }
	        
	        //checks if we finished building a gate
	        if($this->currentPieces == $this->pieces){
	            $this->built++;
		    unset($this->tracker);
	            $this->tracker = array();
	            $this->tracker = array_fill(0, $this->pieces - 1, NULL);
	        }
	        
	        //update display
	        //document.getElementById("gateinfo").innerHTML = this.built + " Built " + this.currentPieces + "/" + this.pieces;
	    }
	    public function buildABY() {
	        $this->alphaTracker = array_fill(0, $this->alphaPieces, NULL);
	        $this->betaTracker = array_fill(0, $this->betaPieces, NULL);
	        $this->gammaTracker = array_fill(0,$this->gammaPieces, NULL);
	        $this->alphaCurrent = 0;
	        $this->betaCurrent = 0;
	        $this->gammaCurrent = 0;
	        $this->abyRand = randNum(3);
	        if($this->abyRand == 0){
	            //buildalpha
	            $this->piece = randNum($this->alphaPieces);
	            if($this->alphaTracker[$this->piece] == NULL){
	                $this->alphaTracker[$this->piece] = $this->piece;
	                $gatesp++;
	            }else{
	                $multiplier++;
	                $mults++;
	            }
	            //count how many unique pieces we have
			$lengtha = count($this->alphaTracker);
	            for($i = 0;$i <= $lengtha;$i++){
	                if($this->alphaTracker[$i] != NULL) {
	                    $this->alphaCurrent++;
	                }
	            }
	            //checks if we finished building a gate
	            if($this->alphaCurrent == $this->alphaPieces){
	                $this->alphasBuilt++;
			unset($this->alphaTracker);
	                $this->alphaTracker = array();
	                $this->alphaTracker = array_fill(0, $this->alphaPieces - 1, NULL);
	            }
	            //update display
	            //document.getElementById("alphainfo").innerHTML = "Alphas: " + alphasBuilt + " " + alphaCurrent + "/" + alphaPieces;
	        }else if(abyRand == 1){
	            //buildbeta
	            $this->piece = randNum($this->betaPieces);
	            if($this->betaTracker[$this->piece] == NULL){
	                $this->betaTracker[$this->piece] = $this->piece;
	                $gatesp++;
	            }else{
	                $multiplier++;
	                $mults++;
	            }
	            //count how many unique pieces we have
		    $lengthb = count($this->betaTracker);
	            for($i = 0;$i <= $lengthb;$i++){
	                if($this->betaTracker[$i] != NULL) {
	                    $this->betaCurrent++;
	                }
	            }
	            //checks if we finished building a gate
	            if($this->betaCurrent == $this->betaPieces){
	                $this->betasBuilt++;
			unset($this->betaTracker);
	                $this->betaTracker = array();
	                $this->betaTracker = array_fill(0, $this->betaPieces - 1, NUL);
	            }
	            //update display
	            //document.getElementById("betainfo").innerHTML = "Betas: " + betasBuilt + " " + betaCurrent + "/" + betaPieces;
	        }else if(abyRand == 2){
	            //buildgamma
	            $this->piece = randNum($this->gammaPieces);
	            if($this->gammaTracker[$this->piece] == NULL){
	                $this->gammaTracker[$this->piece] = $this->piece;
	                $gatesp++;
	            }else{
	                $multiplier++;
	                $mults++;
	            }
	            //count how many unique pieces we have
		    $lengthg = count($this->gammaTracker);
	            for($i = 0;$i <= $lengthg;$i++){
	                if($this->gammaTracker[$i] != NULL) {
	                    $this->gammaCurrent++;
	                }
	            }
	            //checks if we finished building a gate
	            if($this->gammaCurrent == $this->gammaPieces){
	                $this->gammasBuilt++;
			unset($this->gammaTracker);
	                $this->gammaTracker = array();
	                gammaTracker = array_fill(0, $this->gammaPieces - 1, NULL);
	            }
	            //update display
	            //document.getElementById("gammainfo").innerHTML = "Gammas: " + gammasBuilt + " " + gammaCurrent + "/" + gammaPieces;
	        }
	    }
	    public function resetABY() {
	    	$this->alphasBuilt = 0;
	    	$this->betasBuilt = 0;
	    	$this->gammasBuilt = 0;
	    	$this->alphaTracker = array_fill(0, $this->alphaPieces - 1, NULL);
	    	$this->betaTracker = array_fill(0, $this->betaPieces - 1, NULL);
	    	$this->gammaTracker = array_fill(0, $this->gammaPieces - 1, NULL);
	    }
	}
	//reset gate function
	function reset($obj){
	    if($obj == "aby"){
	        $aby->resetABY();
	    }else if($obj == "delta"){
	        $delta.built = 0;
	        $delta.tracker = array_fill(0, $delta->pieces - 1, NULL);
	    }else if($obj == "epsilon"){
	        $epsilon.built = 0;
	        $epsilon.tracker = array_fill(0, $epsilon->pieces - 1, NULL);
	    }else if($obj == "zeta"){
	        $zeta.built = 0;
	        $zeta.tracker = array_fill(0, $zeta->pieces - 1, NULL);
	    }else if($obj == "kappa"){
	        $kappa.built = 0;
	        $kappa.tracker = array_fill(0, $kappa->pieces - 1, NULL);
	    }else if($obj == "lambda"){
	        $lambda.built = 0;
	        $lambda.tracker = array_fill(0, $lambda->pieces - 1, NULL);
	    }
	}
	
	
	//main functions
	function gateSelect($g){
	    //select gate and display
	    $gateChoice = $g;
	    if($g == "aby"){
	        //document.getElementById("gatename").innerHTML = "A/B/Ys Built";
	        //document.getElementById("gateinfo").innerHTML = "";
	        //document.getElementById("alphainfo").innerHTML = "Alpha:";
	        //document.getElementById("betainfo").innerHTML = "Beta:";
	        //document.getElementById("gammainfo").innerHTML = "Gamma:";
	        
	    }else{
	        //var gate = capitalize(g);
	        //document.getElementById("gatename").innerHTML = gate + "s Built";
	        //document.getElementById("gateinfo").innerHTML = "";
	        //document.getElementById("alphainfo").innerHTML = "";
	        //document.getElementById("betainfo").innerHTML = "";
	        //document.getElementById("gammainfo").innerHTML = "";
	
	    }
	}
	
	function start(){
	    //get spins and display
	    $spins;// = document.getElementById("inputspins").value;
	    //document.getElementById("spins").innerHTML = spins;
	    //declare variables
	    $ammo = 0;
	    $nano = 0;
	    $xeno = 0;
	    $rep = 0;
	    $ldisks = 0;
	    $gatesp = 0;
	    $mults = 0;
	    reset($gateChoice);
	    //reset variables display
	    //document.getElementById("ammo").innerHTML = ammo;
	    //document.getElementById("nano").innerHTML = nano;
	    //document.getElementById("xeno").innerHTML = xeno;
	    //document.getElementById("rep").innerHTML = rep;
	    //document.getElementById("ldisks").innerHTML = ldisks;
	    //document.getElementById("gates").innerHTML = gatesp;
	    //document.getElementById("mults").innerHTML = mults;
	    
	    while($spins > 0){
	        $chance = randNum(100);
	        if ($chance == 0) {
	            $ldisks += (1 * mult());
	            //document.getElementById("ldisks").innerHTML = ldisks;
	        } else if ($chance >= 1 && $chance <= 67) {
	            $ammo += (1 * mult());
	            //document.getElementById("ammo").innerHTML = ammo;
	        } else if ($chance >= 68 && $chance <= 71) {
	            $nano += (1 * mult());
	            //document.getElementById("nano").innerHTML = nano;
	        } else if ($chance >= 72 && $chance <= 74) {
	            $rep += (1 * mult());
	            //document.getElementById("rep").innerHTML = rep;
	        } else if ($chance >= 75 && $chance <= 86) {
	            $xeno += (1 * mult());
	            //document.getElementById("xeno").innerHTML = xeno;
	        } else if ($chance >= 87 && $chance <= 99) {
			$temp = mult();
	            for($j = 0;$j <= $temp;$j++){
	                gateBuilder($gateChoice);
	            }
	            //document.getElementById("gates").innerHTML = gatesp;
	            //document.getElementById("mults").innerHTML = mults;
	        }
	        $spins--;
	    }
	}
?>
</body>
</html>
