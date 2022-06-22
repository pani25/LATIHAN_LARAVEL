<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $course = Course::all();
        $courses = Course::Paginate(2);
        // $courses = Course::onlyTrashed()->paginate(2);
        // dd($course);
        // return view('courses.index', [
        //     'courses' => $courses,
        // ]);

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
        // validasi data
        $request->validate([
            'course_name' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        // custom error message
        // $request->validate(
        //     [
        //         'course_name' => 'required|max:255'
        //     ],
        //     [
        //         'course_name.max' => 'Nama Course Harus diisi',
        //         'course_name.max' => 'Nama Course Maximal 255'
        //     ]);

        // logika gambar
        $input = $request->all();
        if ($image = $request->file('image')) {
            $target_path = 'images/';
            $img_name =
                date('YmdHis') . '.' . $image->getClientOriginalExtension();
            // pindah file
            $image->move($target_path, $img_name);
            $input['image'] = $img_name;
        }
        Course::create($input);
        return redirect()
            ->route('courses.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        // dd($request->all(), Course::find($course->id));
        //vaidasi data
        $request->validate([
            'course_name' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            unlink('images/' . $course->image);
            $target_path = 'images/';
            $img_name =
                date('YmdHis') . '.' . $image->getClientOriginalExtension();
            // pindah file
            $image->move($target_path, $img_name);
            $input['image'] = $img_name;
        } else {
            unset($input['image']);
        }

        // ini query update
        $course->update($input);
        return redirect()
            ->route('courses.index')
            ->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        // Model::delete();
        // metode destroy
        // if ($course->image) {
        //     unlink('images/' . $course->image);
        // }

        $course->delete();
        return redirect()
            ->route('courses.index')
            ->with('success', 'Data berasil dihapus');
    }

    // untuk restore data
    public function restrore($id)
    {
        Course::onlyTrashed()
            ->findOrFail($id)
            ->restore();
        return 'Berhasil di Restore';
    }
}
