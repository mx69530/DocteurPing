<?php
	class ControllerFooter
	{
		private $_repo;
		private $_smarty;
		
		public function __construct($smarty, $repo) {
			$smarty->display('lib/view/templates/footer.tpl');
		}
		
	}
?>
