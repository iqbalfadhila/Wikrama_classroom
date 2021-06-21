<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Rombel;
use App\Task;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('teacher.template.home');
    }

    public function index()
    {
        $tasks = Task::latest()->paginate(5);

        return view('teacher.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Teacher $teacher)
    {
        $rombel  = Rombel::orderBy('rombel', 'ASC')->get();
        $lesson  = Lesson::orderBy('lesson', 'ASC')->get();

        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        return view('teacher.task.create', compact('rombel', 'lesson', 'teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'teacher_id' => 'required',
            'rombel_id' => 'required',
            'lesson_id' => 'required',
            'upload' => 'required',
            'deadline' => 'required',
            'description' => 'required',
            'file' => 'nullable'
        ]);

        Task::create($request->all());

        return redirect()->route('teacher.task.index')->with('success', 'Data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombel, Lesson $lesson, Teacher $teacher, Task $task)
    {
        $rombel  = Rombel::orderBy('rombel', 'ASC')->get();
        $lesson  = Lesson::orderBy('lesson', 'ASC')->get();

        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        return view('teacher.task.edit', compact('rombel','lesson','teacher','task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'title' => 'required',
            'teacher_id' => 'required',
            'rombel_id' => 'required',
            'lesson_id' => 'required',
            'upload' => 'required',
            'deadline' => 'required',
            'description' => 'required',
            'file' => 'nullable'
        ]);

        $task->update($request->all());

        return redirect(route('teacher.task.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('teacher.task.index')
                        ->with('success', 'Task delete successfully');
    }
}
