<?php
class Common {

	public static function returnData($code = 200, $message = SUCCESS, $userId = '', $sessionId = '', $data = null)
	{
		return Response::json([
				'code' => $code,
				'message' => $message,
				'user_id' => $userId,
				'session_id' => $sessionId,
				'data' => $data,
			]);
	}
	public static function returnDataNotUser($data = null)
	{
		return Response::json(['data' => $data]);
	}
	public static function getSessionId($input, $userId)
	{
		$device = User::where('user_id', $userId)
						->first();
		if($device) {
			if(empty($input['session_id'])) {
				$sessionId = $device->session_id;
				if(!($sessionId)) {
					$sessionId = generateRandomString();
					User::find($device->id)->update(['session_id' => $sessionId]);
				}
			}
			else {
				if($device->session_id == $input['session_id']) {
					$sessionId = $input['session_id'];
				} else {
					throw new Prototype\Exceptions\UserSessionErrorException();
				}
			}
		} else {
			$sessionId = generateRandomString();
			User::create(['device_id'=>$input['device_id'], 'user_id'=>$userId, 'session_id'=>$sessionId]);
		}
		return $sessionId;
	}
	public static function getCategoryWithLike($input)
	{
		// $cats = Common::getListArray('Category', ['id', 'name']);
		$cats = Category::all();
		if($cats) {
			foreach($cats as $key => $value) {
				$data[$key] = [
					'id' => $value->id,
					'name' => $value->name,
				];				
			}
		}
		$data = array_merge(['0'=>array('id'=>0, 'name'=>'Home')], $data);
		return $data;
	}
}