<?php

class ParametersController extends BaseController {

	/**
	 * Parameter Repository
	 *
	 * @var Parameter
	 */
	protected $parameter;

	public function __construct(Parameter $parameter)
	{
		$this->parameter = $parameter;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$parameters = $this->parameter->all();

		return View::make('parameters.index', compact('parameters'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('parameters.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Parameter::$rules);

		if ($validation->passes())
		{
			$this->parameter->create($input);

			return Redirect::route('parameters.index');
		}

		return Redirect::route('parameters.create')
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
		$parameter = $this->parameter->findOrFail($id);

		return View::make('parameters.show', compact('parameter'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$parameter = $this->parameter->find($id);

		if (is_null($parameter))
		{
			return Redirect::route('parameters.index');
		}

		return View::make('parameters.edit', compact('parameter'));
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
		$validation = Validator::make($input, Parameter::$rules);

		if ($validation->passes())
		{
			$parameter = $this->parameter->find($id);
			$parameter->update($input);

			return Redirect::route('parameters.show', $id);
		}

		return Redirect::route('parameters.edit', $id)
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
		$this->parameter->find($id)->delete();

		return Redirect::route('parameters.index');
	}

}
