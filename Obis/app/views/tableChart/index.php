<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Rachita Cosmin-Zahariea Robert " />
    <meta name="keywords" content="proiect TW" />
    <title>Proiect TW | Home</title>
    <link href="http://localhost/Obis/app/views/home/css/styleHome.css" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>

<body>
        <header>
            <div class="container">
    
                <div id="branding">
                    <h1>
                        <span class="highlight">
                            Diagrama Pie
                        </span>
                    </h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="../home/index">Home</a></li>
                        <li><a href="services.html">Table</a></li>
                        <li><a href="about.html">Weight Calculator</a></li>
    
                    </ul>
                </nav>
            </div>
        </header>
        <div class="chenar">
        <a style="color: black; text-decoration: none;" class="Chenare" href = '../pieChart/index'>
                <div class="icon"><i class="fa fa-pie-chart" aria-hidden="true"></i></div>
                <div class="continut">
                    <h3>Diagrama Pie</h3>
                </div>
        </a>
            <a style="color: black; text-decoration: none;" class="Chenare" 
            href = '../tableChart/index?Year=2018&Location=None&Response=None&BreakOutCategory=Age+Group&BreakOut=None&page=1'>
                <div class="icon"><i class="fa fa-table" aria-hidden="true"></i></div>
                <div class="continut">
                    <h3>Diagrama Tabel</h3>
                </div>
            </a>
    
            <a style="color: black; text-decoration: none;" class="Chenare" href = '../graphTable/index'>
                <div class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                <div class="continut">
                    <h3>Diagrama Tabel</h3>
                </div>
            </a>
        </div>
    
        <div style="text-align: center; margin-top:20px" >  
            <form action="/Obis/public/tableChart/index" >
            
            <?php
                $controller = new tableChart;
                $controller -> getFiltersContent();
                $controller -> getBrkOutFilterContent();
            ?> 
            </form>
        </div> 

        <script>
            var year = document.getElementById("Year");
            var yearUpdate = function() {
                var value = year.value;
                var index = window.location.href.indexOf("Year=");
                var nextIndex = window.location.href.indexOf("&Location=");
                var pageIndex = window.location.href.indexOf("&page=");
                var toConcatString = window.location.href.substring(nextIndex, pageIndex);
                var sel = window.location.href.substr(0, index);
                window.location.href = sel + "Year=" + value + toConcatString + "&page=1";
            }
            year.addEventListener("change",yearUpdate);

            var loc = document.getElementById("Location");
            var locationUpdate = function() {
                var value = loc.value;
                var index = window.location.href.indexOf("Location=");
                var nextIndex = window.location.href.indexOf("&Response=");
                var pageIndex = window.location.href.indexOf("&page=");
                var toConcatString = window.location.href.substring(nextIndex, pageIndex);
                var sel = window.location.href.substr(0, index);
                window.location.href = sel + "Location=" + value + toConcatString + "&page=1";
            }
            loc.addEventListener("change",locationUpdate);

            var response = document.getElementById("Response");
            var reponseUpdate = function() {
                var value = response.value;
                var index = window.location.href.indexOf("Response=");
                var nextIndex = window.location.href.indexOf("&BreakOutCategory=");
                var pageIndex = window.location.href.indexOf("&page=");
                var toConcatString = window.location.href.substring(nextIndex, pageIndex);
                var sel = window.location.href.substr(0, index);
                window.location.href = sel + "Response=" + value + toConcatString + "&page=1";
            }
            response.addEventListener("change",reponseUpdate);

            var brkCat = document.getElementById("BreakOutCategory");
            var breakOutCategoryUpdate = function() {
                var value = brkCat.value;
                var index = window.location.href.indexOf("BreakOutCategory=");
                var nextIndex = window.location.href.indexOf("&page=");
                var sel = window.location.href.substr(0, index);
                window.location.href = sel + "BreakOutCategory=" + value + "&BreakOut=None&page=1";
            }
            brkCat.addEventListener("change",breakOutCategoryUpdate);

            var brkOut = document.getElementById("BreakOut");
            var breakOutUpdate = function() {
                var value = brkOut.value;
                var index = window.location.href.indexOf("BreakOut=");
                var nextIndex = window.location.href.indexOf("&page=");
                var sel = window.location.href.substr(0, index);
                window.location.href = sel + "BreakOut=" + value + "&page=1";
            }
            brkOut.addEventListener("change",breakOutUpdate);
        </script>

        <div class="continut1">

            <div class="incercuit1">
                <?php
                    $controller -> init();
                ?>
                <!-- <div>
                    <p onclick="nextPage()"> Next page -> </p>
                </div>   -->
            </div>
        </div>

        <script>
            function nextPage() {
                var index = window.location.href.indexOf("&page=");
                var currentPage = Number(window.location.href.substr(index + 6, window.location.href.length - 1));
                var nextPage = currentPage + 1;
                index = window.location.href.indexOf("page=");
                var sel = window.location.href.substr(0, index);
                window.location.href = sel + "page=" + nextPage;
            }

            function prevPage() {
                var index = window.location.href.indexOf("&page=");
                var currentPage = Number(window.location.href.substr(index + 6, window.location.href.length - 1));
                var prevPage = currentPage - 1;
                index = window.location.href.indexOf("page=");
                var sel = window.location.href.substr(0, index);
                window.location.href = sel + "page=" + prevPage;
            }
        </script>

        <div class="footer">
            <div class="inner_footer">
                <div class="logo_container">
                    <img src="http://localhost/Obis/app/views/home/css/logo.png" alt="Iconnita" >
                </div>
                <div class="footer_third">
                    <h1>Mail</h2>
                    <p href="#">rachitacosminv@gmail.com</p>
                    <p href="#">robert.zahariea@gmail.com</p>
                </div>
                <div class="footer_third">
                    <h1>Phone</h2>
                    <p href="#">0739184017</p>
                    <p href="#">0754434535</p>
                </div>
                <div class="footer_third">
                    <h1>Help?</h2>
                    <p href="#">Terms &amp; Conditions</p>
                    <p href="#">Privacy Policy</p>
                </div>
            </div>
        </div>
    </body>
</html>