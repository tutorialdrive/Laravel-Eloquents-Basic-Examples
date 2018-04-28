<?php
namespace App\Http\Controllers;

use App\Studentboard;
use App\Model\College;
use App\Model\Priority;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\StudentResource as StudentResource;

class StudentboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['records'] = Studentboard::with(['college', 'category', 'priority'])->get();
        return view('student_board_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['colleges'] = College::all();
        $data['priorities'] = Priority::all();
        $data['categories'] = Category::all();
        return view('add_student_board_item', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'college_id' => 'required',
        ]);

        $record = new Studentboard();
        $record->title = $request['title'];
        $record->description = $request['description'];
        $record->category_id = $request['category_id'];
        $record->priority_id = $request['priority_id'];
        $record->college_id = $request['college_id'];
        $record->attachments = ($request->file('attachment')) ? $this->upload($request->file('attachment'), 'documents') : null;
        $record->posted_by = Auth::user()->name;
        // add other fields
        if ($record->save()) {
            \Session::flash('success', 'New record added.');
        } else {
            \Session::flash('error', 'Error while adding record.');
        }

        return redirect('/studentboard/add');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Studentboard  $studentboard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Studentboard::find($id)->delete()) {
            \Session::flash('success', 'Record removed.');
        } else {
            \Session::flash('error', 'Error while removing record.');
        }
        return redirect('/studentboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Studentboard  $studentboard
     * @return \Illuminate\Http\Response
     */
    public function show($studentboard)
    {
        $data['detail'] = Studentboard::where('id', $studentboard)->first();
        if ($data['detail']) {
            return view('view_student_board_item', $data);
        }else{
            return abort(404);
        }
    }

    private function upload($file, $location)
    {
        // Store document to given location
        return $file->store('public/' . $location);
    }
    
    public function getPostRecords($college){
        return new StudentResource(Studentboard::find($college));
    }
}
