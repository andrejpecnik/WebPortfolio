<?php
include("secret.php");
$spojeni = mysqli_connect($server, $jmeno, $heslo, $databaze);

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

			window.onload = zobrazIP;
		</script>

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
							<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
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
								<a href="#portfolio" class="button scrolly">Ďalej</a>
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
										$dotaz = "SELECT * FROM vysledky"; 
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

	</body>
</html>

<?php
mysqli_close($spojeni); 
?>