<?php
 class ajaxResponse{
		public $responseCode; // 0 all ok - 1 some errors - -1 some warning
		public $data;
		
		function ajaxResponse($responseCode = 1,
								$data = null){
			$this->responseCode = $responseCode;
			$this->data = $data;
		}
	
	}
    
    function setresponse($ok,$result){
        $myresponse = new ajaxResponse($ok,$result);
        return $myresponse;
    }
?>