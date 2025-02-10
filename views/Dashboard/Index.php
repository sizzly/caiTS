<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": Dashboard");

?>
<!-- Hero Image -->
<div class="card">
<?php

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
</div>