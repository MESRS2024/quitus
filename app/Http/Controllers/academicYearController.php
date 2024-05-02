<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateacademicYearRequest;
use App\Http\Requests\UpdateacademicYearRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\academicYearRepository;
use Illuminate\Http\Request;
use Flash;

class academicYearController extends AppBaseController
{
    /** @var academicYearRepository $academicYearRepository*/
    private $academicYearRepository;

    public function __construct(academicYearRepository $academicYearRepo)
    {
        $this->academicYearRepository = $academicYearRepo;
    }

    /**
     * Display a listing of the academicYear.
     */
    public function index(Request $request)
    {
        return view('academic_years.index');
    }

    /**
     * Show the form for creating a new academicYear.
     */
    public function create()
    {
        return view('academic_years.create');
    }

    /**
     * Store a newly created academicYear in storage.
     */
    public function store(CreateacademicYearRequest $request)
    {
        $input = $request->all();

        $academicYear = $this->academicYearRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/academicYears.singular')]));

        return redirect(route('academic-years.index'));
    }

    /**
     * Display the specified academicYear.
     */
    public function show($id)
    {
        $academicYear = $this->academicYearRepository->find($id);

        if (empty($academicYear)) {
            Flash::error(__('models/academicYears.singular').' '.__('messages.not_found'));

            return redirect(route('academic-years.index'));
        }

        return view('academic_years.show')->with('academicYear', $academicYear);
    }

    /**
     * Show the form for editing the specified academicYear.
     */
    public function edit($id)
    {
        $academicYear = $this->academicYearRepository->find($id);

        if (empty($academicYear)) {
            Flash::error(__('models/academicYears.singular').' '.__('messages.not_found'));

            return redirect(route('academic-years.index'));
        }

        return view('academic_years.edit')->with('academicYear', $academicYear);
    }

    /**
     * Update the specified academicYear in storage.
     */
    public function update($id, UpdateacademicYearRequest $request)
    {
        $academicYear = $this->academicYearRepository->find($id);

        if (empty($academicYear)) {
            Flash::error(__('models/academicYears.singular').' '.__('messages.not_found'));

            return redirect(route('academic-years.index'));
        }

        $academicYear = $this->academicYearRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/academicYears.singular')]));

        return redirect(route('academic-years.index'));
    }

    /**
     * Remove the specified academicYear from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $academicYear = $this->academicYearRepository->find($id);

        if (empty($academicYear)) {
            Flash::error(__('models/academicYears.singular').' '.__('messages.not_found'));

            return redirect(route('academic-years.index'));
        }

        $this->academicYearRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/academicYears.singular')]));

        return redirect(route('academic-years.index'));
    }
}
