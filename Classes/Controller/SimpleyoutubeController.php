<?php
class Tx_Simpleyoutube_Controller_SimpleyoutubeController extends Tx_Extbase_MVC_Controller_ActionController {
	public function initializeAction() {
    }
	/**
     * @return string The rendered view
     */
	public function indexAction() {
		$this->contentObj = $this->configurationManager->getContentObject();
   		
   		$data = $this->contentObj->data;
   		$code = $data['tx_simpleyoutube_code'];
    	$uid = $data['uid'];
    	
    	$this->view->assign('code', $code);
    	$this->view->assign('uid', $uid);

    	$this->view->assign('data', $data);
    }
}
?>