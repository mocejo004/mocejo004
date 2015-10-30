<?php
	$galderak= simplexml_load_file('galderak.xml');
					$galdera= $galderak->addChild('assessmentItem');
					$galdera->addAttribute('complexity', '1');
					$galdera->addAttribute('subject', 'DEFINITUGABEA');
					$itemBody=$galdera->addChild('itemBody');
					$itemBody->addChild('p', 'froga');
					$correctResponse=$galdera->addChild('correctResponse');
					$correctResponse->addChild('value', 'froga');
					echo $galderak->asXML('galderak.xml');
					echo "Ondo txertatu da XML fitxategian:";
			
			?>