<?php 

class LoginController extends BaseController {

	public function postLogin()
	{
		$input = Input::all();
		return $this->checkLogin($input);
	}

	public function getLogin()
	{
		return Common::returnData(200, SUCCESS);
	}
	public function loginSocial()
	{
		$input = Input::all();
		$user = User::where('facebook_id', $input['facebook_id'])
			->where('google_id', $input['google_id'])
			->first();
		if (!$user) {
			$sessionId = generateRandomString();
			$userId = User::create([
					'username' => $input['username'],
					'facebook_id' => $input['facebook_id'],
					'google_id' => $input['google_id'],
					'status' => INACTIVE,
				])->id;
			Device::create([
					'user_id' => $userId,
					'session_id' => $sessionId,
					'device_id' => $input['device_id'],
				]);
		}
		else {
			$userId = $user->id;
			$sessionId = Common::getSessionId($input, $userId);
		}
		return Common::returnData(200, SUCCESS, $userId, $sessionId);
	}

}
