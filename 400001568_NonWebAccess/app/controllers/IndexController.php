<?php  
 
class IndexController extends Controller
{ 
	public function run():void
	{
		$this->setModel(new IndexModel());
		$this->setView(new View);
		$this->getView()->setTemplate("../../400001568_NonWebAccess/tpl/index.tpl.php");
		$this->getModel()->makeConnection();
		$this->getView()->addVar("popular",$this->getModel()->findMostPopular());
		$this->getView()->addVar("recommended",$this->getModel()->findRecommended());
		$this->getView()->display();
		
	}
}

?>