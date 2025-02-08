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

    $qr_muster = $o_db->query('SELECT t1.* FROM ca_objects_x_occurrences t1 INNER JOIN (SELECT object_id, MAX(edatetime) AS max_date FROM ca_objects_x_occurrences GROUP BY object_id) t2 ON t1.object_id = t2.object_id AND t1.edatetime = t2.max_date WHERE type_id = 201');
    $muster_new=0;
    $muster_assembly=0;
    $muster_assembled=0;
    $muster_primed=0;
    $muster_painting=0;
    $muster_battleready=0;
    $muster_detailing=0;
    $muster_paradeready=0;
    $muster_complete=0;
    while ($qr_muster->nextRow()) {
        $qr_label = $o_db->query('SELECT NAME FROM ca_occurrence_labels WHERE occurrence_id = '.$qr_muster->get("occurrence_id").'');
        $qr_label->nextRow();     
        $muster_status = $qr_label->get('NAME');
        if ($muster_status == "New") {
            $muster_new++;
        } elseif ($muster_status == "Assembly") {
            $muster_assembly++;
        } elseif ($muster_status == "Assembled") {
            $muster_assembled++;
        } elseif ($muster_status == "Primed") {
            $muster_primed++;
        } elseif ($muster_status == "Painting") {
            $muster_painting++;
        } elseif ($muster_status == "Battle Ready") {
            $muster_battleready++;
        } elseif ($muster_status == "Detailing") {
            $muster_detailing++;
        } elseif ($muster_status == "Parade Ready") {
            $muster_paradeready++;
        } elseif ($muster_status == "Complete") {
            $muster_complete++;
        }
    }
    $muster_data = "[".$muster_complete.",".$muster_paradeready.",".$muster_detailing.",".$muster_battleready.",".$muster_painting.",".$muster_primed.",".$muster_assembled.",".$muster_assembly.",".$muster_new."]";
?>
 
<script>
    var options = {
        stroke: { 
                show: false,
                width: 0,
            },
        chart: {
            type: 'pie',
            height: 85,
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
        colors: [],
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
      fontFamily: "inherit",
      height: 350,
      type: "radar",
      toolbar: {
        show: false,
      },
    },
    series: [{
      name: 'Model Count',
      data: <?php print $arms_counts; ?>,
    }],
    labels: <?php print $arms_labels; ?>,
    
    title: {
      text: ''
    },
    colors: ["#615dff"],

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

<script>
  var options_basic = {
    series: [
      {
        name: 'Model Count',
        data: <?php print $muster_data; ?>,
      },
    ],
    chart: {
      fontFamily: "inherit",
      type: "bar",
      height: 350,
      toolbar: {
        show: false,
      },
    },
    grid: {
      borderColor: "transparent",
    },
    colors: ["var(--bs-primary)"],
    plotOptions: {
      bar: {
        horizontal: true,
      },
    },
    dataLabels: {
      enabled: false,
    },
    xaxis: {
      categories: [
        "Complete",
        "Parade Ready",
        "Detailing",
        "Battle Ready",
        "Painting",
        "Primed",
        "Assembled",
        "Assembly",
        "New",
      ],
      labels: {
        style: {
          colors: [
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
          ],
        },
      },
    },
    yaxis: {
      labels: {
        style: {
          colors: [
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
            "#a1aab2",
          ],
        },
      },
    },
    tooltip: {
      theme: "dark",
    },
  };

  var chart_bar_basic = new ApexCharts(
    document.querySelector("#chart-bar-basic"),
    options_basic
  );
  chart_bar_basic.render();
  </script>
 
<!-- Aquistions -->
  <script>
  var earning = {
    chart: {
      id: "sparkline3",
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      group: "sparklines",
      fontFamily: "inherit",
      foreColor: "#adb0bb",
    },
    series: [
      {
        name: "Aquisitions",
        color: "var(--bs-secondary)",
        data: [25, 66, 20, 5, 12, 58, 20, 18, 0, 55, 10, 30],
      },
    ],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 0,
        inverseColors: false,
        opacityFrom: 0.15,
        opacityTo: 0,
        stops: [20, 180],
      },
      opacity: 0.5,
    },

    markers: {
      size: 0,
    },
    tooltip: {
      theme: "dark",
      fixed: {
        enabled: true,
        position: "right",
      },
      x: {
        show: false,
      },
    },
  };
  new ApexCharts(document.querySelector("#earning"), earning).render();
  </script>