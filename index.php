<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='style.css'/>
	<script src='script.js'></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<!--<div id="container">
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
    <h1 id="gsname">Select a Gate</h1>
    <input type="submit" onclick="gateSelect('aby')" value="A/B/Y"/>
    <input type="submit" onclick="gateSelect('delta')" value="Delta"/>
    <input type="submit" onclick="gateSelect('epsilon')" value="Epsilon"/>
    <br>
    <input type="submit" onclick="gateSelect('zeta')" value="Zeta"/>
    <input type="submit" onclick="gateSelect('kappa')" value="Kappa"/>
    <input type="submit" onclick="gateSelect('lambda')" value="Lambda"/>
    <br>
    <input type="submit" onclick="gateSelect('hades')" value="Hades"/>
    <input type="submit" onclick="buildKronos()" value="Kronos"/>
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
        <h2 id="multipliers">Multipliers</h2> 
        <h1 id="multiselect1">Multiplier <br>activates at</h1><input type="submit" id="multselect0" onclick="multSelect()" value="2"/>
        <h1 id="mults"></h1>
    </div>
</div>-->
<div id="dbcontainer">
    <h2>Your Galaxy Gate Statistics</h2>
    <div id="dbresult">
        <div id="numGates">
            <div>
                <h1>Minimum Gate Cost</h1>
                <p id="mincost"></p>
                <h1>Average Gate Cost</h1>
                <p id="avecost"></p>
                <h1>Maximum Gate Cost</h1>
                <p id="maxcost"></p>
            </div>
            <div>
                <h1>Minimum Ammo</h1>
                <p id="minammo"></p>
                <h1>Average Ammo</h1>
                <p id="aveammo"></p>
                <h1>Maximum Ammo</h1>
                <p id="maxammo"></p>
            </div>
            <div>
                <h1>Minimum Nanohull</h1>
                <p id="minnano"></p>
                <h1>Average Nanohull</h1>
                <p id="avenano"></p>
                <h1>Maximum Nanohull</h1>
                <p id="maxnano"></p>
            </div>
            <div>
                <h1>Minimum Xenomit</h1>
                <p id="minxeno"></p>
                <h1>Average Xenomit</h1>
                <p id="avexeno"></p>
                <h1>Maximum Xenomit</h1>
                <p id="maxxeno"></p>
            </div>
            <div>
                <h1>Minimum Rep Credits</h1>
                <p id="minrep"></p>
                <h1>Average Rep Credits</h1>
                <p id="averep"></p>
                <h1>Maximum Rep Credits</h1>
                <p id="maxrep"></p>
            </div>
            <div>
                <h1>Minimum Log Disks</h1>
                <p id="minldisks"></p>
                <h1>Average Log Disks</h1>
                <p id="aveldisks"></p>
                <h1>Maximum Log Disks</h1>
                <p id="maxldisks"></p>
            </div>
        </div>
        <div id="numSpins">
            <h2 id="title"><h2>
            <div>
                <h1 id="mincosth"></h1>
                <p id="mincost"></p>
                <h1 id="avecosth"></h1>
                <p id="avecost"></p>
                <h1 id="maxcosth"></h1>
                <p id="maxcost"></p>
            </div>
            <div>
                <h1>Minimum Ammo</h1>
                <p id="minammo"></p>
                <h1>Average Ammo</h1>
                <p id="aveammo"></p>
                <h1>Maximum Ammo</h1>
                <p id="maxammo"></p>
            </div>
            <div>
                <h1>Minimum Nanohull</h1>
                <p id="minnano"></p>
                <h1>Average Nanohull</h1>
                <p id="avenano"></p>
                <h1>Maximum Nanohull</h1>
                <p id="maxnano"></p>
            </div>
            <div>
                <h1>Minimum Xenomit</h1>
                <p id="minxeno"></p>
                <h1>Average Xenomit</h1>
                <p id="avexeno"></p>
                <h1>Maximum Xenomit</h1>
                <p id="maxxeno"></p>
            </div>
            <div>
                <h1>Minimum Rep Credits</h1>
                <p id="minrep"></p>
                <h1>Average Rep Credits</h1>
                <p id="averep"></p>
                <h1>Maximum Rep Credits</h1>
                <p id="maxrep"></p>
            </div>
            <div>
                <h1>Minimum Log Disks</h1>
                <p id="minldisks"></p>
                <h1>Average Log Disks</h1>
                <p id="aveldisks"></p>
                <h1>Maximum Log Disks</h1>
                <p id="maxldisks"></p>
            </div>
        </div>
    </div>
    <div id="dbgateselect">
        <input type="submit" onclick="dbGateChoice('aby')" value="A/B/Y"/>
        <input type="submit" onclick="dbGateChoice('delta')" value="Delta"/>
        <input type="submit" onclick="dbGateChoice('epsilon')" value="Epsilon"/>
        <input type="submit" onclick="dbGateChoice('zeta')" value="Zeta"/><br>
        <input type="submit" onclick="dbGateChoice('kappa')" value="Kappa"/>
        <input type="submit" onclick="dbGateChoice('lambda')" value="Lambda"/>
        <input type="submit" onclick="dbGateChoice('hades')" value="Hades"/>
        <input type="submit" onclick="dbGateChoice('kronos')" value="Kronos"/>
    </div>
    <div id="dbinputs">
        <form id="abyradio">
        <input type="radio" name="aby" onclick="dbGateChoice('aby')" value="alpha">Alpha
        <input type="radio" name="aby" onclick="dbGateChoice('aby')"value="beta">Beta
        <input type="radio" name="aby" onclick="dbGateChoice('aby')"value="gamma">Gamma</form>
        <p class="inputp"><input type="radio" name="input" id="dbspinsr" value="spins" onclick="dbinput()" checked> 
        <input type="text" id="dbspins" value="Enter Amount of Spins" onclick="this.select()" enabled/></p>
        
        <p class="inputp">Average of <input type="text" id="average" value="50" onclick="this.select()"/></p>
        
        <p class="inputp">
        <input type="radio" name="input" id="gatenum" value="gatenum" onclick="dbinput()"> 
        <input type="text" id="dbgatestobuild" value="Enter Amount of Gates to Build" onclick="this.select()" disabled/></p>
        
        <p id="dbmultselect">Multiplier activates at<input type="submit" id="multselect1" onclick="multSelect()" value="2"/></p>
        
        <input type="submit" id="dbsubmit" value="Start" onclick="averageStart()"/>
    </div>
    
<!--</div>
<div id="dbtable">

</div>-->
</body>
</html>
