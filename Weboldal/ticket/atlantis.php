
<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jegy vásárláS</title>


    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">
    

    <link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  </head>
  <body>
  	
    <div class="loader">
       <div>
        <img src="preloader.gif" />
       </div>
    </div>
    
    <div class="container-fluid">
		<div class="row">
        	<div class="col-sm-5 left-wrapper">
            	<div class="event-banner-wrapper">
                	<div class="logo">
                        <h1>Közelgő</h1>
                    </div>
                
                	<h2>
                    Élő Koncert<br> Nucci
                    <span>26 April 2024, 21:00</span>
                    </h2>
                    <p>Létrehozta <a href="https://www.facebook.com/atlantisdiscoclub/" target="_blank">Atlantis Garden</a></p>
                </div>
            </div>
            <div class="col-sm-7 right-wrapper">
            	<div class="event-ticket-wrapper">
                    
                    <div class="event-tab">
                
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#buyTicket" aria-controls="buyTicket" role="tab" data-toggle="tab">Jegy vásárlása</a></li>

                    
                    <li role="presentation"><a href="#termCondition" aria-controls="termCondition" role="tab" data-toggle="tab">Jegy Vásárlási Feltételek</a></li>
                  </ul>
                
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="buyTicket">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<div class="ticketBox" data-ticket-price="500">
                                	<div class="inactiveStatus"></div>
                                    
                                    <div class="row">
 			                       	<div class="col-xs-6">
            							<div class="ticket-name">
                                            Nucci Party Night
                                            <span>Normál<br>
                                        	1 jegy  1 emberre
                                            <?php
                                            // PHP kód a jegyek számának lekérdezésére és beillesztésére
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "vajdasagivibes";

                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT mennyi FROM jegyek WHERE jegyid = 1"; // Jegyid alapján lekérdezés
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<br>Jegyek száma: " . $row["mennyi"];
                                                }
                                            } else {
                                                echo "<br>Nincs elérhető jegy jelenleg.";
                                            }

                                            $conn->close();
                                            ?>
                                            </span>
                                        </div>
            						</div>
                                    
                                    <div class="col-xs-6">
            							<div class="ticket-price-count-box">
                                            <div class="ticket-control">
                                                <div class="input-group">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                          <span class="glyphicon glyphicon-minus"></span>
                                                      </button>
                                                  </span>
                                                  <input type="text" name="quant[1]" class="form-control input-number" value="0" min="0" max="10">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                                          <span class="glyphicon glyphicon-plus"></span>
                                                      </button>
                                                  </span>
                                                </div>
                                            </div>
                                            <p class="price">Rsd.500</p>
                                        </div>
            						</div>
                                    </div>
                                	
                                    
                                    <div class="ticket-description">
                                    	<p><strong>Kérem olvassa el a jegy vásárlási feltételeket</strong>
                                    </div>
                                            
                                </div>
                            </div>
                            <div class="col-md-6">
                            	<div class="ticketBox" data-ticket-price="2000">
                                	<div class="inactiveStatus"></div>
                                    
                                    <div class="row">
 			                       	<div class="col-xs-6">
            							<div class="ticket-name">Nucci Party Night<span>
                                        VIP Jegy<br>
                                        1 jegy 1 emberre
                                                <?php
                                                // PHP kód a jegyek számának lekérdezésére és beillesztésére
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $dbname = "vajdasagivibes";

                                                $conn = new mysqli($servername, $username, $password, $dbname);

                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

                                                $sql = "SELECT mennyi FROM jegyek WHERE jegyid = 2"; // Jegyid alapján lekérdezés
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<br>Jegyek száma: " . $row["mennyi"];
                                                    }
                                                } else {
                                                    echo "<br>Nincs elérhető jegy jelenleg.";
                                                }

                                                $conn->close();
                                                ?>
                                            </span></div>
            						</div>
                                    
                                    <div class="col-xs-6">
            							<div class="ticket-price-count-box">
                                            <div class="ticket-control">
                                                <div class="input-group">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[2]">
                                                          <span class="glyphicon glyphicon-minus"></span>
                                                      </button>
                                                  </span>
                                                  <input type="text" name="quant[2]" class="form-control input-number" value="0" min="0" max="10">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[2]">
                                                          <span class="glyphicon glyphicon-plus"></span>
                                                      </button>
                                                  </span>
                                                </div>
                                                
                                            </div>
                                            <p class="price">Rsd.2000</p>
                                        </div>
            						</div>
                                    </div>
                                	
                                    
                                    <div class="ticket-description">
                                        <p><strong>Kérem olvassa el a jegy vásárlási feltételeket</strong>
                                    </div>
                                            
                                </div>
                            </div>
                            <div class="col-md-6">
                            	<div class="ticketBox" data-ticket-price="700">
                                	<div class="inactiveStatus"></div>
                                    
                                    <div class="row">
 			                       	<div class="col-xs-6">
            							<div class="ticket-name">Single Party /w Szecsei <span>
                                            Normál jegy<br>
                                        1 jegy for 1 emberre
                                            <?php
                                            // PHP kód a jegyek számának lekérdezésére és beillesztésére
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "vajdasagivibes";

                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT mennyi FROM jegyek WHERE jegyid = 3"; // Jegyid alapján lekérdezés
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<br>Jegyek száma: " . $row["mennyi"];
                                                }
                                            } else {
                                                echo "<br>Nincs elérhető jegy jelenleg.";
                                            }

                                            $conn->close();
                                            ?></span></div>
            						</div>
                                    
                                    <div class="col-xs-6">
            							<div class="ticket-price-count-box">
                                            <div class="ticket-control">
                                                <div class="input-group">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[3]">
                                                          <span class="glyphicon glyphicon-minus"></span>
                                                      </button>
                                                  </span>
                                                  <input type="text" name="quant[3]" class="form-control input-number" value="0" min="0" max="10">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[3]">
                                                          <span class="glyphicon glyphicon-plus"></span>
                                                      </button>
                                                  </span>
                                                </div>
                                                
                                            </div>
                                            <p class="price">Rsd 700</p>
                                        </div>
            						</div>
                                    </div>
                                	
                                    
                                    <div class="ticket-description">
                                        <p><strong>Kérem olvassa el a jegy vásárlási feltételeket</strong>
                                    </div>
                                            
                                </div>
                            </div>
                            <div class="col-md-6">
                            	<div class="ticketBox" data-ticket-price="2000">
                                	<div class="inactiveStatus"></div>
                                    
                                    <div class="row">
 			                       	<div class="col-xs-6">
            							<div class="ticket-name">Single Party /w Szecsei<span>
                                        VIP Jegy<br>
                                        1 jegy 1 emberre
                                            <?php
                                            // PHP kód a jegyek számának lekérdezésére és beillesztésére
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "vajdasagivibes";

                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT mennyi FROM jegyek WHERE jegyid = 4"; // Jegyid alapján lekérdezés
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<br>Jegyek száma: " . $row["mennyi"];
                                                }
                                            } else {
                                                echo "<br>Nincs elérhető jegy jelenleg.";
                                            }

                                            $conn->close();
                                            ?>
                                            </span></div>
            						</div>
                                    
                                    <div class="col-xs-6">
            							<div class="ticket-price-count-box">
                                            <div class="ticket-control">
                                                <div class="input-group">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[4]">
                                                          <span class="glyphicon glyphicon-minus"></span>
                                                      </button>
                                                  </span>
                                                  <input type="text" name="quant[4]" class="form-control input-number" value="0" min="0" max="10">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[4]">
                                                          <span class="glyphicon glyphicon-plus"></span>
                                                      </button>
                                                  </span>
                                                </div>
                                                
                                            </div>
                                            <p class="price">Rsd.2000</p>
                                        </div>
            						</div>
                                    </div>
                                	
                                    
                                    <div class="ticket-description">
                                        <p><strong>Kérem olvassa el a jegy vásárlási feltételeket</strong>
                                    </div>
                                            
                                </div>
                            </div>




                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="termCondition">
                        <h4>
                            Természetesen, itt van egy szórakozóhely jegy vásárlására vonatkozó példa a vásárlási feltételekkel:

                            Jegy Vásárlási Feltételek

                            Jegy Vásárlása: A jegyek online és személyesen is megvásárolhatók. Online vásárlás esetén a vásárlónak csak a számlát kell felmutatnia a belépéshez.
                            Jegy Érvényessége: Minden jegy egyszeri belépést biztosít a szórakozóhelyre. A jegy csak azon a napon és azon az eseményen érvényes, amelyre megvásárolták.
                            Fénykép és Videó Felvételek: A szórakozóhely területén készített fényképek és videók készítésével a vásárló beleegyezik. A szórakozóhely jogosult a felvételeket promóciós célokra használni.
                            Jogosultságok és Felelősség: A jegyek csak a vásárlónak vagy az általa kijelölt személynek adnak jogosultságot a belépésre. A szórakozóhely nem vállal felelősséget az elveszett vagy ellopott jegyekért.
                            Jegy Visszaváltása: A jegyek visszaváltása vagy cseréje nem lehetséges, kivéve, ha az eseményt a szórakozóhely lemondja vagy módosítja.
                            Viselkedési Szabályok: A szórakozóhelyen az illem és a tisztelet szabályait be kell tartani. Az alkoholfogyasztásra vonatkozó törvények és szabályok betartása kötelező.
                            Jogi Követelmények: A jegy vásárlásával a vásárló elfogadja és beleegyezik abba, hogy a szórakozóhely bizonyos személyes adatokat (pl. név, e-mail cím) tároljon és kezeljen az érvényes jogszabályoknak megfelelően.
                            Változtatások Joga: A szórakozóhely fenntartja a jogot a vásárlási feltételek és az esemény részleteinek módosítására előzetes értesítés nélkül.
                            Az aláírásoddal vagy a jegy megvásárlásával elfogadod és beleegyezel ezekbe a vásárlási feltételekbe</h4>
                    </div>
                  </div>
                
                </div>
                
                	<div class="cart">
                <div class="row">
                    <div class="col-xs-6">
                        <p><span class="ticket-count">0</span> darab Jegy <span class="divider"></span> Összeg: Rsd. <span class="total-amount">0</span></p>
                    </div>
                    <div class="col-xs-6">
                    	<div class="text-right">
                        	<a class="btn disabled" data-toggle="modal" data-target="#ticket-details">TOVÁBB</a>
                        </div>
                    </div>
                </div>
                </div>
                       
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal right fade" id="ticket-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Share your contact Details</h4>
      </div>-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<img src="cancel.png">
        </button>
        <h4 class="modal-title">Jegyeim</h4>
      </div>
      <div class="modal-body">
        
        <div class="cart-information">
            	<div class="ticket-type"></div>
          		<ul>
	                <li>Tickets: <span class="ticket-count"></span></li>
                    <li>Price: <span class="ticket-amount"></span></li>
                    <hr>
                    <li>Total: <span class="total-amount"></span></li>
    			</ul>
            </div>
            
            <div class="contactForm">	
                <h3>Adja meg az elérhetőségi adatokat</h3>
                <form>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Adja meg a nevét" required>
                  </div>
                  
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Adja meg email címét" required>
                  </div>
                  
                  <div class="form-group">
                     <input type="text" class="form-control" placeholder="Adja meg a telefonszámát" required>
                  </div>
                    <a href="Weboldal/fooldal2.php" target="_blank" class="btn">Jegyek lefoglalása</a>

                </form>
            </div>
        
        
        
      </div>
    </div>
  </div>
</div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="allscript.js"></script>
  </body>
</html>
