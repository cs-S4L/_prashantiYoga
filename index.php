<?php  
	require "init.php";

	$GLOBALS['Pagename'] = 'index';

	$currentPage = new Page($GLOBALS['DB'],$GLOBALS['Content'], $GLOBALS['Pagename']);

	// $content = new Content($GLOBALS['DB']);

	// $content->addContentToDB($GLOBALS['Pagename'], 'aboutPrashantiYoga', 'textWithHeading', array('heading'=>'', 'text'=>'Test text'));
	
	// die();
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">

	<title><?=$currentPage->getTitle();?></title>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137016236-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-137016236-1');
	</script>

	<?php include(DIR__PARTIALS . 'head/metaViewport.php') ?>
	
	<?php include(DIR__PARTIALS . 'head/metaFavicon.php') ?>

	<?php include(DIR__PARTIALS . 'head/metaSeo.php') ?>
	
	<!-- Open Sans Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- Main -->
	<link rel="stylesheet" href="<?=BASE_URL?>_css/index.css">
</head>
<body>

<div class="heroimage">
	<div class="socialMedia">
		<a href="https://www.instagram.com/prashanti_yoga_/" target="_blank">
			<i class="fab fa-instagram"></i>
		</a>
		<a href="https://www.facebook.com/PrashantiYogaMitPaulina/" target="_blank">
			<i class="fab fa-facebook-square"></i>
		</a>
	</div>
	
	<h1>
		Prashanti Yoga
	</h1>
</div>

<div class="navi">
	<div class="inner">
		<img src="_img/logo_transparent.png" alt="Logo" class="logo">

		<button class="hamburger hamburger--collapse" type="button">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>

		<ul>
			<li data-target="uberMich">Über mich</li>
			<li data-target="wasIstPY">Prashanti Yoga</li>
			<li data-target="kurse">Kurse</li>
			<li data-target="kontakt">Kontakt</li>
			<li data-target="impressionen">Impressionen</li>
			<li><?= ($GLOBALS['LoggedIn']) 
			? sprintf("<a href=\"%s/login/checkLogin.php?logout=1\">Logout</a>", BASE_URL)
			: sprintf("<a href=\"%slogin\">Login</a>", BASE_URL)?>
		</ul> 
	</div>
</div>
<span class="highlight"></span>
<section id="uberMich" class="text uberMich first">
	<div class="section__inner">
		<!-- <h2>Uber mich</h2> -->

		<?= $currentPage->getRenderedField('aboutMe')?>
		<!-- <h2>Herzlich Willkommen auf meiner Seite</h2>

		<p>Ich heiße <span class="highlight">Paulina Thomas</span>, bin <?=calculateAge("06/11/1996");?> Jahre jung und freue mich sehr darüber, dass du den Weg hierher gefunden hast!

			Großer <span class="highlight">Dank</span> an meine Mama, die mich 2013 im Alter von nur 16 Jahren zum ersten mal mit <span class="highlight">Yoga</span> in Berührung brachte.

			Schon im Jahr 2014/15 durfte ich dann die großartige Erfahrung machen, die 1- jährige Yogalehrerausbildung basierend auf der Tradition des Hathayoga in Aschaffenburg bei Andrea Brehm zu absolvieren. 
			Diese Entscheidung prägt meinen Yoga- und damit auch meinen Lebensweg von dort an fundamental. Ich durfte erfahren, was <span class="highlight">innerer Frieden</span> tatsächlich bedeutet und wahrnehmen, wie wunderbar es sich anfühlt, <span class="highlight">Gefühle</span> und <span class="highlight">Bedürfnisse</span> ganz <span class="highlight">bewusst</span> zu erleben.
			Seitdem hielt ich Yogastunden in einem ambulanten Rehabilitationszentrum.

			Meine generelle <span class="highlight">Liebe</span> zu Tieren habe ich schon in meiner frühen Kindheit entdeckt. Vor allem mit Pferden beschäftige ich mich in meiner Freizeit zeitlich, seelisch und emotional sehr intensiv. Daher habe ich mir auch das zum <span class="highlight">Herzensthema</span> gemacht und gebe Wochenendworkshops zum Thema „Yoga und Pferd“.

			Der menschliche <span class="highlight">Körper</span> in seiner Funktion und Komplexität fasziniert mich schon lange. Ich entschied mich daher im Jahr 2015 für die Ausbildung zur staatlich anerkannten <span class="highlight">Physiotherapeutin</span>, welche ich 2018 erfolgreich abschloss. 

			Dank der harmonierenden <span class="highlight">Kombination</span> aus medizinischem <span class="highlight">Fachwissen</span> und <span class="highlight">Yogaphilosophie</span> ist es mir möglich, sowohl auf körperliche, als auch auf seelische Bedürfnisse einzugehen.
		</p> -->
		
	</div>
</section>

<figure id="wasIstPY" class="sectionHeading wasIstPY">
	<div class="overlay">
		<img src="_img/img_Section_WasIstPY.jpg" alt="Was ist PY">
	</div>

	<figcaption>Was ist Prashanti Yoga</figcaption>
