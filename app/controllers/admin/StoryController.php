<?php 

class StoryController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Story::whereNull('parent_id')->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.story.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.story.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required',
			'description' => 'required'
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('StoryController@create')
				->withErrors($validator);
		}else{
			$input['user_id'] = getIdUserAuth();
			$input['status']  = ACTIVE;
			Story::create($input);
			return Redirect::action('StoryController@index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = Story::where('parent_id', $id)->paginate(PAGINATE);
		return View::make('admin.story.view')->with(compact('data'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Story::find($id);
		return View::make('admin.story.edit')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('StoryController@edit')
				->withErrors($validator);
		}else{
			CommonNormal::update($id, $input);
			return Redirect::action('StoryController@index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
		return Redirect::action('StoryController@index');
	}


}
