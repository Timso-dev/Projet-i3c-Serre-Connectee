var xhttp;  
if (window.XMLHttpRequest)       xhttp = new XMLHttpRequest();                      //  Objet standard: Firefox, Safari, ...
else  if (window.ActiveXObject)  xhttp = new ActiveXObject("Microsoft.XMLHTTP");    //  Internet Explorer


function nb_sec_vers_h_m_s(time) 
{
var reste=time;
var result='';

var nbJours=Math.floor(reste/(3600*24));
reste -= nbJours*24*3600;

var nbHours=Math.floor(reste/3600);
reste -= nbHours*3600;

var nbMinutes=Math.floor(reste/60);
reste -= nbMinutes*60;

var nbSeconds=reste;

if (nbJours>0)    result=result + nbJours + ' j ';
if (nbHours>0)    result=result + nbHours + ' h ';
if (nbMinutes>0)  result=result + nbMinutes + ' min ';
                  result=result + nbSeconds;
return result;
}

function testButton() 
{
xhttp.open("GET", "test", true); // Appelle la "page" /test sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function autoButton() 
{
xhttp.open("GET", "auto", true); // Appelle la "page" /auto sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function offButton() 
{
xhttp.open("GET", "off", true); // Appelle la "page" /off sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function testAvantOnButton() 
{
xhttp.open("GET", "testAvantOn", true); // Appelle la "page" /off sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function testAvantOffButton() 
{
xhttp.open("GET", "testAvantOff", true); // Appelle la "page" /off sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function testPotagerOnButton() 
{
xhttp.open("GET", "testPotagerOn", true); // Appelle la "page" /off sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function testPotagerOffButton() 
{
xhttp.open("GET", "testPotagerOff", true); // Appelle la "page" /off sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function testJardinOnButton() 
{
xhttp.open("GET", "testJardinOn", true); // Appelle la "page" /off sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function testJardinOffButton() 
{
xhttp.open("GET", "testJardinOff", true); // Appelle la "page" /off sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function testRemplCuveOnButton() 
{
xhttp.open("GET", "testRemplCuveOn", true); // Appelle la "page" /off sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}

function testRemplCuveOffButton() 
{
xhttp.open("GET", "testRemplCuveOff", true); // Appelle la "page" /off sur le server (voir main.html)
xhttp.send(); // Envoi des données au serveur
}