</figure>

<section class="text wasIstPY">
	<div class="section__inner">
		<?= $currentPage->getRenderedField('aboutPrashantiYoga')?>
		
		<!-- <h2></h2>

		<p>Sanskrit: Para = höchst, shanti = Frieden. 

			Der Begriff <span class="highlight">Prashanti</span> steht für den ungetrübten und höchsten <span class="highlight">inneren Frieden</span>, der durch nichts aus dem <span class="highlight">Gleichgewicht</span> gebracht werden kann. Das ist auch genau das, was ich selbst erfahren durfte und in meinen <span class="highlight">Yogastunden</span> vermitteln möchte.

			Durch das Auflösen aller <span class="highlight">Dualitäten</span>, wie hell-dunkel, männlich-weiblich, warm-kalt, positiv-negativ... arbeiten wir gemeinsam und mit Hilfe von <span class="highlight">Entspannung, Asanas</span> (Körperübungen), <span class="highlight">Pranayama</span> (Atemübungen), <span class="highlight">Meditation</span> und <span class="highlight">Mantramusik</span> am <span class="highlight">zur-Ruhe-kommen</span> deines Geistes.

			Je tiefer das <span class="highlight">Bewusstsein</span> wird, desto stärker ist spürbar, wie der <span class="highlight">Körper</span> als Tempel unserer <span class="highlight">Seele</span> mit dieser zu einer <span class="highlight">Einheit</span> verschmilzt. 

			Meine Aufgabe ist es dabei, dich auf deinem ganz <span class="highlight">persönlichen Yogaweg</span> zu <span class="highlight">begleiten</span> und zu <span class="highlight">unterstützen</span>, egal wo du dich gerade befindest.  

			Sofern du dich angesprochen fühlst und genau das für dich und deine Yogapraxis suchst, freue ich mich sehr, wenn du dich bei mir meldest!

			<span class="highlight">Namasté</span> and spread <span class="highlight">positive vibes!</span>

			Paulina
		</p> -->
	</div>
</section>

<figure id="kurse" class="sectionHeading kurse">
	<div class="overlay">
		<img src="_img/img_Section_Kurse.jpg" alt="kurse">
	</div>

	<figcaption>Kurse</figcaption>
</figure>

<section class="info">
	<div class="section__inner row">
		<div class="col-1 col-2-md kurszeiten">
			<div class="inner">
				<h3>Kurszeiten</h3>
				<div class="text-wrapper">
					<p>Donnerstags*:</p>
					<p>18:30 - 20:00 Uhr
					Vormittagskurse bei entsprechender Nachfrage möglich</p>
				</div>
				<p>*Kurse geeignet für Anfänger und Fortgeschrittene</p>
				<p>*Maximale Teilnehmerzahl 8 Personen</p>
			</div>
		</div>

		<div class="col-1 col-2-md preise">
			<div class="inner">
				<h3>Preise</h3>

				<div class="text-wrapper">
					<p>Monatlich 
					<span>(Laufzeit 3 Monate, 4 Einheiten monatlich):</span></p>
					<p>72€ / Monat</p>
				</div>
				<div class="divider"></div>
				<div class="text-wrapper">
					<p>Schnupperkurs
					<span>(Einmalig)</span></p>
					<p>12€</p>
				</div>
				<div class="divider"></div>
				<div class="text-wrapper">
					<p>Einzel-/ Privatstunden</p>
					<p>Nach Absprache</p>
				</div>
			</div>
		</div>

		<div class="col-1 kursort">
			<div class="inner">
				<h3>Kursort</h3>

				<div class="row col-1">
					<div class="col-1">
						<p>Weitblick Aschaffenburg
							Kettelerstraße 4
							63867 Johannesberg
							<a href="https://weitblick-ab.de/seminarraum/" target="_blank">Homepage</a></p>
					</div>
					<div class="col-1">
						<div class="iframeWrapper">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5126.255286247278!2d9.133419!3d50.02770400000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf93fc19ce75e0ab4!2sSeminar-Raum+Weitblick!5e0!3m2!1sde!2sde!4v1557334706825!5m2!1sde!2sde"frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="kontakt" class="kontakt col-1">
			<div class="inner row ">
				<div class="col-1">
					<h3>Kontakt</h3>

					<p class="col-1">Paulina Thomas</p>
				</div>

				<div class="col-1 col-2-md kontaktArt">
					<a href="mailto:prashantiyoga@gmx.de"><i class=" fas fa-envelope"></i>

						prashantiyoga@gmx.de
					</a>
				</div>


				<div class="col-1 col-2-md kontaktArt">
					<a href="tel:+491708216900" class="col-1"><i class="fas fa-phone"></i>

						+49 170 8216900
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<figure id="impressionen" class="sectionHeading impressionen">
	<div class="overlay">
		<img src="_img/img_Section_Impressionen.jpg" alt="Impressionen">
	</div>

	<figcaption>Impressionen</figcaption>
