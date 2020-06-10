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
</head>

<body>
        <header>
            <div class="container">
    
                <div id="branding">
                    <h1>
                        <span class="highlight">
                            Table Chart
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
            <div class="Chenare">
                <div class="icon"><i class="fa fa-table" aria-hidden="true"></i></div>
                <div class="continut">
                    <h3>Diagrama Tabel</h3>
                </div>
            </div>
    
            <a style="color: black; text-decoration: none;" class="Chenare" href = '../graphTable/index'>
                <div class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                <div class="continut">
                    <h3>Diagrama Tabel</h3>
                </div>
            </a>
        </div>
        <div class="continut1">

            <div class="incercuit1">
                <?php
                    $controller = new tableChart;
                    $controller -> init();
                ?>
                
            </div>
        </div>
        
        <div class="filtersBox" >
            <?php
                $controller -> getFiltersContent();
            ?> 
        </div>
        
        <div class="footer">
            <div class="inner_footer">
                <div class="logo_container">
                    <img src="./css/iconitaa.jpg" />
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