<?php  
 $connect = mysqli_connect("localhost", "root", "", "issue-tracking-system");  
 $query = "SELECT ticket_priority.name,count(ticket_priority.name) FROM tickets INNER JOIN ticket_priority ON ticket_priority.id = tickets.priority group by priority;";
 $queryy="SELECT ticket_statuses.name,count(ticket_statuses.name) FROM tickets INNER JOIN ticket_statuses ON ticket_statuses.id = tickets.status group by status;";
 //$query1 = "SELECT COUNT(id) FROM tickets;";
 //$query2 = "SELECT COUNT(id) FROM ticket_statuses;";
 $querynew= "SELECT count(ticket_statuses.name) FROM tickets INNER JOIN ticket_statuses ON ticket_statuses.id = tickets.status where status=1;";
 $querytodo= "SELECT count(ticket_statuses.name) FROM tickets INNER JOIN ticket_statuses ON ticket_statuses.id = tickets.status where status=2;";
$queryinp= "SELECT count(ticket_statuses.name) FROM tickets INNER JOIN ticket_statuses ON ticket_statuses.id = tickets.status where status=3;";
$queryrej= "SELECT count(ticket_statuses.name) FROM tickets INNER JOIN ticket_statuses ON ticket_statuses.id = tickets.status where status=5;";
$queryclosed= "SELECT count(ticket_statuses.name) FROM tickets INNER JOIN ticket_statuses ON ticket_statuses.id = tickets.status where status=4;";
$querytotal="SELECT count(ticket_statuses.name) FROM tickets INNER JOIN ticket_statuses ON ticket_statuses.id = tickets.status";



 
 $result = mysqli_query($connect, $query);
 $resultt = mysqli_query($connect, $queryy);

 //$result1 = $connect->query($query1);  
 //$result2 = $connect->query($query2);
 $resultnew = $connect->query($querynew);
 $resulttodo = $connect->query($querytodo);
 $resultinp = $connect->query($queryinp);
 $resultrej = $connect->query($queryrej);
 $resultclosed = $connect->query($queryclosed);
 $resulttotal = $connect->query($querytotal);

 //$row1 = mysqli_fetch_assoc($result1);
 //$row2 = mysqli_fetch_assoc($result2);
 $rownew = mysqli_fetch_assoc($resultnew);
 $rowtodo = mysqli_fetch_assoc($resulttodo);
 $rowinp = mysqli_fetch_assoc($resultinp);
 $rowrej = mysqli_fetch_assoc($resultrej);
 $rowclosed = mysqli_fetch_assoc($resultclosed);
 $rowtotal = mysqli_fetch_assoc($resulttotal);
 ?>  
<!DOCTYPE html>
<html lang="en">
    <head>
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

                var data1 = google.visualization.arrayToDataTable([  
                          ['name', 'count(ticket_statuses.name)'],  
                          <?php  
                          while($row3 = mysqli_fetch_array($resultt))  
                          {  
                               echo "['".$row3["name"]."', ".$row3["count(ticket_statuses.name)"]."],";  
                          }  
                          ?>  
                     ]);  


                var options = {  
                      title: 'Ticket Priority',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var options1 = {  
                      title: 'Ticket Status',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));   
                chart.draw(data, options);
                chart1.draw(data1, options1);

           }  
           </script>  
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <!--<link href="css/styles.css" rel="stylesheet" />-->

        <link href="http://localhost/Scalable_final/styles.css" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="http://localhost/Scalable_final/indexx.php">Dashboard</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
                        <!-- Navbar-->
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <div style="color: white">Admin</div> 
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="http://localhost/proj/settings">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://localhost/Scalable_final/logout">Logout</a>
                    </div>

                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="http://localhost/Scalable_final/indexx.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="http://localhost/Scalable_final/home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Home
                            </a>





                            

                            
                                <div class="sb-sidenav-menu-heading">More</div>
                                <a class="nav-link" href="http://localhost/Scalable_final/profile/admin"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                My Profile</a>
                                <a class="nav-link" href="http://localhost/Scalable_final/settings/profiles"
                                ><div class="sb-nav-link-icon"><i class="fas fa-users" style="font-size:24px"></i>   </div>
                                Customers</a>
                                <a class="nav-link" href="http://localhost/Scalable_final/settings"
                                ><div class="sb-nav-link-icon"><i class="fa fa-cog" style="font-size:24px"></i>   </div>
                                Settings</a>
                        </div>
                    </div>
                    
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <div class="row">


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">All Tickets
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    
                                    <span style="font-size: 100%"><b><?php echo $rowtotal['count(ticket_statuses.name)'];?></b></span></div>

                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>







                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">New Tickets
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    
                                    <span style="font-size: 100%"><b><?php echo $rownew['count(ticket_statuses.name)'];?></b></span></div>

                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">To Do
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    
                                    <span style="font-size: 100%"><b><?php echo $rowtodo['count(ticket_statuses.name)'];?></b></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">In Progress
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    
                                    <span style="font-size: 100%"><b><?php echo $rowinp['count(ticket_statuses.name)'];?></b></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Rejected
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    
                                    <span style="font-size: 100%"><b><?php echo $rowrej['count(ticket_statuses.name)'];?></b></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       
                                        <div class="small text-white"><i class="fas fa-angle-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Closed
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    
                                    <span style="font-size: 100%"><b><?php echo $rowclosed['count(ticket_statuses.name)'];?></b></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                                        <div class="small text-white"><i class="fas fa-angle-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        








                        
                <div style="width:900px;">  
                    <div id="piechart" style="width: 900px; height: 500px;"></div>  
                <!--</div>
                <div style="width:900px;">  -->
                    <div id="piechart1" style="width: 900px; height: 500px;"></div>  
                </div>  
            </div>  

            <?php// echo $row1['COUNT(id)'];?><br><br>
            <?php //echo $row2['COUNT(id)'];?>
   
             </div>











                                                                                                        

                </main>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="http://localhost/Scalable_final/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="http://localhost/Scalable_final/chart-area-demo.js"></script>
        <script src="http://localhost/Scalable_final/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous">
        </script>
        <script src="http://localhost/Scalable_final/datatables-demo.js"></script>
    </body>
</html>
