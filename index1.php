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
</body>
</html>
