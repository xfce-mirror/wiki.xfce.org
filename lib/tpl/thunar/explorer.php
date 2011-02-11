<?php


/**
 * Afficher un dossier
 * @param $dataList Le contenu du dossier en array
 */
function tpl_list_folder($dataList){
	global $conf;
	global $ID;
	global $INFO;
	
	require_once(DOKU_INC.'inc/auth.php');
	
	$currentLevel = 1;
	
	$pathinfo = pathinfo($_SERVER['REQUEST_URI']);
	$url = $pathinfo['dirname'];
	
	echo "<ul class=\"explorer\">\n";
	for($i=0; $i<count($dataList); $i++){		
		
		// Permission
		if($dataList[$i]["type"] == "d"){
			$perm = auth_quickaclcheck($dataList[$i]["id"].":*");
		}else{
			$perm = auth_quickaclcheck($dataList[$i]["id"]);
		}
		
		if($perm > 0){
		
			// Nom du lien
			$firstHeading = p_get_first_heading($dataList[$i]["id"]);
			if($conf['useheading'] && $dataList[$i]["type"] == "f" && !empty($firstHeading)){
				$linkName = $firstHeading;
			}else{
				$linkName = split(":", $dataList[$i]["id"]);
				$linkName = $linkName[count($linkName) - 1];
				$linkName = str_replace("_", " ", $linkName);
			}
			
			// On vérifie qu'on est dans le bon level
			if($currentLevel > $dataList[$i]["level"]){
				echo str_repeat("</ul></li>\n", $currentLevel - $dataList[$i]["level"]);
				$currentLevel = $dataList[$i]["level"];
			}
			
			// Affichage
			if($dataList[$i]["type"] == "d"){
				// dossier
				if($dataList[$i]["open"]){
					echo "<li class=\"folderopen\">";
				}else{
					echo "<li class=\"folder\">";
				}
				
				if($_REQUEST["do"] == "admin" && $_REQUEST["page"] == "acl"){
					$path = wl($dataList[$i]["id"].":".$conf['start'], "do=admin&amp;page=acl");
				}else{
					$path = wl($dataList[$i]["id"].":".$conf['start']);
				}
				tpl_link($path,$linkName);
			}else{
				// fichier
				echo "<li class=\"file\">";
				if($dataList[$i]["id"] == $ID){
					// Page affichée
					echo "<strong>";
				}
				if($_REQUEST["do"] == "admin" && $_REQUEST["page"] == "acl"){
					$path = wl($dataList[$i]["id"], "do=admin&amp;page=acl");
				}else{
					$path = wl($dataList[$i]["id"]);
				}
				tpl_link($path,$linkName);
				
				if($dataList[$i]["id"] == $ID){
					// Page affichée
					echo "</strong>";
				}
			}
			
			if($dataList[$i+1]["level"] == $currentLevel){
				// dossier courant
				echo "</li>\n";
			}else if($dataList[$i+1]["level"] > $currentLevel){
				// Nouveau sous dossier
				echo "<ul>\n";
			}else if($dataList[$i+1]["level"] < $currentLevel){
				// Fin du dossier
				if(!empty($dataList[$i+1]["level"])){
					echo str_repeat("</ul></li>\n", $currentLevel - $dataList[$i+1]["level"]);
				}
			}
			$currentLevel = $dataList[$i+1]["level"];
		}
	}
	echo "</ul>\n";
}

/**
 * Afficher l'explorateur
 */
function tpl_explorer() {
	global $ID;
	global $ACT;
	global $conf;
	
	
	$folder = getNS($ID);
	
	require_once(DOKU_INC.'inc/search.php');
	require_once(DOKU_INC.'inc/html.php');
	
	$ns  = cleanID($ID);	
	if(empty($ns)){
		$ns = dirname(str_replace(':','/',$ID));
		if($ns == '.') $ns ='';
	}
	$ns  = utf8_encodeFN(str_replace(':','/',$ns));
	
	$list = array();
	search($list,$conf['datadir'],'search_index',array('ns' => $ns));
	
	tpl_list_folder($list);
}
?>
