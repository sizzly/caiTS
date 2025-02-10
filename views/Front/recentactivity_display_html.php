<?php
    $o_db = new Db();
    $qr_activity = $o_db->query('SELECT * FROM ca_objects_x_occurrences ORDER BY edatetime DESC LIMIT 8');
?>

<ul class="timeline-widget mb-0 position-relative mb-n5">
<?php
    while ($qr_activity->nextRow()){
        $qr_object = new ca_objects($qr_activity->get('object_id'));
        $qr_occurrence = new ca_occurrences($qr_activity->get('occurrence_id'));
        $qr_edate = substr($qr_activity->get('edatetime'),0,13);
        $qr_time = substr_replace(substr_replace(substr_replace(substr_replace(substr($qr_edate,0,13),'/',4,1),'/',7,0),'T',10,0),':',13,0);
?>
        <li class="timeline-item d-flex position-relative overflow-hidden">
            <div class="timeline-time text-dark flex-shrink-0 text-end"><time class="timeago" datetime="<?php print $qr_time; ?>"><?php print $qr_time; ?></time></div>
            <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
            </div>
            <div class="timeline-desc fs-3 text-dark mt-n1"><a href="/index.php/Detail/objects/<?php print $qr_object->get('ca_objects.object_id'); ?>" class="text-decoration-none text-white"><?php print $qr_object->get('ca_objects.preferred_labels.name'); ?></a> &#8594; <?php print $qr_occurrence->get('ca_occurrences.preferred_labels.name'); ?></div>
        </li>
<?php
    }
?>
</ul>