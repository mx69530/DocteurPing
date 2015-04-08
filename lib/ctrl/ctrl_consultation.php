<?php
	class ControllerConsultation
	{
		private $_repo;
		private $_smarty;
		
		public function __construct($smarty, $repo) {
			$this->_repo = $repo;
			$keywords = '';
			
			if(($_SESSION['pseudo'])){
				$keywords .= '<h3>Mots-clef : </h3>';
				$keywords .= '<input class="groupBox" type="text" name="keyword" value="'.$this->getCurrentKeywords().'">';	
			}
			$smarty->assign('keywords', $keywords);
			
			$meridians = '';
			$checkeds = $this->getSelectedMeridians();
			$datas = $this->getMeridianNames();
			foreach($datas as $key=>$element){
				$meridians .= '<span class="ckBox"><label title="meridian'.$key.'" for="meridian'.$key.'"><input title="meridian'.$key.'" id="meridian'.$key.'" type="checkbox" name="meridian'.$key.'" ';
				foreach($checkeds as $checked){
					if($checked === $element){
						$meridians .= "checked ";
					}
				}
				$meridians .= 'value="'.$element.'"/>'.$element.'</label></span>';
			}
			$smarty->assign('meridians', $meridians);
			
			$pathologies = '';
			$checkeds = $this->getSelectedPathologyTypes();
			$datas = array('méridien', 'organe/viscère', 'luo', 'merveilleux vaisseaux', 'jing jin');
			foreach($datas as $key=>$element){
				$pathologies .= '<span class="ckBox"><label><input type="checkbox" name="pathologyType'.$key.'" ';
				foreach($checkeds as $checked){
					if($checked === $element){
						$pathologies .= "checked ";
					}
				}
				$pathologies .= 'value="'.$element.'">'.$element.'</label></span>';
			}
			$smarty->assign('pathologies', $pathologies);
			
			$features = '';
			$checkeds = $this->getSelectedFeatures();
			$datas = array('plein', 'chaud', 'vide', 'froid', 'interne', 'externe');
			foreach($datas as $key=>$element){
				$features .= '<span class="ckBox"><label><input title="feature'.$key.'" type="checkbox" name="feature'.$key.'" ';
				foreach($checkeds as $checked){
					if($checked === $element){
						$features .= "checked ";
					}
				}
				$features .= 'value="'.$element.'">'.$element.'</label></span>';
			}
			$smarty->assign('features', $features);
			
			$results = '';
			$datas = $this->getSearchedPathologies();
			if(isset($_GET['process']) && $_GET['process']=='search'){
				$results .= '<h2>Résultats:</h2>';
				$results .= '<table title="Resultats recherche" class="resultPatho">';
				$results .= '<tr>';
				$results .= '<td>Description</td>';
				$results .= '<td>Meridien</td>';
				$results .= '<td>Symptomes</td>';
				$results .= '</tr>';
				foreach($datas as $element){
					$results .=  '<tr>'.
							'<td>'.$element->getdesc().'</td>'.
								'<td>'.
								'<br>Nom : '.$element->getmeridian()->getname().
								'<br>Catégorie : '.$element->getmeridian()->getyin().
								'</td>'.
							'<td>';
					foreach($element->getsymptoms() as $element2){
						$results .=  '<br>'.$element2->getdesc();
					}
					$results .=  '</td>';
					$results .=  '</tr>';
				}
				$results .= '</table>';
			}
			$smarty->assign('results', $results);
			
			$smarty->display('lib/view/templates/consultation.tpl');
		}
		
		public function getCurrentKeywords(){
			if(!isset($_POST['keyword'])){
				return '';
			}else{
				return $_POST['keyword'];
			}
		}
		
		public function getMeridianNames(){
			$meridians = $this->_repo->getMeridians();
			$meridianNames = array();
			foreach($meridians as $meridian){
				array_push($meridianNames, $meridian->getName());
			}
			return $meridianNames;
		}
		
		
		
		public function getSelectedMeridians(){
			$result = array();
			foreach($_POST as $key=>$value){
				if(substr($key, 0, 8) === 'meridian'){
					array_push($result, $value);
				}
			}
			
			return $result;
		}
		
		public function getSelectedPathologyTypes(){
			$result = array();
			foreach($_POST as $key=>$value){
				if(substr($key, 0, 13) === 'pathologyType'){
					array_push($result, $value);
				}
			}
			return $result;
		}
		
		public function getSelectedFeatures(){
			$result = array();
			foreach($_POST as $key=>$value){
				if(substr($key, 0, 7) === 'feature'){
					array_push($result, $value);
				}
			}
			return $result;
		}
		
		public function getSearchedPathologies(){
			if (!isset($_GET["process"]) || $_GET["process"] != "search"){
				return array();
			}

			$meridians = array();
			$pathologyTypes = array();
			$features = array();
			
			if(!isset($_POST['keyword'])){
				$keyword = '';
			}else{
				$keyword = $_POST['keyword'];
			}
						
			foreach($_POST as $key=>$value){
				if(substr($key, 0, 8) === 'meridian'){
					array_push($meridians, $value);
				}else if(substr($key, 0, 13) === 'pathologyType'){
					array_push($pathologyTypes, $value);
				}else if(substr($key, 0, 7) === 'feature'){
					array_push($features, $value);
				}
			}
			$datas = $this->_repo->findPathologyWithFilters($keyword, $meridians, $pathologyTypes, $features);
			$pathologies = $datas;
			return $pathologies;
		}
	}
?>