</figure>

<section class="impressionen">
	<div class="section__inner">
		<div class="row">
			<div class="thumb1">
				<!-- <i class="far fa-plus-square"></i> -->
			</div>

			<div class="col-4">
				<div class="thumb2"></div>
				<div class="thumb3"></div>
			</div>
			<div class="col-4">
				<div class="thumb4"></div>
				<div class="thumb5"></div>
			</div>

			<p class="openGallery">mehr...</p>
		</div>
	</div>

	<div class="gallery">
		<i class="fas fa-times close"></i>
		<div class="wrapper-large">
			<i class="prev fas fa-arrow-circle-left"></i>
			<ul class="large">
				<!-- Thumbs -->
				<li>
					<img src="_img/gallery/P1050951.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img src="_img/gallery/P1050811.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img src="_img/gallery/P1050829.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img src="_img/gallery/P1050932.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img src="_img/gallery/P1050855.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>

				<!-- Bilder -->
				<li>
					<img src="_img/gallery/P1050804.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050820.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050825.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050833.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050859.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050875.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050878.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050884.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050886.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050888.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050899.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050901.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050905.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050914.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050956.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
				<li>
					<img data-lazy="_img/gallery/P1050977.jpg" alt="Galeriebild 1" class="galleryImg">
				</li>
			</ul>
			<i class="next fas fa-arrow-circle-right"></i>
		</div>

		<div class="wrapper-thumbs">
			<i class="prev fas fa-arrow-circle-left"></i>
			<ul class="thumbs">

			</ul>
			<i class="next fas fa-arrow-circle-right"></i>
		</div>
	</div>
</section>



