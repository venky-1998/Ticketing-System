<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>







(SELECT ticket_priority.name, tickets.id, '1' as is_for FROM tickets INNER JOIN ticket_priority ON ticket_priority.id = tickets.priority  INNER JOIN projects ON projects.id = tickets.project WHERE tickets.for_account=1 ORDER BY tickets.timecreated ASC) UNION (SELECT ticket_priority.name, priority_colors.color, tickets.timecreated, tickets.timeclosed, tickets.id, '0' as is_for FROM tickets INNER JOIN ticket_priority ON ticket_priority.id = tickets.priority INNER JOIN priority_colors ON priority_colors.for_id = ticket_priority.id INNER JOIN projects ON projects.id = tickets.project WHERE tickets.timeclosed > 0 AND tickets.for_account=1 ORDER BY tickets.timeclosed ASC)




SELECT ticket_priority.name, tickets.id FROM tickets INNER JOIN ticket_priority ON ticket_priority.id = tickets.priority 



SELECT ticket_priority.name,count(ticket_priority.name) FROM tickets INNER JOIN ticket_priority ON ticket_priority.id = tickets.priority group by priority;




SELECT ticket_statuses.name,count(ticket_statuses.name) FROM tickets INNER JOIN ticket_statuses ON ticket_statuses.id = tickets.status WHERE name=new;