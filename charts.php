<?php  
 $connect = mysqli_connect("localhost", "root", "", "issue-tracking-system");  
 $query = "SELECT ticket_priority.name,count(ticket_priority.name) FROM tickets INNER JOIN ticket_priority ON ticket_priority.id = tickets.priority group by priority";  
 $result = mysqli_query($connect, $query);  
 ?>  


<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['name', 'count(ticket_priority.name)'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["name"]."', ".$row["count(ticket_priority.name)"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Prority Chart',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>  



