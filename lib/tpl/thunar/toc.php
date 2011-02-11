<?php
function getToc(){
	global $ID;
	$except = array("admin", "revisions", "diff");
	if(in_array($_REQUEST["do"], $except)) return false;
	
	require_once(DOKU_INC.'inc/parserutils.php');
	
	$content = p_wiki_xhtml($ID);
	$start = "<div class=\"toc\">";
	$end = "</div>\n\n";
	
	
	$pattern = '@<div id="tocinside">.*?(</div>\n</div>)@s';
	preg_match($pattern, $content, $matches);
	return substr($matches[0], 20, -14);
} 
?>