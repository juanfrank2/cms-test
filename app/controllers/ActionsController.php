<?php

class ActionsController extends BaseController {

	/**
	 * Action Repository
	 *
	 * @var Action
	 */
	protected $action;

	public function __construct(Action $action)
	{
		$this->action = $action;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$actions = $this->action->all();

		return View::make('actions.index', compact('actions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('actions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Action::$rules);

		if ($validation->passes())
		{
			$this->action->create($input);

			return Redirect::route('actions.index');
		}

		return Redirect::route('actions.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$action = $this->action->findOrFail($id);

		return View::make('actions.show', compact('action'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$action = $this->action->find($id);

		if (is_null($action))
		{
			return Redirect::route('actions.index');
		}

		return View::make('actions.edit', compact('action'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Action::$rules);

		if ($validation->passes())
		{
			$action = $this->action->find($id);
			$action->update($input);

			return Redirect::route('actions.show', $id);
		}

		return Redirect::route('actions.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->action->find($id)->delete();

		return Redirect::route('actions.index');
	}

}
