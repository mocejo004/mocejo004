<?php
    $niregalderak = simplexml_load_file('galderak.xml');
	//print_r($niregalderak);
    foreach ($niregalderak as $galderainfo):
	    echo "<style type='text/css'>div:hover{background-color: yellow;}</style><p><div>Enuntziatua: ";
		$enuntziatua=$galderainfo->itemBody->p ;
		echo $enuntziatua;
		echo"<br>";
		foreach($galderainfo->attributes() as $a => $b) {
			echo $a,' : ',$b,"\n";
			echo"<br>";
		}
		echo"</div></p>---------------------------------";
    endforeach;
    echo "</ul>";
?>