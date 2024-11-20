<?php
	$t_item = $this->getVar("item");
	$va_comments = $this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
?>

<h1 class="page-header">{{{^ca_list_items.preferred_labels.name_singular}}}</h1>

{{{<ifdef code="ca_collections.description">
	^ca_list_items.description
</ifdef>}}}
