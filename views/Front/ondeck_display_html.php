<?php
    $o_db = new Db();
    $qr_ondeck = $o_db->query('SELECT * FROM ca_set_items WHERE set_id = 2');
?>

<?php
    while ($qr_ondeck->nextRow()) {
        $qr_wip_object = new ca_objects($qr_ondeck->get('row_id'));
        if (!$qr_wip_object->get('ca_object_representations.media.icon.url')) {
            $obj_img = "/themes/caiTS/assets/img/Locked.png";
        } else {
            $obj_img = $qr_wip_object->get('ca_object_representations.media.iconlarge.url');
        }
?>
        <div class="col-4">
            <a href="/index.php/Detail/objects/<?php print $qr_wip_object->get('ca_objects.object_id'); ?>">
                <img src="<?php print $obj_img; ?>" alt="modernize-img" class="rounded-1 img-fluid mb-9">
            </a>
        </div>
<?php
    }
?>