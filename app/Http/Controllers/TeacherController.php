<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Teacher;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Exports\TeacherExport;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(5);
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lesson $lesson)
    {
        $lesson = Lesson::orderBy('lesson', 'ASC')->get();
        return view('admin.teacher.create', compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nip' => 'required|string|min:8|max:8|unique:teachers',
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'lesson_id' => 'required',
            'religion' => 'required|in:islam,protestan,katolik,hindu,buddha,khonghucu',
            'gender' => 'required|in:L,P',
            'photo' => 'image|mimes:jpeg,png,jpg'
        ]);

        $data_teacher = collect($request->except(['photo', 'email', 'password', '_token', 'password_confirmation']));
        $data_user = collect($request->except(['nip', 'lesson_id', 'religion', 'gender', 'photo', 'password_confirmation', '_token']));

        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName . '_' . time() . '.' . $file->extension();

            $file->storeAs('public/photos/teacher', $fileName);

            $photo = $fileName;

            $data_teacher = $data_teacher->merge([
                'photo' => $photo
            ]);
        }

        $user = User::create($data_user->all());
        $user->assignRole('teacher');

        $data_teacher = $data_teacher->merge([
            'user_id' => $user->id
        ]);
        $teacher = Teacher::create($data_teacher->all());

        $user->update(['pemilik_id' => $teacher->id]);

        return redirect(route('admin.teacher.index'))->withSuccess('Teacher Create successfully!');
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
    public function edit(Teacher $teacher, Lesson $lesson)
    {
        $lesson = Lesson::orderBy('lesson', 'ASC')->get();
        return view('admin.teacher.edit', compact('teacher', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $this->validate($request, [
            // 'nip' => 'required|string|min:8|max:8|unique:teachers',
            'name' => 'required|string',
            'lesson_id' => 'required',
            'religion' => 'required|in:islam,protestan,katolik,hindu,buddha,khonghucu',
            'gender' => 'required|in:L,P',
            'photo' => 'image|mimes:jpeg,png,jpg'
        ]);

        try {
            if (request()->delete_photo) {
                File::delete(storage_path("app/public/photos/teacher/" . $teacher->photo));
            }
            $data = collect($request->except('photo', 'delete_photo'));
            if ($request->hasFile('photo')) {
                $file = $request->photo;
                $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName . '_' . time() . '.' . $file->extension();

                $file->storeAs('public/photos/teacher', $fileName);

                File::delete(storage_path("app/public/photos/teacher/" . $teacher->photo));

                $photo = $fileName;

                $data = $data->merge([
                    'photo' => $photo
                ]);
            }

            $teacher->update($data->all());
        } catch (\Exception $e) {
            return back()->with("error", "Something went wrong");
        }

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher Edit Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        try {
            User::where('pemilik_id', $teacher->id)->delete();
            $teacher->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => "Something went wront"]);
        }

        // return response()->json(['success' => "delete SuccessFully!"]);
        return redirect()->route('admin.teacher.index')
            ->with('success', 'Teacher delete Successfully!');
    }

    public function teacherexport()
    {
        return Excel::download(new TeacherExport, 'Teacher.xlsx');
    }
}
