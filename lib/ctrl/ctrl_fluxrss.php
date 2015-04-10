<?php
	class ControllerFluxRSS
	{
		
		/**
			Contructeur
		*/
		public function __construct($smarty, $modelFlux) {
			$flux = $modelFlux->getFlux();
			
			$fluxtpl = '';
			$count = 1;
			foreach($flux as $key=>$value){
				// CHargement du source XML
				$xml = new DOMDocument;
				$xml->load('xml/'.$value);

				$xsl = new DOMDocument;
				$xsl->load('xml/transfoRSS.xsl');

				// Configuration du transformateur
				$proc = new XSLTProcessor;
				$proc->importStyleSheet($xsl); // attachement des règles xsl

				$fluxtpl .= '<h1>'.$key.'</h1>';
				$fluxtpl .= $proc->transformToXML($xml);
				$fluxtpl = str_replace('@Lien@', 'Lien '.$count , $fluxtpl);
				$count++;
			}
		
			$smarty->assign('flux', $fluxtpl);
			$smarty->display('lib/view/templates/fluxrss.tpl');
		}
		
		
	}
?>