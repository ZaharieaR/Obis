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
    <div class="chenar_graph">
      
        <canvas id="myChart"></canvas>

    </div>
        <!-- <div class="chenar_pie"> -->
        <script>
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
    // Chart.defaults.global.animation.duration=200;
    
    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge',
        'Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
        datasets:[{
          label:'Population',
          data:[
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            617594,
            181045,
            153060,
            106519,
            105162,
            95072
          ],
          backgroundColor:'green',
          backgroundColor:[
            o[0],
            o[1],
            o[2],
            o[3],
            o[4],
            o[5],
            o[6],
            o[7],
            o[8],
            o[9],
            o[10],
            o[11],
            o[12],
            o[13],
            o[14],
            o[15],
            o[16],
            o[17],
            o[18],
            o[19],
            o[20],
            o[21],
            o[22],
            o[23],
            o[24],
            o[25],
            o[26],
            o[27],
            o[28],
            o[29],
            o[30],
            o[31],
            o[32],
            o[33],
            o[34],
            o[35],
            o[36],
            o[37],
            o[38],
            o[39],
            o[40],
            o[41],
            o[42],
            o[43],
            o[44],
            o[45],
            o[46],
            o[47],
            o[48],
            o[49],
            o[50],
            o[51],
            o[52],
            o[53],
            o[54],
            o[55]
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
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
        },
        animation:
        {
          duration:4000,
          easing:'linear'
        }
      }
    });
  </script>
        <!-- </div> -->
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