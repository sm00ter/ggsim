<html>
<head>
<title>galaxy gate sim</title>
<style type="text/css">
body {
  background-color: #7e8588;
  width: 100%;
  height:
}
h1 {
  font-size: 20px;
  color: #242424;
}
p {
  color: #242424;
}
div {
  width: 300px;
  height: 80px;
  border: 2px solid;
  border-radius: 5px;
  border-color: #3D3D3D;
  color: #3D3D3D;
  margin: 10px;
  color: #000;
  text-align: center;
  font-weight: 800;
  box-shadow: 3px 3px 5px #363636;
}
#spinsd {
  position: relative;
  left: 660px;
  top: -563px;
  height: 80px;
}
#repd {
  position: relative;
  left: 320px;
  top: -281px;
}
#ldisksd {
  position: relative;
  left: 320px;
  top: -281px;
}
#gatesd {
  position: relative;
  left: 320px;
  top: -281px;
}
#kappad {
  position: relative;
  left: 660px;
  top: -563px;
  height:137px;
}
#multi {
  position: relative;
  left: 660px;
  top: -563px;
  height: 80px;;
}
</style>
</head>
<body>
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
  <div id="spinsd">
    <h1> Spins </h1>
    <p id="spins"></p>
  </div>
  <div id="kappad">
    <h1 id="gatename"></h1>
    <p id="gate"></p>
    <p id="aby"></p>
    <p id="alphainfo"></p>
    <p id="betainfo"></p>
    <p id="gammainfo"></p>
  </div>
  <div id="multi">
    <h1> Multipliers</h1>
    <p id="xtra"> </p>
  </div>
  <script type="text/javascript">
  //testing with all gates at once
var ammo, nano, xeno, rep, ldisks, gatesp, spins, chance, multy, mults, gate;
gate = prompt("which gate do you want to spin?").toLowerCase();
if (gate === "alpha" || gate === "beta" || gate === "gamma") {
  document.getElementById("gatename").innerHTML = "A/B/Y's Built";
} else {
document.getElementById("gatename").innerHTML = gate +  "s Built";
}
//alert("This will simulate spinning on the chosen galaxy gate " + gate + ".");
spins = prompt("How many times do you want to spin?");
document.getElementById("spins").innerHTML = spins;
ammo = 0;
nano = 0;
xeno = 0;
rep = 0;
ldisks = 0;
gatesp = 0;
multy = 1;
mults = 0;
//kappa function

var kappanum = 0;
var kappapieces = [];
var kappa = function () {

    kappapieces.length = 120;
    var k = 0;
    var kappaPiece = Math.floor(Math.random() * 120);

    if (kappapieces[kappaPiece] === undefined) {
      kappapieces[kappaPiece] = kappaPiece;
      gatesp++;
    } else {
      multy++;
      mults++;
    }
    for (var i = 0; i <= kappapieces.length; i++) {
      if (kappapieces[i] != undefined) {
        k++;
      }
    }

    if (k === 120) {
      kappanum = kappanum + 1;
      kappapieces = [];
      kappapieces.length = 120;
    }
    document.getElementById("gate").innerHTML = kappanum + " " + " " + k + "/120";
};

//zeta function
var zetanum = 0;
var zetapieces = [];
var zeta = function () {

    zetapieces.length = 111;
    var z = 0;
    var zetaPiece = Math.floor(Math.random() * 111);

    if (zetapieces[zetaPiece] === undefined) {
      zetapieces[zetaPiece] = zetaPiece;
      gatesp++;
    } else {
      multy++;
      mults++;
    }
    for (var i = 0; i <= zetapieces.length;i++) {
      if (zetapieces[i] != undefined) {
        z++;
      }
    }

    if (z === 111) {
      zetanum = zetanum + 1;
      zetapieces = [];
      zetapieces.length = 111;
    }
    document.getElementById("gate").innerHTML = zetanum + " " + " " + z + "/111";
  };
  
  //epsilon function
var epsilonnum = 0;
var epsilonpieces = [];
var epsilon = function () {

    epsilonpieces.length = 99;
    var e = 0;
    var epsilonPiece = Math.floor(Math.random() * 99);

    if (epsilonpieces[epsilonPiece] === undefined) {
      epsilonpieces[epsilonPiece] = epsilonPiece;
      gatesp++;
    } else {
      multy++;
      mults++;
    }
    for (var i = 0; i <= epsilonpieces.length;i++) {
      if (epsilonpieces[i] != undefined) {
        e++;
      }
    }

    if (e === 99) {
      epsilonnum = epsilonnum + 1;
      epsilonpieces = [];
      epsilonpieces.length = 99;
    }
    document.getElementById("gate").innerHTML = epsilonnum + " " + " " + e + "/99";
  };
  
  //lambda function
