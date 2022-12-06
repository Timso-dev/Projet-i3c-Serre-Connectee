<?php
define('DB_SERVER', '10.199.132.11:3306');
define('DB_USERNAME', 'greenhouse');
define('DB_PASSWORD', 'Qeg56$tyu');
define('DB_NAME', 'greenhousedb');

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM SensorData";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  $i=0;
  while($row = $result->fetch_assoc()) {
   $value1[$i]=$row['value1']*1;
   $value2[$i]=$row['value2']*1;
   $value3[$i]=$row['value3']*1;
   $value4[$i]=$row['value4']*1;
   $value5[$i]=$row['value5']*1;
   $list[$i]=date($row['reading_time']);
   date_default_timezone_set('UTC');
   $test[$i] = strtotime($list[$i])*1000;

   $json_temperaturedate[$i]= array($test[$i],$value1[$i]);
   $json_pressiondate[$i]= array($test[$i],$value2[$i]);
   $json_humiditeairdate[$i]= array($test[$i],$value3[$i]);
   $json_humiditesoldate[$i]= array($test[$i],$value4[$i]);
   $json_luxdate[$i]= array($test[$i],$value5[$i]);
   $i++;
  }
$json_temperature = json_encode($json_temperaturedate);
$json_pression = json_encode($json_pressiondate);
$json_humidite_air = json_encode($json_humiditeairdate);
$json_humidite_sol = json_encode($json_humiditesoldate);
$json_lux = json_encode($json_luxdate);
} 
else {
  echo "0 results";
}
$conn->close();
?>
<!DOCTYPE HTML>
<html>
	<head>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Serre Connectée | Les mesures</title>
		<link rel="icon" type="image/png" href="/img/logo.png" />
		<script src="https://kit.fontawesome.com/6a4fe63112.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/article-view.css">
		<link rel="stylesheet" href="css/footer.css">

<script src="stock/code/highstock.js"></script>
<script src="stock/code/modules/data.js"></script>
<script src="stock/code/modules/exporting.js"></script>
<script src="stock/code/modules/export-data.js"></script>
<script src="stock/code/modules/accessibility.js"></script>

		<script type="text/javascript">
