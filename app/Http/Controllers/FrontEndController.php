<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Result;
use App\Models\Option;
use DB;

class FrontEndController extends Controller
{

// Function to View Exam Page 

    public function viewExam()
    {
        // $data = Subject::all();
        $data = DB::table('questions')
                ->join('subjects', 'subjects.id','=','questions.subject_id')
                ->select('subjects.*')
                ->distinct('questions.subject_id')
                ->get();
        return view('viewExam', compact('data'));
    }

// Function to Join Exam

    public function joinExam($id)
    {
        $data = DB::table('subjects')
                ->join('questions','subjects.id','=','questions.subject_id')
                ->select('questions.*','subjects.subject as subject_name','subjects.id as subject_id')
                ->where('subjects.id','=',$id)
                ->get();
        $subject = Subject::where('id','=',$id)->get();
                // print_r($data[0]->question); die;
        return view('joinExam', compact('data','subject'));
    }

// Function to Submit Exam

    public function submitExam(Request $request)
    {
        $data = $request->all();
        $count = 0;
        $ans = [];
        for($i=1; $i<=$request->index; $i++)
        {
            if(isset($data['question'.$i]) && isset($data['option'.$i]))
            {
                $question = Question::where('id',$data['question'.$i])->first();
                
                if($question->answer ==  $data['option'.$i])
                {
                    $count++;
                }
                else
                {
                    $count;
                }
            }
                
                // array_push($ans,  $data['option'.$i]);
                if (isset($data['option'.$i])) {
                    array_push($ans,$data['option'.$i]); 
                } else {
                    array_push($ans,'Not Answered'); 
                }
                
        }

        $option = new Option();
        $option->option = json_encode($ans);
        $option->subject_id = $request->subject_id;
        $option->user_id = $request->user_id;
        $option->save();

        $result = $count/$request->index;
        $result = $result * 100;
        $result = round($result, 2);
        
        $res = new Result();
        $res->subject_id = $request->subject_id;
        $res->user_id = $request->user_id;
        $res->result = $result;
        $res->save();

        $answer = DB::table('subjects')
                        ->join('questions','subjects.id','=','questions.subject_id')
                        ->select('questions.*','subjects.subject as subject_name')
                        ->where('subjects.id','=',$request->subject_id)
                        ->get();
        $answer->option = $option->option;
        

        return view('result', compact('result','answer'));
    }

}
