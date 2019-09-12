_prashantiYoga
Fonts: 
One Love Font:
https://www.dafont.com/onelove.font
Icon Font:
https://fontawesome.com/
Shiva Icon:
<a href="http://www.onlinewebfonts.com">oNline Web Fonts</a>
Tested on PHP 7.2.10
Tested on Mac in Chrome Version 76.0.3809.100 (Offizieller Build) (64-Bit)

Javascript und CSS (SASS) wurden mithilfe von Prepros vorgearbeitet.
In den Ordnern „_js_src“ und „_sass“ befinden sich die Ursprungsdateien
In „_js“ und „_css“ liegen die verarbeiteten Dateien die an den Browser ausgeliefert werden.
Alle auf der Seite verwendeten Bilder liegen im _img Ordner. Im Unterordner „upload“ werden auch die im CMS hochgeladenen Bilder abgelegt.
Im Ordner „_partials“ befinden sich template und wiederverwendbare Einzelteile die per PHP in die Seite gerendert werden.
Im Ordner „_php“ befindet sich der Großteil der PHP Logik.
„includes“ innerhalb des PHP Ordners ist PHP Code der auf jeder Seite verwendet und immer eingebunden wird.
In „database“ befinden sich Klassen, welche die Datenbanktabellen wiederspiegeln. Hier wurden der Tabellenname und die Spalten zur Wiederverwendung in anderen Klassen als Konstanten angelegt.
Im PHP Unterordner template liegen die PHP Klassen die die verschiedenen möglichen Template, welche auf der Seite dargestellt werden können abbilden.
Im PHP Ordner selbst liegen, dann noch die wichtigsten Klassen des CMS.
Field, welche ein Feld auf der Seite widerspiegelt und als Containerklasse für mehrere Templates dient. Template, welche die Elternklasse für alle anderen Templateklassen ist und die meisten Funktionen der Templates implementiert. Die Pageklasse, welche hauptsächlich als Containerklasse für den Inhalt der verschiedenen Seiten dient. Und zuletzt die Contentklasse welche, sich generell um die Verwaltung von Inhalten kümmert.
Die Überordner der Quelldateien werden mit einem vorangestellten „_“ gekennzeichnet. In den Ordnern ohne _ befindet sich die Seiten auf die der Browser direkt zugreift. Die SEO und Nutzerrelevanten Seiten sind somit immer über einfache links (wie zum Beispiel /login) erreichbar.

Zum testen die Datenbank ins lokale System importieren und den mitgelieferten Ordner "_prashantiYoga" ins Rootverzeichnis des Servers legen.
Dann die URL des Servers mit /_prashantiYoga aufrufen.
Der Login ist den Inhabern der Seite vorbehalten, und somit nicht auf der eigentlichen Seite verlinkt.
Zum Einloggen folgenden Link nutzen:
/_prashantiYoga/login/

Ein Legitimer Login ist
admin
password

Die Option sich zu registrieren ist vorhanden, jedoch muss ein neuer Nutzer erst händisch freigeschaltet werden.