Highcharts.getJSON('https://demo-live-data.highcharts.com/aapl-c.json', function (data) {
    // Create the chart
Highcharts.stockChart('highstock', {
        rangeSelector: {
            selected: 1
        },
        chart: {
            renderTo: 'highstock',
            zoomType: 'x',
            alignTicks: false,
				
		},
        title: {
            text: 'Température, Pression relative, Humidité de la serre',
            x: -0 //center
        },

        xAxis: {
			type: 'datetime',			 

		},
        yAxis:[ { // 1er yAxis (numero 0)
			height: '20%',
            lineWidth: 3,
				labels: {
					formatter: function() {
						return this.value +'°C';
					},
					style: {
						color: '#e67e22'
					}
				},
				title: {
					text: 'Température',
					style: {
						color: '#e67e22'
					}
				},
			}, { // 2ème yaxis (numero 1)
				top: '20%',
                height: '20%',
                offset: 0,
                lineWidth: 3,
				min:980,
				title: {
					text: 'Pression',
					style: {
						color: '#6EB81B'
					}
				},
				labels: {
					formatter: function() {
						return this.value +' hPa';
					},
					style: {
						color: '#6EB81B'
					}
				},
				opposite: true
			}, { // 3ème yaxis (numero 2)
				top: '40%',
                height: '20%',
                offset: 0,
                lineWidth: 3,
				tickInterval:10,
				min:0,
				max: 100,
				title: {
					text: 'Humidité air',
					style: {
						color: '#228AE6'
					}
				},
								labels: {
					formatter: function() {
						return this.value +' %';
					},
					style: {
						color: '#228AE6'
					}
				},
				opposite: true
			}, { // 4ème yaxis (numero 3)
				top: '60%',
                height: '20%',
                offset: 0,
                lineWidth: 3,
				tickInterval:10,
				min:0,
				max: 100,
				title: {
					text: 'Humidité sol',
					style: {
						color: '#BA55D3'
					}
				},
								labels: {
					formatter: function() {
						return this.value +' %';
					},
					style: {
						color: '#BA55D3'
					}
				},
				opposite: true
			}, { // 5ème yaxis (numero 4)
				top: '80%',
                height: '20%',
                offset: 0,
                lineWidth: 3,
				title: {
					text: 'Luminosité',
					style: {
						color: '#FFD700'
					}
				},
				labels: {
					formatter: function() {
						return this.value +' lux';
					},
					style: {
						color: '#FFD700'
					}
				},
				opposite: true
			}
        ],
        tooltip: {
            crosshairs:true,
            shared: true,
            borderColor: '#4b85b7',
            valueDecimals: 1,
            
        },
        plotOptions: {
            series: {
                marker: {
                enabled: false
                },animation: {
                duration: 3000
                }
            }
		},
        series: [{
            name: 'Température',
            zIndex: 1,
            yAxis: 0,
            color: '#e67e22',
            lineWidth: 3,
            type: 'spline',
            data: <?= $json_temperature?>,
        },
        {
            name: 'Pression',
            color: '#6EB81B',
            yAxis: 1,
            type: 'spline',
            data: <?= $json_pression?>,
        },
        {
            name: 'Humidité air',
            color: '#228AE6',
            yAxis: 2,
            type: 'spline',
            data: <?= $json_humidite_air?>,
        },
		{
            name: 'Humidité sol',
            color: '#BA55D3',
            yAxis: 3,
            type: 'spline',
            data: <?= $json_humidite_sol?>,
        },
        {
            name: 'Luminosité',
            color: '#FFD700',
            yAxis: 4,
            type: 'spline',
            data: <?= $json_lux?>,
        }
    ]
    });
});
		</script>
	<body>
		<div class="header header__article">
			<div class="header__texture"></div>
			<div class="header__mask">
				<svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
					<path d="M0 100 L 0 0 C 25 100 75 100 100 0 L 100 100" fill="#fff"></path>
				</svg>
			</div>
			<div class="container">
				<div class="header__navbar">
					<div class="header__navbar--logo">
					<img src="img/logo2.png" alt="Cinque Terre" width="150" height="100">
					</div>
					<div class="header__navbar--menu">
					<a href="index.html" class="header__navbar--menu-link"><i class="fas fa-home"></i> Accueil</a>
					<a href="contact.php" class="header__navbar--menu-link"><i class="fas fa-phone"></i> Contact</a>
					<a href="login.php" class="header__navbar--menu-link"><i class="fas fa-user"></i> Login</a>
					</div>
					<div class="header__navbar-toggle">
						<span class="header__navbar-toggle-icons"></span> 
					</div>
				</div>
				<div class="header__slogan">
					<h1 class="h__slogan--title">Les mesures</h1>
					<a href="index.html"class="h__slogan--btn"><i class="fas fa-chevron-left"></i> Retour</a>
				</div>
			</div>
		</div>
        <div class="article__view-container">
            <div class="article__view">

                <div id="highstock" style="width: 100%; height: 800px; margin: 0 auto"></div>

            </div>
        </div>
		<script
  		src="https://code.jquery.com/jquery-3.3.1.min.js"
  		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  		crossorigin="anonymous"></script>
		<script src="js/app.js"></script>
		<footer>
			<div class="footer-content">
				<h3 class="footer_name">GREENHOUSE</h3>
				<p>Projet I3</p>
				<div class="socials">
					<li><a href="https://www.youtube.com/user/ESIEEAmiens1"><i class="fa fa-youtube"></i></a></li>
					<li><a href="https://twitter.com/ESIEEAmiens"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/esieeunilasalleamiens/"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://www.myunilasalleamiens.eu/"><i class="fa fa-graduation-cap"></i></a></li>
				</div>
			</div>
			<div class="footer-bottom">
				<p>copyright &copy;GREENHOUSE 2022 | designed by <span>Corentin PORET</span></p>
			</div>
		</footer>
	</body>
</html>