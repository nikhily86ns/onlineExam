<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminLogin()
    {
        $totalsubject = Subject::all()->count();
        $totalquestion = Question::all()->count();
        $totaluser = User::where('is_admin','=',NULL)->count();
        $totalQuestionPaper = DB::table('questions')
                                    ->join('subjects', 'subjects.id','=','questions.subject_id')
                                    ->select('subjects.*')
                                    ->distinct('questions.subject_id')
                                    ->count();
        // print_r($totalquestion); die;
   
        if (isset($totalsubject) && isset($totalquestion)) 
        {
            $data['totalsubject'] =  $totalsubject;
            $data['totalquestion'] =  $totalquestion;
            $data['totaluser'] =  $totaluser;
            $data['totalQuestionPaper'] =  $totalQuestionPaper;
        } 
        else 
        {
            $data['totalsubject'] =  '00';
            $data['totalquestion'] =  '00';
            $data['totaluser'] =  $totaluser;
            $data['totalQuestionPaper'] =  '00';
        }

        return view('admin.dashboard', compact('data'));
    }


}
