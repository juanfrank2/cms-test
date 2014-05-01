<?php

class ScenariosController extends BaseController {

	/**
	 * Scenario Repository
	 *
	 * @var Scenario
	 */
	protected $scenario;

	public function __construct(Scenario $scenario)
	{
		$this->scenario = $scenario;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$scenarios = $this->scenario->all();

		return View::make('scenarios.index', compact('scenarios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('scenarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Scenario::$rules);

		if ($validation->passes())
		{
			$this->scenario->create($input);

			return Redirect::route('scenarios.index');
		}

		return Redirect::route('scenarios.create')
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
		$scenario = $this->scenario->findOrFail($id);

		return View::make('scenarios.show', compact('scenario'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$scenario = $this->scenario->find($id);

		if (is_null($scenario))
		{
			return Redirect::route('scenarios.index');
		}

		return View::make('scenarios.edit', compact('scenario'));
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
		$validation = Validator::make($input, Scenario::$rules);

		if ($validation->passes())
		{
			$scenario = $this->scenario->find($id);
			$scenario->update($input);

			return Redirect::route('scenarios.show', $id);
		}

		return Redirect::route('scenarios.edit', $id)
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
		$this->scenario->find($id)->delete();

		return Redirect::route('scenarios.index');
	}

}
