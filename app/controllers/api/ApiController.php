<?php 

class ApiController extends BaseController {
	public function __construct() {
    	// $this->beforeFilter('@checkSessionId', array('except'=>array('postLogin','getLogin')));
    }
    public function checkLogin($input)
    {
        if (Auth::user()->attempt(Input::only('username', 'password'))){
            $userId = Auth::user()->get()->id;
            $sessionId = Common::getSessionId(Input::all(), $userId);
            return Common::returnData(200, SUCCESS, $userId, $sessionId);
        }
    }

}
