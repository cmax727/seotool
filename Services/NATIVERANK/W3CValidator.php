<?php                       
require_once 'Services/W3C/HTMLValidator.php';

class W3CValidator {

    private $page,$v,$r,$retArr,$tmpArr,$ErrArr,$WarnArr;
    
    public function __construct($page){
		$this->page = $page;
		$this->tmpArr = array();
		$this->retArr = array();
		$this->ErrArr = array();
		$this->WarnArr = array();
    }
    
    public function validate(){
		try
		{
			error_reporting(E_ERROR | E_PARSE);
		    $v = new Services_W3C_HTMLValidator();
		    $r = $v->validate($this->page);
		    if ($r === false) {
				$this->retArr["errors"] = 0;
				$this->retArr["warnings"] = 0;
				return $this->retArr;
		    }
		    if ($r->isValid()) {
				$this->retArr["errors"] = $this->ErrArr;
				$this->retArr["warnings"] = $this->WarnArr;
				return $this->retArr;
		    } else {
				if(count($r->warnings) > 0){
				    for ($i = 0; $i < count($r->warnings); $i++){
					$this->tmpArr["line"] = $r->warnings[$i]->line;
					$this->tmpArr["message"] = $r->warnings[$i]->message;
			    		$this->WarnArr[] = $this->tmpArr;
				    }
				}
				if(count($r->errors) > 0){
				    for ($i = 0; $i < count($r->errors); $i++){
					$this->tmpArr["line"] = $r->errors[$i]->line;
					$this->tmpArr["message"] = $r->errors[$i]->message;
			    		$this->ErrArr[] = $this->tmpArr;
				    }
				}
		    }
		} catch (Exception $e) {
			
		}
		$this->retArr["errors"] = $this->ErrArr;
		$this->retArr["warnings"] = $this->WarnArr;
		return $this->retArr;
    }
}
