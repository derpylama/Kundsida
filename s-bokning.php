<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/booking.css" />

</head>
<body>
    <header>
        <a href="Index.html"><img src="images/spa&jaw.png" alt="logo"></a>
        <nav>
            <p>Njutbar tandvård hos Spa and Jaw</p>
            <ul class="horizontal-list" id="links">
                <li><a href="index.html">Hem & information</a></li>
                <li><a href="tjanster.html">Tjänster & priser</a></li>
                <li><a href="t-bokning.php">Bokning & tider</a></li>
            </ul>
        </nav>
    </header>
   
    <div id="booking">
        <nav id="booking-options">
            <h2>Tjänst</h2>
            <ul>
                <li><a href="t-bokning.php">Tandvård</a></li>
                <li><a href="s-bokning.php">Spabehandling</a></li>
                <li><a href="ts-bokning.php">Tandvård & Spabehandling</a></li>
            </ul>
        </nav>
        <form method="POST" action="book.php">
            <div id="booking-info">
                <h2>Spa</h2>

                <label id="tandlack"><input Value="Dyr olja" type="checkbox" name="extra"> Dyr olja</label>

                <h2>Personuppgifter</h2>
                <label><input placeholder="Förnamn" name="first" type="text" required></label>
                <label><input placeholder="Efternamn" name="last" type="text" required></label>
                <label><input placeholder="Email" name="email" type="text" required></label>
                <label><input placeholder="Telefon" name="phone" type="text" required></label>

            </div>

            <div id="booking-times">

                <h2>Boka</h2>

                <input type="date" name="date" name="trip-start" required/>

                <input Value="9-10" type="radio" name="time" id="time1" class="invisible-radio" required>
                <label for="time1">
                    <div class="time">
                        <p>09:00-10:00</p>
                    </div>
                </label>

                <input Value="10-11" type="radio" name="time" id="time2" class="invisible-radio" >
                <label for="time2">
                    <div class="time">
                        <p>10:00-11:00</p>
                    </div>
                </label>

                <input Value="11-12" type="radio" name="time" id="time3" class="invisible-radio" >
                <label for="time3">
                    <div class="time">
                        <p>11:00-12:00</p>
                    </div>
                </label>

                <input type="hidden" name="page" value="s-bokning.php">

            <input type="submit" name="time-submit" id="time-submit" class="invisible-radio"/>
            <label for="time-submit">
                <div class="time-submit">
                    <p>Boka</p>
                </div>
            </label>

            <h2><?php
            if (!empty($_GET["fail"])) {
                echo "Tid otillgänglig";
            }else{
                echo "";
            }
            ?></h2>

            </div>
            
        </form>
    </div>
</body>
</html>