<?php
    $o_db = new Db();
    $qr_collections = $o_db->query('SELECT collection_id FROM ca_collections WHERE deleted=0 AND parent_id IS NULL');
?>

<?php

    while ($qr_collections->nextRow()){
        $col_object = new ca_collections($qr_collections->get('collection_id'));
?>
        <div class="col-md-3 col-6 mb-4">
        <a class="m-1 d-flex align-items-center justify-content-center bg-theme bg-opacity-15 rounded-3 round-54 shadow text-decoration-none h-70px w-70px" href="/index.php/Detail/collections/<?php print $col_object->get('ca_collections.collection_id'); ?>" data-bs-toggle="tooltip" data-bs-title="<?php print $col_object->get('ca_collections.preferred_labels.name'); ?>">
<?php
            if(!($col_img = $col_object->get('ca_collections.collection_media.media.tiny.url'))) {
                print '<i class="ti ti-sitemap display-5"></i>';

            }else{
?>
                <img src="<?php print $col_object->get('ca_collections.collection_media.media.tiny.url'); ?>" class="rounded">
<?php
            }
?>  
        </a>
        </div>
<?php
    }
?>