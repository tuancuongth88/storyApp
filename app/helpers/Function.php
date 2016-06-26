<?php
//get name file
function getFilename($filename = null)
{
	if($filename != '') {
		return pathinfo($filename, PATHINFO_FILENAME);
	}
	return null;
}

//get extension from filename
function getExtension($filename = null)
{
	if($filename != '') {
		return pathinfo($filename, PATHINFO_EXTENSION);
	}
	return null;
}

function getStatus($status){
		return $status == ACTIVE ? 'Kích hoạt': 'Chưa kích hoạt';
}

 function getnameParent($model, $id, $parent_id){
	if($parent_id)
	{
		$data = $model::find($parent_id)->name;

	return $data .'-'.$model::find($id)->name;
	}
	else
	{
		return $model::find($id)->name;
	}
}
function getIdUserAuth(){
	return Auth::user()->get()->id;
}

function generateRandomString($length = RANDOMSTRING) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}