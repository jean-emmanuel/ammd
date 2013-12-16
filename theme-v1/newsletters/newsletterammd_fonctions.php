<?php

require 'inlinestyle/autoload.php';
use \InlineStyle\InlineStyle;
libxml_use_internal_errors(true);

	function inline($texte) {
		$htmldoc = new InlineStyle($texte);
		$htmldoc->applyStylesheet($htmldoc->extractStylesheets());
		$html = $htmldoc->getHTML();

		$html = str_replace('noscript','style',$html);

		return $html;
	}
?>
