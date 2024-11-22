<?php
/* ----------------------------------------------------------------------
 * views/Front/dashboard_stats_html.php : 
 * ----------------------------------------------------------------------
*/
    $o_db = new Db();
  
    $qr_counter = $o_db->query('SELECT count(object_id) AS c, type_id FROM ca_objects WHERE deleted=0 GROUP BY type_id ORDER BY type_id');
?>

<script>
    var options = {
        stroke: { 
                show: false,
                width: 0,
            },
        chart: {
            type: 'pie',
            height: 45,
            toolbar: {
                show: false
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false
            },

        },
        series: [
<?php
            while ($qr_counter->nextRow()){
                print $qr_counter->get('c').",";
            }
?>
        ],
        colors: ['rgba('+ app.color.themeRgb + ', 1)', 'rgba('+ app.color.themeRgb + ', .75)', 'rgba('+ app.color.themeRgb + ', .5)'],
        labels: ['Documents', 'Prints', 'Models'],
        legend: false,
        dataLabels: { enabled : false }
        }

    var chart = new ApexCharts(document.querySelector("#apexchart"), options);

    chart.render();
</script>