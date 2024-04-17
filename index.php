<?php
include("secret.php");
$spojeni = mysqli_connect($server, $jmeno, $heslo, $databaze);

$poleZnamok= array(
	"A" => 1,
	"B" => 1.5,
	"C" => 2,
	"D" => 2.5,
	"E" => 3,
	"Fx" => 4
  );

$reverznePoleZnamok= array(
	"1" => "A",
	"1.5" => "B",
	"2" => "C",
	"2.5" => "D",
	"3" => "E",
	"4" => "Fx"
  );

?>



<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Vizitka</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">


		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>
							<h1 id="title">Andrej Pecník</h1>
							<p>Študent VUT FEKT IBE</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link"><span class="icon solid fa-home">Intro</span></a></li>
								<li><a href="#portfolio" id="portfolio-link"><span class="icon solid fa-user">Portfólio + O mne</span></a></li>
								<li><a href="#about" id="about-link"><span class="icon solid fa-database">Databáza známok</span></a></li>
								<li><a href="#pridajznamku" id="pridajznamku-link"><span class="icon solid fa-plus">Pridaj Známku</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="https://www.instagram.com/andrej_pecnik/" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://www.facebook.com/profile.php?id=100005250886726" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Vizitka / Portfólio <strong>Andrej Pecník</strong><br />
								</h2>
								<p>stránka bola vytvorená ako projekt na predmet PIS</p>
							</header>

							<footer>
								<a href="#" class="button" onclick="zobrazIP()">IP Adresa</a>
							</footer>

						</div>
					</section>

				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">

							<header>
								<h2>Portfólio + O mne</h2>
							</header>

							<p>Ako každý mladý človek, mám niekoľko koníčkov. <br>Na nasledujúcich fotkách uvidíte, čomu sa venujem.</p>

							<div class="row">
								<div class="col-4 col-12-mobile">
									<article class="item">
										<a class="image fit"><img src="images/skialp.jpg" alt="" /></a>
										<header>
											<h3>Skialpinizmust</h3>
										</header>
									</article>
									<article class="item">
										<a class="image fit"><img src="images/prezentacia.png" alt="" /></a>
										<header>
											<h3>Aktivita v projektoch</h3>
										</header>
									</article>
								</div>
								<div class="col-4 col-12-mobile">
									<article class="item">
										<a class="image fit"><img src="images/pocitace.jpeg" alt="" /></a>
										<header>
											<h3>Informačné technológie</h3>
										</header>
									</article>
									<article class="item">
										<a class="image fit"><img src="images/turistika.jpg" alt="" /></a>
										<header>
											<h3>Turistiky</h3>
										</header>
									</article>
								</div>
								<div class="col-4 col-12-mobile">
									<article class="item">
										<a class="image fit"><img src="images/cestovanie.jpg" alt="" /></a>
										<header>
											<h3>Cestovanie</h3>
										</header>
									</article>
									<article class="item">
										<a class="image fit"><img src="images/financie.jpeg" alt="" /></a>
										<header>
											<h3>Financie</h3>
										</header>
									</article>
								</div>
							</div>

						</div>
					</section>

				<!-- Databáza známok -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>Databáza známok</h2>
							</header>

							<a class="image featured"><img src="images/znamky.jpg" alt="" /></a>

							<a name="tabulkavysledkov"></a>

							<h3>Tabuľka posledných 10 známok.</h3>


							<table>
								<thead>
									<tr>
										<th>Datum</th>
										<th>Predmet</th>
										<th>Znamka</th>
										<th>Vyucujuci</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$dotaz = "SELECT * FROM vysledky ORDER BY id_znamky desc LIMIT 10;"; 
										$data = mysqli_query($spojeni, $dotaz); 
										while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) 
										{ 
											echo 
											"<tr> 
												<td>".$row['datum']."</td>
												<td>".$row['predmet']."</td>
												<td>".$row["vysledok"]."</td>
												<td>".$row["vyucujuci"]."</td>
											</tr>";
										} 									
									?>
								</tbody>
							</table>
							
							<h3>Priemer podľa predmetu.</h3>					
							
							<table>
								<thead>
									<tr>
										<th>Názov predmetu</th>
										<th>Priemer</th>
										<th>Najlepšia</th>
										<th>Najhoršia</th>
									</tr>
								</thead>
								<tbody>
									<?php
										for ($x = 1; $x <= 5; $x++) {
																					  
											$nazovPredmetu = "Predmet ".$x;
											$dotaz = "SELECT * FROM vysledky WHERE predmet='".$nazovPredmetu."';"; 
											$data = mysqli_query($spojeni, $dotaz); 
											$pocetZnamok = 0;
											$sucetZnamok = 0;
											$minimum = 4;
											$maximum = 1;
											while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) 
											{ 
												$pocetZnamok += 1;
												$sucetZnamok += $poleZnamok[$row["vysledok"]];
												if($poleZnamok[$row["vysledok"]] <= $minimum){
													$minimum = $poleZnamok[$row["vysledok"]];
												}
												if($poleZnamok[$row["vysledok"]] >= $maximum){
													$maximum = $poleZnamok[$row["vysledok"]];
												}
											}
											$priemer = $sucetZnamok/$pocetZnamok;
											echo 
												"<tr> 
													<td>".$nazovPredmetu."</td>
													<td>".round($priemer,2)."</td>
													<td>".$reverznePoleZnamok["$minimum"]."</td>
													<td>".$reverznePoleZnamok["$maximum"]."</td>
												</tr>";
										}		
									?>
								</tbody>
							</table>


							<?php
									
								$dotaz = "SELECT * FROM vysledky;"; 
								$data = mysqli_query($spojeni, $dotaz); 
								$pocetZnamok = 0;
								$sucetZnamok = 0;
								while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) 
								{ 
									$pocetZnamok += 1;
									$sucetZnamok += $poleZnamok[$row["vysledok"]];
								}
								$celkovyPriemer = $sucetZnamok/$pocetZnamok;
											
							?>
							<h3>Celkový študíjný priemer.</h3>
							<p>Celkový študíjný priemer je <b><?php echo round($celkovyPriemer, 2); ?></b></p>
							
							<?php
								$mesacnyPriemer = array();
								for ($x = 1; $x <= 12; $x++) {
									$dotaz = "SELECT * FROM vysledky WHERE YEAR(datum) = 2023 AND MONTH(datum) = $x;"; 
									$data = mysqli_query($spojeni, $dotaz); 
									$pocetZnamok = 0;
									$sucetZnamok = 0;
									while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) 
									{ 
										$pocetZnamok += 1;
										$sucetZnamok += $poleZnamok[$row["vysledok"]];
									}
									if($pocetZnamok ==0){
										$celkovyPriemer = 0;
									}else{
										$celkovyPriemer = $sucetZnamok/$pocetZnamok;
									}
									$mesacnyPriemer[$x] = $celkovyPriemer;
								}		
							?>

							<h3>Vývoj priemeru v čase</h3>
							<div>
  								<canvas id="myChart"></canvas>
							</div>




						</div>
					</section>

					

				<!-- Pridaj znamku -->
					<section id="pridajznamku" class="four">
						<div class="container">

							<header>
								<h2>Pridaj znamku</h2>
							</header>

							<p>Pridanie novej známky do databáze!</p>

							<form method="post" action="ulozznamku.php">
								<div class="row formznamka">
									<div class="col-6 col-12-mobile">Dátum:<br><input type="date" name="datum" placeholder="Dátum" class="datuminput"></div>
								</div>
								<div class="row formznamka">
									<div class="col-6 col-12-mobile">
										<label class="formlabel" for="predmet">Predmet:</label>
										<select name="predmet" id="predmet">
											<option value="Predmet 1">Predmet 1</option>
											<option value="Predmet 2">Predmet 2</option>
											<option value="Predmet 3">Predmet 3</option>
											<option value="Predmet 4">Predmet 4</option>
											<option value="Predmet 5">Predmet 5</option>
										</select>
									</div>
								</div>
								<div class="row formznamka">
									<div class="col-6 col-12-mobile">
										<label class="formlabel" for="znamka">Znamka:</label>
										<select name="znamka" id="znamka">
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
											<option value="E">E</option>
											<option value="Fx">Fx</option>
										</select>
									</div>
								</div>
								<div class="row formznamka">
									<div class="col-6 col-12-mobile">Vyučujúci:<input type="text" name="vyucujuci"/></div>
								</div>

								
								<div class="row formznamka">	
									<div class="col-6 col-12-mobile">
										<input type="submit" value="Ulož známku" />
									</div>
								</div>
							</form>

						</div>
					</section>

					
			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Andrej Pecník. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP.</a><br>Personalized by: Andrej Pecník</li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<script>
				const ctx = document.getElementById('myChart');

				new Chart(ctx, {
					type: 'line',
					data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					datasets: [{
						label: 'Priemer',
						data: [<?php echo implode(',',  $mesacnyPriemer ) ?>],
						borderWidth: 1
					}]
					},
					options: {
					scales: {
						y: {
						beginAtZero: true
						}
					}
					}
				});
			</script>
			
			<!-- Popoout -->
			
			<script>
				function zobrazIP() {
					fetch('https://api.ipify.org?format=json')
					.then(response => response.json())
					.then(data => {
						const ip = data.ip;
						alert('Vaša IP adresa je: ' + ip);
					})
					.catch(error => {
						console.error('Chyba pri získavaní IP adresy:', error);
						alert('Nepodarilo sa získať IP adresu klienta.');
					});
				}

			</script>					
	</body>
</html>

<?php
mysqli_close($spojeni); 
?>