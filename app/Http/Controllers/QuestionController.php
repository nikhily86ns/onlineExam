<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use DB;

class QuestionController extends Controller
{

// Function To View Exams Page 

    public function subject()
    {
        $data = Subject::all();
        return view('admin.subject', compact('data'));
    }

// Function to Delete Exam Name

    public function deleteSubject($id)
    {
        Subject::find($id)->delete();
        return redirect()->route('admin.subject');
    }

// Function to Create Exam

    public function createSubject(Request $request)
    {
        $subject = new Subject();
        $subject->subject = $request->subject;
        $subject->save();

        return redirect()->route('admin.subject');
    }

// Function to view Create Question Page With All Exam Name

    public function paper()
    {
        $data = Subject::all();
        return view('admin.paper',compact('data'));
    }

// Function Create Question With Exam Name

    public function createQuestion(Request $request)
    {
        $request->validate([
            "subject" => "required",
            "question" => "required",
            "a" => "required",
            "b" => "required",
            "c" => "required",
            "d" => "required",
            "answer" => "required",
        ]);
        
        $question = new Question();
        $question->question = $request->question;
        $question->a = $request->a;
        $question->b = $request->b;
        $question->c = $request->c;
        $question->d = $request->d;
        $question->answer = $request->answer;
        $question->subject_id = $request->subject;
        $question->save();

        return redirect()->route('admin.paper');
    }

// Function to View All Question Papers

    public function question()
    {
        $data = Subject::all();
        return view('admin.viewPaper',compact('data'));
    }

// Function to view Questions of that exam

    public function viewquestion($id)
    {
        $data = DB::table('subjects')
                ->join('questions','subjects.id','=','questions.subject_id')
                ->select('questions.*','subjects.subject as subject_name')
                ->where('subjects.id','=',$id)
                ->get();
        return view('admin.questionPaper', compact('data'));
    }   

// Function TO delete Question

    public function deleteQuestion($id)
    {
        Question::find($id)->delete();
        // return redirect()->route('admin.viewPaper');
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

// Function to Edit Question

    public function editQuestion($id)
    {
        $data = Subject::all();
        $question = Question::where('id','=',$id)->first();
        return view('admin.updateQuestion', compact('data','question'));
    }

// Function to Update Question

    public function updateQuestion(Request $request)
    {
        Question::where('id', $request->id)->update(['question' => $request->question ,
                                                    'a' => $request->a ,
                                                    'b' => $request->b,
                                                    'c' => $request->c,
                                                    'd' => $request->d,
                                                    'answer' => $request->answer,
                                                ]);
                                                
        return redirect()->route('admin.viewquestion', ['id' => $request->subject_id]);
        // return redirect()->route('profile', ['id' => 1]);
    }

// Function to view Result of Exam

    public function viewResult()
    {
        $data = DB::table('results')
                        ->join('users','results.user_id','=','users.id')
                        ->join('subjects','subjects.id','=','results.subject_id')
                        ->select('results.result','subjects.subject','users.*')
                        ->orderBy('results.created_at', 'DESC')
                        ->get();
        return view('admin.result',compact('data'));
    }

// Function to view Candidate Details who perofrm Exam

    public function viewResultDetail($id)
    {
        $data = User::where('id','=',$id)->first();
        return response()->json(['data'=>$data]);
    }

}
