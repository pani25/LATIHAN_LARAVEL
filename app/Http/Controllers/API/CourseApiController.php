<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CourseApiController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $data = [
            'message' => 'Sukses engambil API',
            'data' => $courses,
            'status' => 200,
        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $target_path = 'images/';
            $img_name =
                date('YmdHis') . '.' . $image->getClientOriginalExtension();
            // pindah file
            $image->move($target_path, $img_name);
            $input['image'] = $img_name;
        }
        $courses = Course::create($input);
        return response()->json([
            'message' => 'Sukses menambahkan data course',
            'data' => $courses,
            'status' => 200,
        ]);
    }

    public function show($id)
    {
        $courses = Course::findOrFail($id);
        return response()->json([
            'message' => 'Sukses mengambil data course',
            'data' => $courses,
            'status' => 200,
        ]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'course_name' => 'string|max:255',
            'price' => 'integer',
            'description' => 'string|max:255',
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

        $course->update($input);
        return response()->json([
            'message' => 'Sukses mengupdate data course',
            'data' => $course,
            'status' => 200,
        ]);
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json([
            'message' => 'Sukses menghapus data course',
            'status' => 200,
        ]);
    }
}
