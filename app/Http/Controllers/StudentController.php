<?php

namespace App\Http\Controllers;

use App\Majors;
use App\Rayon;
use App\Rombel;
use App\Student;
use App\User;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Rayon $rayons, Majors $major, Rombel $rombel)
    {
        $rayon = Rayon::orderBy('rayon', 'ASC')->get();
        $major = Majors::orderBy('majors', 'ASC')->get();
        $rombel  = Rombel::orderBy('rombel', 'ASC')->get();

        return view('admin.student.create', compact('rayon', 'major', 'rombel'));
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
            'nis' => 'required|string|min:8|max:8|unique:students',
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rombel_id' => 'required',
            'majors_id' => 'required',
            'rayon_id' => 'required',
            'grade' => 'required|in:10,11,12',
            'religion' => 'required|in:islam,protestan,katolik,hindu,buddha,khonghucu',
            'gender' => 'required|in:L,P',
            'photo' => 'image|mimes:jpeg,png,jpg'
        ]);

        $data_student = collect($request->except(['photo', 'email', 'password', '_token', 'password_confirmation']));
        $data_user = collect($request->except(['nis', 'rombel_id', 'majors_id', 'rayon_id', 'kelas', 'agama', 'gender', 'photo', 'password_confirmation', '_token']));

        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName . '_' . time() . '.' . $file->extension();

            $file->storeAs('public/photos/student', $fileName);

            $photo = $fileName;

            $data_student = $data_student->merge([
                'photo' => $photo
            ]);
        }

        $user = User::create($data_user->all());
        $user->assignRole('student');

        $data_student = $data_student->merge([
            'user_id' => $user->id
        ]);

        $student = Student::create($data_student->all());

        $user->update(['pemilik_id' => $student->id]);

        return redirect(route('admin.student.index'))->withSuccess('Student Create successfully!');
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
    public function edit(Student $student, Rayon $rayons, Majors $major, Rombel $rombel)
    {
        $rayon = Rayon::orderBy('rayon', 'ASC')->get();
        $major = Majors::orderBy('majors', 'ASC')->get();
        $rombel  = Rombel::orderBy('rombel', 'ASC')->get();

        return view('admin.student.edit', compact('student', 'rayon', 'major', 'rombel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            // 'nis' => 'required|string|min:8|max:8|unique:students',
            'name' => 'required|string',
            'rombel_id' => 'required',
            'majors_id' => 'required',
            'rayon_id' => 'required',
            'grade' => 'required|in:10,11,12',
            'religion' => 'required|in:islam,protestan,katolik,hindu,buddha,khonghucu',
            'gender' => 'required|in:L,P',
            'photo' => 'image|mimes:jpeg,png,jpg'
        ]);

        try {
            if (request()->delete_photo) {
                File::delete(storage_path("app/public/photos/student/" . $student->photo));
            }
            $data = collect($request->except('photo', 'delete_photo'));
            if ($request->hasFile('photo')) {
                $file = $request->photo;
                $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName . '_' . time() . '.' . $file->extension();

                $file->storeAs('public/photos/student', $fileName);

                File::delete(storage_path("app/public/photos/student/" . $student->photo));

                $photo = $fileName;

                $data = $data->merge([
                    'photo' => $photo
                ]);
            }

            $student->update($data->all());
        } catch (\Exception $e) {
            return back()->with("error", "Something went wrong");
        }

        return redirect()->route('admin.student.index')->with('success', 'Student Edit Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            User::where('pemilik_id', $student->id)->delete();
            $student->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => "Something went wront"]);
        }

        // return response()->json(['success' => "delete SuccessFully!"]);
        return redirect()->route('admin.student.index')
            ->with('success', 'Student delete Successfully!');
    }
}
