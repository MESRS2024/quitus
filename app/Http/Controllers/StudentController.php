<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Redis;

class StudentController extends AppBaseController
{
    /** @var StudentRepository $studentRepository*/
    private $studentRepository;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepository = $studentRepo;
        if(!Redis::exists('CachedData'))
            $this->studentRepository->cacheKey();
    }

    /**
     * Display a listing of the Student.
     */
    public function index(Request $request)
    {
        return view('students.index');
    }

    /**
     * Display a listing of the Exonerated Student.
     */
    public function Exonerated(Request $request)
    {
        return view('students.detailed.exonerated-students-table');
    }

    /**
     * Display a listing of the not_exonerated Student.
     */
    public function not_exonerated(Request $request)
    {
        return view('students.detailed.not-exonerated-students-table');
    }


    /**
     * Show the form for creating a new Student.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created Student in storage.
     */
    public function store(CreateStudentRequest $request)
    {
        $input = $request->all();

        $student = $this->studentRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/students.singular')]));

        return redirect(route('students.index'));
    }

    /**
     * Display the specified Student.
     */
    public function show($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error(__('models/students.singular').' '.__('messages.not_found'));

            return redirect(route('students.index'));
        }

        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified Student.
     */
    public function edit($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error(__('models/students.singular').' '.__('messages.not_found'));

            return redirect(route('students.index'));
        }

        return view('students.edit')->with('student', $student);
    }

    /**
     * Update the specified Student in storage.
     */
    public function update($id, UpdateStudentRequest $request)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error(__('models/students.singular').' '.__('messages.not_found'));

            return redirect(route('students.index'));
        }

        $student = $this->studentRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/students.singular')]));

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified Student from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error(__('models/students.singular').' '.__('messages.not_found'));

            return redirect(route('students.index'));
        }

        $this->studentRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/students.singular')]));

        return redirect(route('students.index'));
    }
}
