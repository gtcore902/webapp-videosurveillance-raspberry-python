<!DOCTYPE html>
<html>
<head>
	<title>Serveur caméras domicile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main_cam.css">
	<link rel="icon" type="image/png" href="img/logo-min.png" />

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<meta name="robots" content="noindex, nofollow">

	<!-- jQuery -->
	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous">
	</script>

	<!-- jQuery Mobile -->
  <script defer src="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script>

</head>
<body>

	<a id="lienAdmin" href="admin_python.php"><em>Admin</em></a>

	<h1>VIDEOSURVEILLANCE</h1>

<div class="bloc_data">

	<!-- number of recordings -->
	<div class="nb_videos">
		<p>
			<span class="variable" id="variable_fichier">
					<b><img class="loader" src="img/ajax-loader.gif" alt="Loader chargement"></b>
			</span> rec <img src="img/movie.svg" alt="Nombre de fichiers vidéos">
		</p>
	</div>

	<div class="separateur"></div>

	<!-- size directory -->
	<div class="nb_videos">
			<p>
				<span class="variable" id="tailleGo">
						<b><img class="loader" src="img/ajax-loader.gif" alt="Loader chargement"></b>
				</span> go <img src="img/pair.svg" alt="Taille des fichiers sur le disque">
			</p>
		</div>

<div class="separateur"></div>

	<!-- last record -->
	<div class="dernier_videos">
			<p>
				<span class="variable" id="last_record">
						<b><img class="loader" src="img/ajax-loader.gif" alt="Loader chargement"></b>
				</span> <img src="img/time.svg" alt="Temps depuis le dernier enregistrement">
			</p>
	</div>
</div>

	<div class="visuel" style="text-align: center;">

		<!-- display streming camera 1 -->
		<div class="ss_cam" id="ss_cam1">
			<img id="cameraEntree" src=<?php include('adress_IP_cam1.php') ?>
					alt="Caméra garage"
					title="Caméra garage"/>
			<section id="entree"><img id="arrow1" src="img/arrow_dt.svg" alt="Flèche de positionnement"><div>CAMERA ENTREE</div></section>
		</div>

		<!-- display streming camera 2 -->
		<div class="ss_cam" id="ss_cam2">
			<img id="cameraGarage" src=<?php include('adress_IP_cam2.php') ?>
					alt="Caméra entrée"
					title="Caméra entrée"/>
			<section id="garage"><img id="arrow2" src="img/arrow_dt.svg" alt="Flèche de positionnement"><div>CAMERA GARAGE</div></section>
		</div>

	</div>

<div class="listing">
	<h2>Listing</h2>
	<img id="actualiserVideos" src="img/update-arrows.svg" alt="Logo actualiser la liste des vidéos" title="Actualiser la liste des vidéos">
</div>

	<div id="liensSupp">
			<div class="liens">
					<img class="loader" src="img/ajax-loader.gif" alt="Loader chargement">
			</div>
	</div>

	<img id="backToTop" src="img/upArrow.svg" alt="Flèche retour haut de page"/>

	<script>
	// change color dir size
			window.addEventListener('load', function checkDossier () {
					let tailleDossier = document.getElementById('tailleGo');
					tailleDossier = Number(tailleGo.textContent);
					if (tailleDossier <= 20) {
						tailleGo.style.color = "#0A2C37";
					}
					else if (tailleDossier > 1 && tailleDossier < 25) {
						tailleGo.style.color = "#F58333";
					}
					else  {
						tailleGo.style.color = "#E03B3D";
					}
					setInterval(checkDossier, 1000);
			})

	</script>

	<script>
	// toggle function display streams on click
			$(function () {
					$('#ss_cam1').on('click', function () {
							$('#cameraEntree').slideToggle(200);
							if ($('#arrow1').attr("src") == "img/arrow_dt.svg") {
											$('#arrow1').attr("src", "img/arrow.svg")
							} else {
											$('#arrow1').attr("src", "img/arrow_dt.svg")
							}
					});
					$('#ss_cam2').on('click', function () {
							$('#cameraGarage').slideToggle(200);
							if ($('#arrow2').attr("src") == "img/arrow_dt.svg") {
											$('#arrow2').attr("src", "img/arrow.svg")
							} else {
											$('#arrow2').attr("src", "img/arrow_dt.svg")
							}
					})
			})

			// Manage video tag on click
			$(function () {
				$(document).on('click', '.liensDesVideos', function (e) {
						e.preventDefault();
						$('.liensDesVideos').on('click', function () {
								$('video').remove();
								$('#ancre').remove();

								$('<a id="ancre"</a>').insertBefore(this); // create ancor
								$('#ancre').css({'display' : 'inline-block' , 'padding-top' : "15px"});
								$('#ancre').after('<video>');
								$('video').attr({class: "videoVolee",
																id: $(this).attr('href'),
																autoplay : true,
																controls : true,
																src : $(this).attr('href')
								});

								$('video').hide().slideDown(200, function () {
										$(this).on('click', function () {
												$(this).slideUp(200, function () {
														$(this).remove();
														$('#ancre').remove();
												});
										})
										$(this).on('ended', function () { // close video tag on end
											$(this).slideUp(200, function () {
													$(this).remove();
													$('#ancre').remove();
											})
											;
										})
								} );
								window.location.assign("#ancre"); // add for anchor

								// jQuery Mobile
								$('video').on('swiperight', function () {
									$(this).slideUp(200, function () {
											$(this).remove();
									})
								})
						})
				})
			})

			// Manage scroll up
			$(function () {
					 			$(window).scroll(function () {
											let top = $(window).scrollTop();
											if (top > 400) {
														$('#backToTop').show(300);
											} else {
														$('#backToTop').hide(300);
											}
								})
								// scroll up on click
								$('#backToTop').on('click', function () {
											window.scrollTo(0, 0);
								})
			})
	</script>

	<script defer src="js/ajaxFunction.js" charset="utf-8"></script>
	<script defer src="js/serveur_cam.js" charset="utf-8"></script>
</body>
</html>
