<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class IController extends Controller
{
    // displaying paginator Form on the page
    public function display_pagi()
    {
        return view("display_form_pagination");
    }

    // Adding Data to the database
    public function form_submit(Request $request)
    {
        $this->validate($request, ['name' => 'required']);
        $this->validate($request, ['marks1' => 'required']);
        $this->validate($request, ['marks2' => 'required']);
        $this->validate($request, ['marks3' => 'required']);
        return back();
        $add = new Student;
        if ($request->isMethod('post')) {
            $add->name = $request->get('name');
            $add->marks1 = $request->get('marks1');
            $add->marks2 = $request->get('marks2');
            $add->marks3 = $request->get('marks3');
            $add->save();
        }
        return redirect("/display");
    }

    // Displaying data rom the database
    public function display_data()
    {
        $data = Student::paginate(5);
        return view('display_form_pagination', compact('data'));
    }

    // Deleting data from the database
    public function delete($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect("/display");
    }

    // Displaying data that we want to edit
    public function edit($id)
    {
        $data = Student::paginate(5);
        $edata = Student::where('id', $id)->get();
        return view('display_form', compact('data', 'edata'));
    }

    // Editing the data in the database
    public function edit_form_submit(Request $request, $id = '')
    {
        $add = Student::find($id);
        if ($request->isMethod('post')) {
            $add->name = $request->get('name');
            $add->marks1 = $request->get('marks1');
            $add->marks2 = $request->get('marks2');
            $add->marks3 = $request->get('marks3');
            $add->save();
        }
        return redirect("/display");
    }

    // Searching daata in the database
    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $name = $request->get('name');
            $data = Student::where('name', 'LIKE', '%' . $name . '%')->paginate(5);
        }
        return view('display_form', compact('data'));
    }
}
