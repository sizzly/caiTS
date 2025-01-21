<?php
/* ----------------------------------------------------------------------
 * views/Front/dashboard_stats_html.php : 
 * ----------------------------------------------------------------------
*/
    $o_db = new Db();
  
    $qr_counter = $o_db->query('SELECT count(object_id) AS c, type_id FROM ca_objects WHERE deleted=0 GROUP BY type_id ORDER BY type_id');

    $qr_arms = $o_db->query('with recursive cte (item_id, type_id, parent_id) as (select item_id, type_id, parent_id from ca_list_items where parent_id = 202 union all select p.item_id, p.type_id, p.parent_id from ca_list_items p inner join cte on p.parent_id = cte.item_id) select * from cte WHERE type_id = 2');
    $arms_label = "";
    $arms_count = "";
    while ($qr_arms->nextRow()){
        $arms_item = new ca_list_items($qr_arms->get('item_id'));
        $item_title = "'".$arms_item->get('ca_list_items.preferred_labels.name_singular')."',";
        $arms_label .= $item_title;
        $idforitem = $qr_arms->get('item_id');
    
        $qr_armcount = $o_db->query('SELECT count(*) AS c FROM ca_objects_x_vocabulary_terms WHERE item_id='.$idforitem.'');
        $qr_armcount->nextRow(); // the result has only 1 row.
        $vn_armcount = $qr_armcount->get('c'); // this should be your count
        $new_count = $vn_armcount.",";
        $arms_count .= $new_count;
    }
    
    $arms_counts = "[".$arms_count."]";
    $arms_labels = "[".$arms_label."]";
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

<script>
  var apexRadarChartOptions = {
    chart: {
      height: 320,
      type: 'radar',
    },
    series: [{
      name: 'Model Count',
      data: <?php print $arms_counts; ?>,
    }],
    labels: <?php print $arms_labels; ?>,
    plotOptions: {
      radar: {
        size: 140,
        polygons: {
          strokeColors: 'rgba('+ app.color.whiteRgb +', .25)',
          strokeWidth: 1,
          connectorColors: 'rgba('+ app.color.whiteRgb +', .25)',
          fill: {
            colors: ['rgba('+ app.color.gray300Rgb +', .25)', 'rgba('+ app.color.whiteRgb +', .25)']
          }
        }
      }
    },
    title: {
      text: ''
    },
    colors: [app.color.theme],
    markers: {
      size: 4,
      colors: [app.color.theme],
      strokeColor: app.color.theme,
      strokeWidth: 2,
    },
    tooltip: {
      y: {
        formatter: function(val) {
          return val
        }
      }
    },
    yaxis: {
      tickAmount: 7,
      labels: {
        formatter: function(val, i) {
          if (i % 2 === 0) {
            return val
          } else {
            return ''
          }
        }
      }
    }
  }
  var apexRadarChart = new ApexCharts(
    document.querySelector('#apexRadarChart'),
    apexRadarChartOptions
  );
  apexRadarChart.render();
</script>