var lambdanum = 0;
var lambdapieces = [];
var lambda = function () {

    lambdapieces.length = 45;
    var l = 0;
    var lambdaPiece = Math.floor(Math.random() * 45);

    if (lambdapieces[lambdaPiece] === undefined) {
      lambdapieces[lambdaPiece] = lambdaPiece;
      gatesp++;
    } else {
      multy++;
      mults++;
    }
    for (var i = 0; i <= lambdapieces.length;i++) {
      if (lambdapieces[i] != undefined) {
        l++;
      }
    }

    if (l === 45) {
      lambdanum = lambdanum + 1;
      lambdapieces = [];
      lambdapieces.length = 45;
    }
    document.getElementById("gate").innerHTML = lambdanum + " " + " " + l + "/45";
};
//delta function
var deltanum = 0;
var deltapieces = [];
var delta = function () {

    deltapieces.length = 128;
    var d = 0;
    var deltaPiece = Math.floor(Math.random() * 128);

    if (deltapieces[deltaPiece] === undefined) {
      deltapieces[deltaPiece] = deltaPiece;
      gatesp++;
    } else {
      multy++;
      mults++;
    }
    for (var i = 0; i <= deltapieces.length;i++) {
      if (deltapieces[i] != undefined) {
        d++;
      }
    }

    if (d === 128) {
      deltanum = deltanum + 1;
      deltapieces = [];
      deltapieces.length = 128;
    }
    document.getElementById("gate").innerHTML = deltanum + " " + " " + d + "/128";
};

 //hades function
var hadesnum = 0;
var hadespieces = [];
var hades = function () {

    hadespieces.length = 45;
    var h = 0;
    var hadesPiece = Math.floor(Math.random() * 45);

    if (hadespieces[hadesPiece] === undefined) {
      hadespieces[hadesPiece] = hadesPiece;
      gatesp++;
    } else {
      multy++;
      mults++;
    }
    for (var i = 0; i <= hadespieces.length;i++) {
      if (hadespieces[i] != undefined) {
        h++;
      }
    }

    if (h === 45) {
      hadesnum = hadesnum + 1;
      hadespieces = [];
      hadespieces.length = 45;
    }
    document.getElementById("gate").innerHTML = hadesnum + " " + " " + h + "/45";
}; 

//aby function
var alphanum = 0;
var betanum = 0;
var gammanum = 0;
var alphapieces = [];
var betapieces = [];
var gammapieces = [];
var aby = function () {
var abyChoice = Math.floor(Math.random() * 3);
if (abyChoice === 0) {
  var a = 0;
  var alphaPiece = Math.floor(Math.random() * 34)
  if (alphapieces[alphaPiece] === undefined) {
    alphapieces[alphaPiece] = alphaPiece;
    gatesp++;
  } else {
    multy++;
    mults++;
  }
  for (var i = 0; i <= alphapieces.length;i++) {
    if (alphapieces[i] != undefined) {
      a++;
    }
}

if (a === 34) {
  alphanum = alphanum + 1;
  alphapieces = [];
  alphapieces.length = 34;
}
document.getElementById("alphainfo").innerHTML = "Alphas- " + alphanum + " " + " " + a + "/34";
} else if (abyChoice === 1) {
  var b = 0;
  var betaPiece = Math.floor(Math.random() * 48)
  if (betapieces[betaPiece] === undefined) {
    betapieces[betaPiece] = betaPiece;
    gatesp++;
  } else {
    multy++;
    mults++;
  }
  for (var i = 0; i <= betapieces.length;i++) {
    if (betapieces[i] != undefined) {
      b++;
    }
  }
  if (b === 48) {
    betanum = betanum + 1;
    betapieces = [];
    betapieces.length = 48;
  }
 document.getElementById("betainfo").innerHTML = "Betas- " + betanum + " " + " " + b + "/48"; 
} else if (abyChoice === 2) {
    var y = 0;
    var gammaPiece = Math.floor(Math.random() * 82)
    if (gammapieces[gammaPiece] === undefined) {
      gammapieces[gammaPiece] = gammaPiece;
      gatesp++;
    } else {
      multy++;
      mults++;
    }
    for (var i = 0; i <= gammapieces.length;i++) {
      if (gammapieces[i] != undefined) {
        y++;
      }
    }
    if (y === 82) {
      gammanum = gammanum + 1;
      gammapieces = [];
      gammapieces.length = 82;
    }
  document.getElementById("gammainfo").innerHTML = "Gammas- " + gammanum + " " + " " + y + "/82";  
  } else {
    alert("error");
  }
};

//choosing which gate function to run 
var gateChoice = function() {
  if (gate === "kappa") {
    kappa();
  } else if (gate === "zeta") {
    zeta();
  } else if (gate === "epsilon") {
    epsilon();
  } else if (gate === "lambda") {
    lambda();
  } else if (gate === "delta") {
    delta();
  } else if (gate === "hades") {
    hades();
  } else if (gate === "alpha" || gate === "beta" || gate === "gamma") { 
    aby();
  }else {
    alert("You did not enter a valid gate.");
  }
}
//multiplier function
var mult = function () {
  "use strict";
  if (multy === 6) {
    multy = 1;
    return 6;
  } else {
    return 1;
  }
};
//spin loop
do {
  var chance = Math.floor(Math.random() * 100);
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
    for (var j = 0; j <= mult(); j++) {
      gateChoice();
    }
    document.getElementById("gates").innerHTML = gatesp;
 
  } else {
    document.getElementById("rep").innerHTML = rep;
    alert("this didn't work bud");
  }
  spins--;
} while (spins > 0);
document.getElementById("xtra").innerHTML = mults;
  </script>
</body>
</html>