<footer>
	<div class="footer__inner row">
		<span id="impressum" class="col-2">Impressum</span>
		<span id="datenschutz" class="col-2">Datenschutz</span>
	</div>

	<section id="section_impressum" class="impressum">
		<div class="section__inner">
			<div class="row">
				<h1>Impressum</h1>

				<h2>Angaben gem&auml;&szlig; &sect; 5 TMG</h2>
				<p>Paulina Thomas
					Prashanti Yoga
					Enzlinger Berg 25
				63864 Glattbach</p>

				<h2>Kontakt</h2>
				<p>Telefon: +49 170 8216900
				E-Mail: <a href="mailto:prashantiyoga@gmx.de">prashantiyoga@gmx.de</a></p>

				<h2>Gestaltung und technische Umsetzung von:</h2>
				<p>Christopher Schmitz
					<a href="mailto:ChristopherSchmitz96@web.de">ChristopherSchmitz96@web.de</a></p>

				<h2>Fonts</h2>
				<p>One Love Font:
					https://www.dafont.com/onelove.font
					Icon Font:
				https://fontawesome.com/</p>

				<h2>Shiva Icon:</h2>
				<a href="http://www.onlinewebfonts.com">oNline Web Fonts</a>

				<p>


				Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>

				<h3>Haftung f&uuml;r Inhalte</h3> <p>Als Diensteanbieter sind wir gem&auml;&szlig; &sect; 7 Abs.1 TMG f&uuml;r eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach &sect;&sect; 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, &uuml;bermittelte oder gespeicherte fremde Informationen zu &uuml;berwachen oder nach Umst&auml;nden zu forschen, die auf eine rechtswidrige T&auml;tigkeit hinweisen.</p> <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unber&uuml;hrt. Eine diesbez&uuml;gliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung m&ouml;glich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p> <h3>Haftung f&uuml;r Links</h3> <p>Unser Angebot enth&auml;lt Links zu externen Websites Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb k&ouml;nnen wir f&uuml;r diese fremden Inhalte auch keine Gew&auml;hr &uuml;bernehmen. F&uuml;r die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf m&ouml;gliche Rechtsverst&ouml;&szlig;e &uuml;berpr&uuml;ft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.</p> <p>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p> <h3>Urheberrecht</h3> <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielf&auml;ltigung, Bearbeitung, Verbreitung und jede Art der Verwertung au&szlig;erhalb der Grenzen des Urheberrechtes bed&uuml;rfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur f&uuml;r den privaten, nicht kommerziellen Gebrauch gestattet.</p> <p>Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.</p>

				<p>Quelle: <a href="https://www.e-recht24.de">https://www.e-recht24.de</a></p>
			</div>
		</div>
	</section>

	<section id="section_datenschutz" class="datenschutz">
		<div class="section__inner">
			<div class="row">
				<h1>Datenschutzerkl&auml;rung</h1>
				<h2>1. Datenschutz auf einen Blick</h2>
				<h3>Allgemeine Hinweise</h3> <p>Die folgenden Hinweise geben einen einfachen &Uuml;berblick dar&uuml;ber, was mit Ihren personenbezogenen Daten passiert, wenn Sie unsere Website besuchen. Personenbezogene Daten sind alle Daten, mit denen Sie pers&ouml;nlich identifiziert werden k&ouml;nnen. Ausf&uuml;hrliche Informationen zum Thema Datenschutz entnehmen Sie unserer unter diesem Text aufgef&uuml;hrten Datenschutzerkl&auml;rung.</p>
				<h3>Datenerfassung auf unserer Website</h3> <p><strong>Wer ist verantwortlich f&uuml;r die Datenerfassung auf dieser Website?</strong></p> <p>Die Datenverarbeitung auf dieser Website erfolgt durch den Websitebetreiber. Dessen Kontaktdaten k&ouml;nnen Sie dem Impressum dieser Website entnehmen.</p> <p><strong>Wie erfassen wir Ihre Daten?</strong></p> <p>Ihre Daten werden zum einen dadurch erhoben, dass Sie uns diese mitteilen. Hierbei kann es sich z.&nbsp;B. um Daten handeln, die Sie in ein Kontaktformular eingeben.</p> <p>Andere Daten werden automatisch beim Besuch der Website durch unsere IT-Systeme erfasst. Das sind vor allem technische Daten (z.&nbsp;B. Internetbrowser, Betriebssystem oder Uhrzeit des Seitenaufrufs). Die Erfassung dieser Daten erfolgt automatisch, sobald Sie unsere Website betreten.</p> <p><strong>Wof&uuml;r nutzen wir Ihre Daten?</strong></p> <p>Ein Teil der Daten wird erhoben, um eine fehlerfreie Bereitstellung der Website zu gew&auml;hrleisten. Andere Daten k&ouml;nnen zur Analyse Ihres Nutzerverhaltens verwendet werden.</p> <p><strong>Welche Rechte haben Sie bez&uuml;glich Ihrer Daten?</strong></p> <p>Sie haben jederzeit das Recht unentgeltlich Auskunft &uuml;ber Herkunft, Empf&auml;nger und Zweck Ihrer gespeicherten personenbezogenen Daten zu erhalten. Sie haben au&szlig;erdem ein Recht, die Berichtigung, Sperrung oder L&ouml;schung dieser Daten zu verlangen. Hierzu sowie zu weiteren Fragen zum Thema Datenschutz k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden. Des Weiteren steht Ihnen ein Beschwerderecht bei der zust&auml;ndigen Aufsichtsbeh&ouml;rde zu.</p> <p>Au&szlig;erdem haben Sie das Recht, unter bestimmten Umst&auml;nden die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen. Details hierzu entnehmen Sie der Datenschutzerkl&auml;rung unter &bdquo;Recht auf Einschr&auml;nkung der Verarbeitung&ldquo;.</p>
				<h2>2. Allgemeine Hinweise und Pflichtinformationen</h2>
				<h3>Datenschutz</h3> <p>Die Betreiber dieser Seiten nehmen den Schutz Ihrer pers&ouml;nlichen Daten sehr ernst. Wir behandeln Ihre personenbezogenen Daten vertraulich und entsprechend der gesetzlichen Datenschutzvorschriften sowie dieser Datenschutzerkl&auml;rung.</p> <p>Wenn Sie diese Website benutzen, werden verschiedene personenbezogene Daten erhoben. Personenbezogene Daten sind Daten, mit denen Sie pers&ouml;nlich identifiziert werden k&ouml;nnen. Die vorliegende Datenschutzerkl&auml;rung erl&auml;utert, welche Daten wir erheben und wof&uuml;r wir sie nutzen. Sie erl&auml;utert auch, wie und zu welchem Zweck das geschieht.</p> <p>Wir weisen darauf hin, dass die Daten&uuml;bertragung im Internet (z.&nbsp;B. bei der Kommunikation per E-Mail) Sicherheitsl&uuml;cken aufweisen kann. Ein l&uuml;ckenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht m&ouml;glich.</p>
				<h3>Hinweis zur verantwortlichen Stelle</h3> <p>Die verantwortliche Stelle f&uuml;r die Datenverarbeitung auf dieser Website ist:</p> <p>Paulina Thomas
					Prashanti Yoga
					Enzlinger Berg 25
				63864 Glattbach</p>

				<p>Telefon: +49 170 8216900
				E-Mail: prashantiyoga@gmx.de</p>
				<p>Verantwortliche Stelle ist die nat&uuml;rliche oder juristische Person, die allein oder gemeinsam mit anderen &uuml;ber die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten (z.&nbsp;B. Namen, E-Mail-Adressen o. &Auml;.) entscheidet.</p>
				<h3>Widerruf Ihrer Einwilligung zur Datenverarbeitung</h3> <p>Viele Datenverarbeitungsvorg&auml;nge sind nur mit Ihrer ausdr&uuml;cklichen Einwilligung m&ouml;glich. Sie k&ouml;nnen eine bereits erteilte Einwilligung jederzeit widerrufen. Dazu reicht eine formlose Mitteilung per E-Mail an uns. Die Rechtm&auml;&szlig;igkeit der bis zum Widerruf erfolgten Datenverarbeitung bleibt vom Widerruf unber&uuml;hrt.</p>
				<h3>Widerspruchsrecht gegen die Datenerhebung in besonderen F&auml;llen sowie gegen Direktwerbung (Art. 21 DSGVO)</h3> <p><strong>Wenn die Datenverarbeitung auf Grundlage von Art. 6 Abs. 1 lit. e oder f DSGVO erfolgt, haben Sie jederzeit das Recht, aus Gr&uuml;nden, die sich aus Ihrer besonderen Situation ergeben, gegen die Verarbeitung Ihrer personenbezogenen Daten Widerspruch einzulegen; dies gilt auch f&uuml;r ein auf diese Bestimmungen gest&uuml;tztes Profiling. Die jeweilige Rechtsgrundlage, auf denen eine Verarbeitung beruht, entnehmen Sie dieser Datenschutzerkl&auml;rung. Wenn Sie Widerspruch einlegen, werden wir Ihre betroffenen personenbezogenen Daten nicht mehr verarbeiten, es sei denn, wir k&ouml;nnen zwingende schutzw&uuml;rdige Gr&uuml;nde f&uuml;r die Verarbeitung nachweisen, die Ihre Interessen, Rechte und Freiheiten &uuml;berwiegen oder die Verarbeitung dient der Geltendmachung, Aus&uuml;bung oder Verteidigung von Rechtsanspr&uuml;chen (Widerspruch nach Art. 21 Abs. 1 DSGVO).</strong></p> <p><strong>Werden Ihre personenbezogenen Daten verarbeitet, um Direktwerbung zu betreiben, so haben Sie das Recht, jederzeit Widerspruch gegen die Verarbeitung Sie betreffender personenbezogener Daten zum Zwecke derartiger Werbung einzulegen; dies gilt auch f&uuml;r das Profiling, soweit es mit solcher Direktwerbung in Verbindung steht. Wenn Sie widersprechen, werden Ihre personenbezogenen Daten anschlie&szlig;end nicht mehr zum Zwecke der Direktwerbung verwendet (Widerspruch nach Art. 21 Abs. 2 DSGVO).</strong></p>
				<h3>Beschwerderecht bei der zust&auml;ndigen Aufsichtsbeh&ouml;rde</h3> <p>Im Falle von Verst&ouml;&szlig;en gegen die DSGVO steht den Betroffenen ein Beschwerderecht bei einer Aufsichtsbeh&ouml;rde, insbesondere in dem Mitgliedstaat ihres gew&ouml;hnlichen Aufenthalts, ihres Arbeitsplatzes oder des Orts des mutma&szlig;lichen Versto&szlig;es zu. Das Beschwerderecht besteht unbeschadet anderweitiger verwaltungsrechtlicher oder gerichtlicher Rechtsbehelfe.</p>
				<h3>Recht auf Daten&uuml;bertragbarkeit</h3> <p>Sie haben das Recht, Daten, die wir auf Grundlage Ihrer Einwilligung oder in Erf&uuml;llung eines Vertrags automatisiert verarbeiten, an sich oder an einen Dritten in einem g&auml;ngigen, maschinenlesbaren Format aush&auml;ndigen zu lassen. Sofern Sie die direkte &Uuml;bertragung der Daten an einen anderen Verantwortlichen verlangen, erfolgt dies nur, soweit es technisch machbar ist.</p>
				<h3>SSL- bzw. TLS-Verschl&uuml;sselung</h3> <p>Diese Seite nutzt aus Sicherheitsgr&uuml;nden und zum Schutz der &Uuml;bertragung vertraulicher Inhalte, wie zum Beispiel Bestellungen oder Anfragen, die Sie an uns als Seitenbetreiber senden, eine SSL-bzw. TLS-Verschl&uuml;sselung. Eine verschl&uuml;sselte Verbindung erkennen Sie daran, dass die Adresszeile des Browsers von &bdquo;http://&ldquo; auf &bdquo;https://&ldquo; wechselt und an dem Schloss-Symbol in Ihrer Browserzeile.</p> <p>Wenn die SSL- bzw. TLS-Verschl&uuml;sselung aktiviert ist, k&ouml;nnen die Daten, die Sie an uns &uuml;bermitteln, nicht von Dritten mitgelesen werden.</p>
				<h3>Auskunft, Sperrung, L&ouml;schung und Berichtigung</h3> <p>Sie haben im Rahmen der geltenden gesetzlichen Bestimmungen jederzeit das Recht auf unentgeltliche Auskunft &uuml;ber Ihre gespeicherten personenbezogenen Daten, deren Herkunft und Empf&auml;nger und den Zweck der Datenverarbeitung und ggf. ein Recht auf Berichtigung, Sperrung oder L&ouml;schung dieser Daten. Hierzu sowie zu weiteren Fragen zum Thema personenbezogene Daten k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden.</p>
				<h3>Recht auf Einschr&auml;nkung der Verarbeitung</h3> <p>Sie haben das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen. Hierzu k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden. Das Recht auf Einschr&auml;nkung der Verarbeitung besteht in folgenden F&auml;llen:</p> <ul> <li>Wenn Sie die Richtigkeit Ihrer bei uns gespeicherten personenbezogenen Daten bestreiten, ben&ouml;tigen wir in der Regel Zeit, um dies zu &uuml;berpr&uuml;fen. F&uuml;r die Dauer der Pr&uuml;fung haben Sie das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen.</li> <li>Wenn die Verarbeitung Ihrer personenbezogenen Daten unrechtm&auml;&szlig;ig geschah/geschieht, k&ouml;nnen Sie statt der L&ouml;schung die Einschr&auml;nkung der Datenverarbeitung verlangen.</li> <li>Wenn wir Ihre personenbezogenen Daten nicht mehr ben&ouml;tigen, Sie sie jedoch zur Aus&uuml;bung, Verteidigung oder Geltendmachung von Rechtsanspr&uuml;chen ben&ouml;tigen, haben Sie das Recht, statt der L&ouml;schung die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen.</li> <li>Wenn Sie einen Widerspruch nach Art. 21 Abs. 1 DSGVO eingelegt haben, muss eine Abw&auml;gung zwischen Ihren und unseren Interessen vorgenommen werden. Solange noch nicht feststeht, wessen Interessen &uuml;berwiegen, haben Sie das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen.</li> </ul> <p>Wenn Sie die Verarbeitung Ihrer personenbezogenen Daten eingeschr&auml;nkt haben, d&uuml;rfen diese Daten &ndash; von ihrer Speicherung abgesehen &ndash; nur mit Ihrer Einwilligung oder zur Geltendmachung, Aus&uuml;bung oder Verteidigung von Rechtsanspr&uuml;chen oder zum Schutz der Rechte einer anderen nat&uuml;rlichen oder juristischen Person oder aus Gr&uuml;nden eines wichtigen &ouml;ffentlichen Interesses der Europ&auml;ischen Union oder eines Mitgliedstaats verarbeitet werden.</p>
				<h2>3. Datenerfassung auf unserer Website</h2>
				<h3>Cookies</h3> <p>Die Internetseiten verwenden teilweise so genannte Cookies. Cookies richten auf Ihrem Rechner keinen Schaden an und enthalten keine Viren. Cookies dienen dazu, unser Angebot nutzerfreundlicher, effektiver und sicherer zu machen. Cookies sind kleine Textdateien, die auf Ihrem Rechner abgelegt werden und die Ihr Browser speichert.</p> <p>Die meisten der von uns verwendeten Cookies sind so genannte &bdquo;Session-Cookies&ldquo;. Sie werden nach Ende Ihres Besuchs automatisch gel&ouml;scht. Andere Cookies bleiben auf Ihrem Endger&auml;t gespeichert bis Sie diese l&ouml;schen. Diese Cookies erm&ouml;glichen es uns, Ihren Browser beim n&auml;chsten Besuch wiederzuerkennen.</p> <p>Sie k&ouml;nnen Ihren Browser so einstellen, dass Sie &uuml;ber das Setzen von Cookies informiert werden und Cookies nur im Einzelfall erlauben, die Annahme von Cookies f&uuml;r bestimmte F&auml;lle oder generell ausschlie&szlig;en sowie das automatische L&ouml;schen der Cookies beim Schlie&szlig;en des Browser aktivieren. Bei der Deaktivierung von Cookies kann die Funktionalit&auml;t dieser Website eingeschr&auml;nkt sein.</p> <p>Cookies, die zur Durchf&uuml;hrung des elektronischen Kommunikationsvorgangs oder zur Bereitstellung bestimmter, von Ihnen erw&uuml;nschter Funktionen (z.&nbsp;B. Warenkorbfunktion) erforderlich sind, werden auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO gespeichert. Der Websitebetreiber hat ein berechtigtes Interesse an der Speicherung von Cookies zur technisch fehlerfreien und optimierten Bereitstellung seiner Dienste. Soweit andere Cookies (z.&nbsp;B. Cookies zur Analyse Ihres Surfverhaltens) gespeichert werden, werden diese in dieser Datenschutzerkl&auml;rung gesondert behandelt.</p>
				<h3>Server-Log-Dateien</h3> <p>Der Provider der Seiten erhebt und speichert automatisch Informationen in so genannten Server-Log-Dateien, die Ihr Browser automatisch an uns &uuml;bermittelt. Dies sind:</p> <ul> <li>Browsertyp und Browserversion</li> <li>verwendetes Betriebssystem</li> <li>Referrer URL</li> <li>Hostname des zugreifenden Rechners</li> <li>Uhrzeit der Serveranfrage</li> <li>IP-Adresse</li> </ul> <p>Eine Zusammenf&uuml;hrung dieser Daten mit anderen Datenquellen wird nicht vorgenommen.</p> <p>Die Erfassung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Der Websitebetreiber hat ein berechtigtes Interesse an der technisch fehlerfreien Darstellung und der Optimierung seiner Website &ndash; hierzu m&uuml;ssen die Server-Log-Files erfasst werden.</p>
				<h3>Kontaktformular</h3> <p>Wenn Sie uns per Kontaktformular Anfragen zukommen lassen, werden Ihre Angaben aus dem Anfrageformular inklusive der von Ihnen dort angegebenen Kontaktdaten zwecks Bearbeitung der Anfrage und f&uuml;r den Fall von Anschlussfragen bei uns gespeichert. Diese Daten geben wir nicht ohne Ihre Einwilligung weiter.</p> <p>Die Verarbeitung der in das Kontaktformular eingegebenen Daten erfolgt somit ausschlie&szlig;lich auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO). Sie k&ouml;nnen diese Einwilligung jederzeit widerrufen. Dazu reicht eine formlose Mitteilung per E-Mail an uns. Die Rechtm&auml;&szlig;igkeit der bis zum Widerruf erfolgten Datenverarbeitungsvorg&auml;nge bleibt vom Widerruf unber&uuml;hrt.</p> <p>Die von Ihnen im Kontaktformular eingegebenen Daten verbleiben bei uns, bis Sie uns zur L&ouml;schung auffordern, Ihre Einwilligung zur Speicherung widerrufen oder der Zweck f&uuml;r die Datenspeicherung entf&auml;llt (z.&nbsp;B. nach abgeschlossener Bearbeitung Ihrer Anfrage). Zwingende gesetzliche Bestimmungen &ndash; insbesondere Aufbewahrungsfristen &ndash; bleiben unber&uuml;hrt.</p>
				<h3>Anfrage per E-Mail, Telefon oder Telefax</h3> <p>Wenn Sie uns per E-Mail, Telefon oder Telefax kontaktieren, wird Ihre Anfrage inklusive aller daraus hervorgehenden personenbezogenen Daten (Name, Anfrage) zum Zwecke der Bearbeitung Ihres Anliegens bei uns gespeichert und verarbeitet. Diese Daten geben wir nicht ohne Ihre Einwilligung weiter.</p> <p>Die Verarbeitung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. b DSGVO, sofern Ihre Anfrage mit der Erf&uuml;llung eines Vertrags zusammenh&auml;ngt oder zur Durchf&uuml;hrung vorvertraglicher Ma&szlig;nahmen erforderlich ist. In allen &uuml;brigen F&auml;llen beruht die Verarbeitung auf Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO) und/oder auf unseren berechtigten Interessen (Art. 6 Abs. 1 lit. f DSGVO), da wir ein berechtigtes Interesse an der effektiven Bearbeitung der an uns gerichteten Anfragen haben.</p> <p>Die von Ihnen an uns per Kontaktanfragen &uuml;bersandten Daten verbleiben bei uns, bis Sie uns zur L&ouml;schung auffordern, Ihre Einwilligung zur Speicherung widerrufen oder der Zweck f&uuml;r die Datenspeicherung entf&auml;llt (z.&nbsp;B. nach abgeschlossener Bearbeitung Ihres Anliegens). Zwingende gesetzliche Bestimmungen &ndash; insbesondere gesetzliche Aufbewahrungsfristen &ndash; bleiben unber&uuml;hrt.</p>
				<h2>4. Newsletter</h2>
				<h3>Newsletterdaten</h3> <p>Wenn Sie den auf der Website angebotenen Newsletter beziehen m&ouml;chten, ben&ouml;tigen wir von Ihnen eine E-Mail-Adresse sowie Informationen, welche uns die &Uuml;berpr&uuml;fung gestatten, dass Sie der Inhaber der angegebenen E-Mail-Adresse sind und mit dem Empfang des Newsletters einverstanden sind. Weitere Daten werden nicht bzw. nur auf freiwilliger Basis erhoben. Diese Daten verwenden wir ausschlie&szlig;lich f&uuml;r den Versand der angeforderten Informationen und geben diese nicht an Dritte weiter.</p> <p>Die Verarbeitung der in das Newsletteranmeldeformular eingegebenen Daten erfolgt ausschlie&szlig;lich auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO). Die erteilte Einwilligung zur Speicherung der Daten, der E-Mail-Adresse sowie deren Nutzung zum Versand des Newsletters k&ouml;nnen Sie jederzeit widerrufen, etwa &uuml;ber den &bdquo;Austragen&ldquo;-Link im Newsletter. Die Rechtm&auml;&szlig;igkeit der bereits erfolgten Datenverarbeitungsvorg&auml;nge bleibt vom Widerruf unber&uuml;hrt.</p> <p>Die von Ihnen zum Zwecke des Newsletter-Bezugs bei uns hinterlegten Daten werden von uns bis zu Ihrer Austragung aus dem Newsletter gespeichert und nach der Abbestellung des Newsletters gel&ouml;scht. Daten, die zu anderen Zwecken bei uns gespeichert wurden bleiben hiervon unber&uuml;hrt.</p>
				<h2>5. Plugins und Tools</h2>
				<h3>Google Web Fonts</h3> <p>Diese Seite nutzt zur einheitlichen Darstellung von Schriftarten so genannte Web Fonts, die von Google bereitgestellt werden. Beim Aufruf einer Seite l&auml;dt Ihr Browser die ben&ouml;tigten Web Fonts in ihren Browsercache, um Texte und Schriftarten korrekt anzuzeigen.</p> <p>Zu diesem Zweck muss der von Ihnen verwendete Browser Verbindung zu den Servern von Google aufnehmen. Hierdurch erlangt Google Kenntnis dar&uuml;ber, dass &uuml;ber Ihre IP-Adresse unsere Website aufgerufen wurde. Die Nutzung von Google Web Fonts erfolgt im Interesse einer einheitlichen und ansprechenden Darstellung unserer Online-Angebote. Dies stellt ein berechtigtes Interesse im Sinne von Art. 6 Abs. 1 lit. f DSGVO dar.</p> <p>Wenn Ihr Browser Web Fonts nicht unterst&uuml;tzt, wird eine Standardschrift von Ihrem Computer genutzt.</p> <p>Weitere Informationen zu Google Web Fonts finden Sie unter <a href="https://developers.google.com/fonts/faq" target="_blank" rel="noopener">https://developers.google.com/fonts/faq</a> und in der Datenschutzerkl&auml;rung von Google: <a href="https://policies.google.com/privacy?hl=de" target="_blank" rel="noopener">https://policies.google.com/privacy?hl=de</a>.</p>
				<h3>Google Maps</h3> <p>Diese Seite nutzt &uuml;ber eine API den Kartendienst Google Maps. Anbieter ist die Google Ireland Limited (&bdquo;Google&ldquo;), Gordon House, Barrow Street, Dublin 4, Irland.</p> <p>Zur Nutzung der Funktionen von Google Maps ist es notwendig, Ihre IP Adresse zu speichern. Diese Informationen werden in der Regel an einen Server von Google in den USA &uuml;bertragen und dort gespeichert. Der Anbieter dieser Seite hat keinen Einfluss auf diese Daten&uuml;bertragung.</p> <p>Die Nutzung von Google Maps erfolgt im Interesse einer ansprechenden Darstellung unserer Online-Angebote und an einer leichten Auffindbarkeit der von uns auf der Website angegebenen Orte. Dies stellt ein berechtigtes Interesse im Sinne von Art. 6 Abs. 1 lit. f DSGVO dar.</p> <p>Mehr Informationen zum Umgang mit Nutzerdaten finden Sie in der Datenschutzerkl&auml;rung von Google: <a href="https://policies.google.com/privacy?hl=de" target="_blank" rel="noopener">https://policies.google.com/privacy?hl=de</a>.</p>
				<h3>Spotify</h3> <p>Auf unseren Seiten sind Funktionen des Musik-Dienstes Spotify eingebunden. Anbieter ist die Spotify AB, Birger Jarlsgatan 61, 113 56 Stockholm in Schweden. Die Spotify Plugins erkennen Sie an dem gr&uuml;nen Logo auf unserer Seite. Eine &Uuml;bersicht &uuml;ber die Spotify-Plugins finden Sie unter: <a href="https://developer.spotify.com" target="_blank" rel="noopener">https://developer.spotify.com</a>.</p> <p>Dadurch kann beim Besuch unserer Seiten &uuml;ber das Plugin eine direkte Verbindung zwischen Ihrem Browser und dem Spotify-Server hergestellt werden. Spotify erh&auml;lt dadurch die Information, dass Sie mit Ihrer IP-Adresse unsere Seite besucht haben. Wenn Sie den Spotify Button anklicken w&auml;hrend Sie in Ihrem Spotify-Account eingeloggt sind, k&ouml;nnen Sie die Inhalte unserer Seiten auf Ihrem Spotify Profil verlinken. Dadurch kann Spotify den Besuch unserer Seiten Ihrem Benutzerkonto zuordnen.</p> <p>Die Datenverarbeitung erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Der Websitebetreiber hat ein berechtigtes Interesse an der ansprechenden akustischen Ausgestaltung seiner Website.</p> <p>Weitere Informationen hierzu finden Sie in der Datenschutzerkl&auml;rung von Spotify: <a href="https://www.spotify.com/de/legal/privacy-policy/" target="_blank" rel="noopener">https://www.spotify.com/de/legal/privacy-policy/</a>.</p> <p>Wenn Sie nicht w&uuml;nschen, dass Spotify den Besuch unserer Seiten Ihrem Spotify-Nutzerkonto zuordnen kann, loggen Sie sich bitte aus Ihrem Spotify-Benutzerkonto aus.</p>
				<p>Quelle: <a href="https://www.e-recht24.de">https://www.e-recht24.de</a></p>
			</div>
		</div>
	</section>

</footer>

<div class="cookieDisclaimer active">
	<div class="inner">
		<p>Diese Webseite nutzt Cookies, um bestmögliche Funktionalität bieten zu können.</p>
		<button id="cookieDisclaimer">Zustimmen und fortfahren</button>
	</div>
</div>

<script src="<?=BASE_URL?>_js/index.js"></script>

</body>
</html>