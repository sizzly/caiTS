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

    
    $start = new DateTime;
    $start->setDate($start->format('Y'), $start->format('n'), 1); // Normalize the day to 1
    $start->setTime(0, 0, 0); // Normalize time to midnight
    $start->sub(new DateInterval('P12M'));
    $interval = new DateInterval('P1M');
    $recurrences = 12;
    $limit = 0;
    $count = 1;
    $month01 = 0;
    $month02 = 0;
    $month03 = 0;
    $month04 = 0;
    $month05 = 0;
    $month06 = 0;
    $month07 = 0;
    $month08 = 0;
    $month09 = 0;
    $month10 = 0;
    $month11 = 0;
    $month12 = 0;
    foreach (new DatePeriod($start, $interval, $recurrences, true) as $date) {
        if ($count == 1) {
            $limit =$date->format('Y.m');
            $month01 = $date->format('Y.m');
        } elseif ($count == 2) {
            $month02 = $date->format('Y.m');
        } elseif ($count == 3) {
            $month03 = $date->format('Y.m');
        } elseif ($count == 4) {
            $month04 = $date->format('Y.m');
        } elseif ($count == 5) {
            $month05 = $date->format('Y.m');
        } elseif ($count == 6) {
            $month06 = $date->format('Y.m');
        } elseif ($count == 7) {
            $month07 = $date->format('Y.m');
        } elseif ($count == 8) {
            $month08 = $date->format('Y.m');
        } elseif ($count == 9) {
            $month09 = $date->format('Y.m');
        } elseif ($count == 10) {
            $month10 = $date->format('Y.m');
        } elseif ($count == 11) {
            $month11 = $date->format('Y.m');
        } elseif ($count == 12) {
            $month12 = $date->format('Y.m');
        }
        $count++;
    }

    $o_db = new Db();

    $qr_workflow = $o_db->query('SELECT * FROM ca_objects_x_occurrences WHERE sdatetime > '.$limit.' AND type_id = 201');
    $workflowmonth01 = 0;
    $workflowmonth02 = 0;
    $workflowmonth03 = 0;
    $workflowmonth04 = 0;
    $workflowmonth05 = 0;
    $workflowmonth06 = 0;
    $workflowmonth07 = 0;
    $workflowmonth08 = 0;
    $workflowmonth09 = 0;
    $workflowmonth10 = 0;
    $workflowmonth11 = 0;
    $workflowmonth12 = 0;
    $acquiremonth01 = 0;
    $acquiremonth02 = 0;
    $acquiremonth03 = 0;
    $acquiremonth04 = 0;
    $acquiremonth05 = 0;
    $acquiremonth06 = 0;
    $acquiremonth07 = 0;
    $acquiremonth08 = 0;
    $acquiremonth09 = 0;
    $acquiremonth10 = 0;
    $acquiremonth11 = 0;
    $acquiremonth12 = 0;
    while ($qr_workflow->nextRow()) {
        $qr_label_workflow = $o_db->query('SELECT NAME FROM ca_occurrence_labels WHERE occurrence_id = '.$qr_workflow->get("occurrence_id").'');
        $qr_label_workflow->nextRow(); 
        if ($qr_label_workflow->get('NAME') == "New") {
            $newobject = 1;
        } elseif ($qr_label_workflow->get('NAME') == "Document/Print Acquired") {
            $newobject = 1;
        } else {
            $newobject = 0;
        }
        if ($month01 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth01++;
            }
            $workflowmonth01++;
        } elseif ($month02 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth02++;
            }
            $workflowmonth02++;
        } elseif ($month03 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth03++;
            }
            $workflowmonth03++;
        } elseif ($month04 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth04++;
            }
            $workflowmonth04++;
        } elseif ($month05 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth05++;
            }
            $workflowmonth05++;
        } elseif ($month06 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth06++;
            }
            $workflowmonth06++;
        } elseif ($month07 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth07++;
            }
            $workflowmonth07++;
        } elseif ($month08 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth08++;
            }
            $workflowmonth08++;
        } elseif ($month09 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth09++;
            }
            $workflowmonth09++;
        } elseif ($month10 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth10++;
            }
            $workflowmonth10++;
        } elseif ($month11 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth11++;
            }
            $workflowmonth11++;
        } elseif ($month12 == substr($qr_workflow->get('sdatetime'),0,7)) {
            if ($newobject == 1) {
                $acquiremonth12++;
            }
            $workflowmonth12++;
        }
    }
    $workflow_data = "[".$workflowmonth01.",".$workflowmonth02.",".$workflowmonth03.",".$workflowmonth04.",".$workflowmonth05.",".$workflowmonth06.",".$workflowmonth07.",".$workflowmonth08.",".$workflowmonth09.",".$workflowmonth10.",".$workflowmonth11.",".$workflowmonth12."]";
    $acquire_data = "[".$acquiremonth01.",".$acquiremonth02.",".$acquiremonth03.",".$acquiremonth04.",".$acquiremonth05.",".$acquiremonth06.",".$acquiremonth07.",".$acquiremonth08.",".$acquiremonth09.",".$acquiremonth10.",".$acquiremonth11.",".$acquiremonth12."]";

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
        data: <?php print $acquire_data; ?>,
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

  <script>
     var projects = {
    series: [
      {
        name: "",
        data: <?php print $workflow_data; ?>,
      },
    ],
    chart: {
      type: "bar",
      fontFamily: "inherit",
      foreColor: "#adb0bb",
      height: 70,

      resize: true,
      barColor: "#fff",
      toolbar: {
        show: false,
      },
      sparkline: {
        enabled: true,
      },
    },
    colors: ["var(--bs-primary)"],
    grid: {
      show: false,
    },
    plotOptions: {
      bar: {
        horizontal: false,
        startingShape: "flat",
        endingShape: "flat",
        columnWidth: "60%",
        barHeight: "20%",
        endingShape: "rounded",
        distributed: true,
        borderRadius: 2,
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      show: true,
      width: 2.5,
      colors: ["rgba(0,0,0,0.01)"],
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
      labels: {
        show: false,
      },
    },
    yaxis: {
      labels: {
        show: false,
      },
    },
    axisBorder: {
      show: false,
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontSize: "12px",
      },
      x: {
        show: false,
      },
    },
  };

  var chart_column_basic = new ApexCharts(
    document.querySelector("#projects"),
    projects
  );
  chart_column_basic.render();
  </script>