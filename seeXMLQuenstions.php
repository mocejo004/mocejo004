<?php
    $niregalderak = simplexml_load_file('galderak.xml');
    foreach ($niregalderak as $galderainfo):
        $enuntziatua=$galderainfo->assessmentItem;
        $konplexutasuna=$galderainfo->complexity;
        $gaia=$galderainfo->subject;
		echo $enuntziatua;
        echo "<style type='text/css'>div:hover{background-color: yellow;}</style><li><div>Enuntziatua: ",$enuntziatua,"</div><div>Konplexutasuna: ",$konplexutasuna,"</div><div>Gaia: ",$gaia,"</div></li>";
    endforeach;
    echo "</ul>";
?>