<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/representation_viewer_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2015-2022 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
$representation_count 			= $this->getVar('representation_count');
$representation_ids				= $this->getVar('representation_ids');
$show_annotations_mode			= $this->getVar('display_annotations');
$context						= $this->getVar('context');

$t_subject						= $this->getVar('t_subject');
$subject_id						= $t_subject->getPrimaryKey();

$slide_list = $this->getVar('slide_list');
?>
<div id="sync1" class="owl-carousel owl-theme">
<?php
	foreach ($representation_ids as $rep_id) {
		$rep_object = new ca_object_representations($rep_id);
?>
		<div class="item rounded-4 overflow-hidden">
			<a href="<?php print $rep_object->get('ca_object_representations.media.original.url'); ?>" data-lity>
				<img src="<?php print $rep_object->get('ca_object_representations.media.widepreview.url'); ?>" alt="" class="img-fluid">
			</a>
		</div>
<?php
	}
?>
</div>
<?php
	if ($representation_count > 1) {
		?>

<div id="sync2" class="owl-carousel owl-theme">
<?php
	foreach ($representation_ids as $rep_id) {
		$rep_object = new ca_object_representations($rep_id);
?>
		<div class="item rounded-4 overflow-hidden">
			<img src="<?php print $rep_object->get('ca_object_representations.media.largeicon.url'); ?>" alt="" class="img-fluid">
		</div>
<?php
	}
?>
</div>
<?php
	}
	?>