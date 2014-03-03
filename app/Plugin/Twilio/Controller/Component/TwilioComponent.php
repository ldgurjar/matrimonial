<?php 
	App::import('Vendor', 'Twilio.Twilio');
	App::uses('Component', 'Controller');
	class TwilioComponent extends Component{
	
	public function startup(Controller $controller) 
    { 
        $this->Twilio = new Twilio();
    } 

	function sms($from, $to, $message)
	{
		$response = $this->Twilio->sms($from, $to, $message);
		return $response;
		//echo '<pre/>';
		//print_r($response);
		/*if($response->IsError)
			echo 'Error: ' . $response->ErrorMessage;
		else
			echo 'Sent message to ' . $to;*/
	}
}