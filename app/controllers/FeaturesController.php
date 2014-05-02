<?php

class FeaturesController extends BaseController {

	/**
	 * Feature Repository
	 *
	 * @var Feature
	 */
	protected $feature;
    protected $group;

	public function __construct(Feature $feature, Group $group)
	{
		$this->feature = $feature;
        $this->group = $group;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$features = $this->feature->all();

		return View::make('features.index', compact('features'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $groups = $this->group->all();

        $groupList = array();

        foreach ($groups as $gr){
            $groupList[$gr->id] = $gr->name;
        }
		return View::make('features.create')->with('listado', $groupList);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Feature::$rules);

		if ($validation->passes())
		{
			$this->feature->create($input);

			return Redirect::route('features.index');
		}

		return Redirect::route('features.create')
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
		$feature = $this->feature->findOrFail($id);

		return View::make('features.show', compact('feature'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$feature = $this->feature->find($id);

		if (is_null($feature))
		{
			return Redirect::route('features.index');
		}

		return View::make('features.edit', compact('feature'));
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
		$validation = Validator::make($input, Feature::$rules);

		if ($validation->passes())
		{
			$feature = $this->feature->find($id);
			$feature->update($input);

			return Redirect::route('features.show', $id);
		}

		return Redirect::route('features.edit', $id)
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
		$this->feature->find($id)->delete();

		return Redirect::route('features.index');
	}

}
