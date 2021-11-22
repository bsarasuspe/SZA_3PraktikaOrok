<?php
	$fitxategia = "xml/liburuak.xml";
	$xml = simplexml_load_file($fitxategia);
	foreach($xml->liburua as $liburua){
		echo "id: $liburua[id] post: $_POST[id] || ";
		if($liburua['id'] == $_POST['id']){
			echo "Ezabatu";
			$dom=dom_import_simplexml($liburua);
        	$dom->parentNode->removeChild($dom);
        	$xml->asXML('xml/liburuak.xml');
		}
	}

header('Location: kudeatuliburuak.php?ezabatu=true');
?>