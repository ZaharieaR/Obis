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

</head>

<body>
        <header>
            <div class="container">
    
                <div id="branding">
                    <h1>
                        <span class="highlight">
                            Pie Chart View
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
        <a style="color: black; text-decoration: none;" class="Chenare">
                <div class="icon"><i class="fa fa-pie-chart" aria-hidden="true"></i></div>
                <div class="continut">
                    <h3>Pie Chart View</h3>
                </div>
        </a>
            <a style="color: black; text-decoration: none;" class="Chenare" 
            href = '../tableChart/index?Year=2018&Location=None&Response=None&BreakOutCategory=Age+Group&BreakOut=None&page=1'>
                <div class="icon"><i class="fa fa-table" aria-hidden="true"></i></div>
                <div class="continut">
                    <h3>Table View</h3>
                </div>
            </a>
    
            <a style="color: black; text-decoration: none;" class="Chenare" href = '../graphTable/index'>
                <div class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                <div class="continut">
                    <h3>Bar Chart View</h3>
                </div>
            </a>
        </div>

        <div style="text-align: center; margin-top:20px" >  
            <form>

            <?php
                $controller = new pieChart;
                $controller -> getFilterOf("Year");
                $controller -> getFilterOf("Response");
                $controller -> getFilterOf("Break_Out_Category");
                $controller -> getBrkOutFilterContent();
            ?> 
              <input onclick=verifyFilters() type="submit" value="Apply filters"> 
            </form>
        </div> 

        <script>  
          function verifyFilters() {
            var year = document.getElementById("Year").value;
            if(year == "None"){
              alert("You need to select all filters!");
              event.preventDefault();
            }
            var response = document.getElementById("Response").value;
            if(response == "None") {
              alert("You need to select all filters!");
              event.preventDefault();
            }

            var brkCategory = document.getElementById("Break_Out_Category").value;
            if(brkCategory == "None") {
              alert("You need to select all filters!");
              event.preventDefault();
            }

            var brkOut = document.getElementById("Break_Out").value;
            if(brkOut == "None") {
              alert("You need to select all filters!");
              event.preventDefault();
            }
          }

          var brkCat = document.getElementById("Break_Out_Category");
          var breakOutCategoryUpdate = function() {
              var value = brkCat.value;
              var index = window.location.href.indexOf("Break_Out_Category=");
              var sel = window.location.href.substr(0, index);
              window.location.href = sel + "Break_Out_Category=" + value + "&BreakOut=None";
          }
          brkCat.addEventListener("change",breakOutCategoryUpdate);
        </script> 

        <div class="chenar_graph">
      
        <canvas id="myChart"></canvas>

        </div>
        <!-- <div class="chenar_pie"> -->
        <script>

        function getJson() { 
          return new Promise(function(resolve){
            fetch('http://localhost/Obis/public/api/getPieChartData')
                  .then(response => response.json())
                  .then(data => resolve(data));
          });   
        }

        async function callFct() {
          var h1ID = document.getElementById("h1ID");
          var json = await getJson();
          var locations = [];
          
          for(var i=0; i<json.length; i++) {
            var location = json[i];
            locations.push(location["Location"]);
            console.log(locations[i]);
          }

          var o=[];
          for(var i=0;i<56;i++)
          {
            var symbols,color;
            symbols="0123456789ABCDEF";
            color="#";
            for(var j=0;j<6;j++)
            {
              color=color + symbols[Math.floor(Math.random() * 16)];
            }
              o[i]=color;
          }
          let myChart = document.getElementById('myChart').getContext('2d');

          // Global Options
          Chart.defaults.global.defaultFontFamily = 'Lato';
          Chart.defaults.global.defaultFontSize = 18;
          Chart.defaults.global.defaultFontColor = '#777';

          let massPopChart = new Chart(myChart, {
            type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
              labels:locations,
              datasets:[{
                data:[
                  617594,
                  181045,
                  153060,
                  617594,
                ],
                backgroundColor:[
                  ...o
                ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
              }]
            },
            options:{
              rotation:180,
            animation:
            {
              animateScale:true
            },
              title:{
                display:true,
                text:'Largest Cities In Massachusetts',
                fontSize:25
              },
              legend:{
                display:true,
                position:'right',
                labels:{
                  fontColor:'#000'
                }
              },
              layout:{
                padding:{
                  left:50,
                  right:0,
                  bottom:0,
                  top:0
                }
              },
              tooltips:{
                enabled:true
              }

            },
            cutoutPercentage:80,
            animation:
            {
              animateScale:true
            }
          });
        }
        callFct(); 
  </script>
    </div>
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