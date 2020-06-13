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
                            Bar Chart View
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
        <a style="color: black; text-decoration: none;" class="Chenare"
        href = '../pieChart/index?Year=2018&Response=Obese%20(BMI%2030.0%20-%2099.8)&Break_Out_Category=Age+Group&BreakOut=18-24'>
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
    
            <a style="color: black; text-decoration: none;" class="Chenare">
                <div class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                <div class="continut">
                    <h3>Bar Chart View</h3>
                </div>
            </a>
        </div>

        <div style="text-align: center; margin-top:20px" >  
            <form>

            <?php
                $controller = new graphTable;
                $controller -> getFilterOf("Year");
                $controller -> getFilterOf("Response");
                $controller -> getFilterOf("Break_Out_Category");
                $controller -> getBrkOutFilterContent();
            ?> 
              <input onclick=verifyFilters() type="submit" value="Apply filters"> 
            </form>
        </div> 

        <script>  
        var querryStr = "";
        var year = document.getElementById("Year").value;
        var response = document.getElementById("Response").value;
        var brkCategory = document.getElementById("Break_Out_Category").value;
        var brkOut = document.getElementById("Break_Out").value;
    
        querryStr = "?Year=" + year + "&Response=" + response + "&Break_Out_Category=" + brkCategory + "&Break_Out=" + brkOut;
        
          function verifyFilters() {
            var year = document.getElementById("Year").value;
            var response = document.getElementById("Response").value;
            var brkCategory = document.getElementById("Break_Out_Category").value;
            var brkOut = document.getElementById("Break_Out").value;
            if(year == "None"){
              alert("You need to select all filters!");
              event.preventDefault();
            }
            if(response == "None") {
              alert("You need to select all filters!");
              event.preventDefault();
            }
            if(brkCategory == "None") {
              alert("You need to select all filters!");
              event.preventDefault();
            }
            if(brkOut == "None") {
              alert("You need to select all filters!");
              event.preventDefault();
            }
            querryStr = "?Year=" + year + "&Response=" + response + "&Break_Out_Category=" + brkCategory + "&Break_Out=" + brkOut;
          }

          var brkCatToUpdate = document.getElementById("Break_Out_Category");
          var breakOutCategoryUpdate = function() {
              var value = brkCatToUpdate.value;
              var index = window.location.href.indexOf("Break_Out_Category=");
              var sel = window.location.href.substr(0, index);
              window.location.href = sel + "Break_Out_Category=" + value + "&BreakOut=None";
          }
          brkCatToUpdate.addEventListener("change",breakOutCategoryUpdate);
        </script> 

        <div class="chenar_graph">
      
        <canvas id="myChart"></canvas>

        </div>

        <script>

        function getJson() { 
          return new Promise(function(resolve){
            fetch('http://localhost/Obis/public/api/getPieChartData/' + querryStr)
                  .then(response => response.json())
                  .then(data => resolve(data));
          });  

        }

        async function callFct() {
          var json = await getJson();
          var locations = [];
          var sampleSize = [];
          var dataValue = [];
          var dataToPrint = [];
          
          for(var i=0; i<json.length; i++) {
            var jsonElem = json[i];
            locations.push(jsonElem["Location"]);
            sampleSize.push(jsonElem["SampleSize"]);
            dataValue.push(jsonElem["DataValue"]);
            dataToPrint.push(Number((dataValue[i]/100) * sampleSize[i]));
          }

          var colors=[];
          for(var i=0;i<56;i++)
          {
            var symbols,color;
            symbols="0123456789ABCDEF";
            color="#";
            for(var j=0;j<6;j++)
            {
              color=color + symbols[Math.floor(Math.random() * 16)];
            }
            colors[i]=color;
          }
          let myChart = document.getElementById('myChart').getContext('2d');

          // Global Options
          Chart.defaults.global.defaultFontFamily = 'Lato';
          Chart.defaults.global.defaultFontSize = 18;
          Chart.defaults.global.defaultFontColor = '#777';

          let massPopChart = new Chart(myChart, {
            type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
              labels:locations,
              datasets:[{
                label:'Obesity',
                data:dataToPrint,
                backgroundColor:[
                  ...colors
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