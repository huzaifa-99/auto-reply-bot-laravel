<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\User;
use App\Question;
use App\Newquestion;
use App\Message;
use App\Events\NewMessage;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function subjectsIndex()
    {
    	$subjects = Subject::all();

    	return view('admin.subjects',[
            'subjects' => $subjects
        ]);

    }

    public function subjecttogglestatus(Request $request)
    {
       
        if($request->toggler==1){
            $subjects = Subject::where('id',$request->subjectId)->update(['is_active' => 0 ]);
        }
        elseif($request->toggler==0){
            $subjects = Subject::where('id',$request->subjectId)->update(['is_active' => 1 ]);
        }
        else{
            return 'Error';
        }
        return redirect()->back();

    }

    public function addnewsubject(Request $request)
    {

        if($request->subject==null){
            return redirect()->back();
        }

        
        $subject=Subject::insert(array(
            'name' => $request->subject,
            'registered_by_admin' => auth()->user()->name,
            'created_at' => now(),
            'updated_at' => now()
        ));

    	return redirect()->back();

    }

    public function usersIndex()
    {
        
        $users = User::all();

        return view('admin.users',[
            'users' => $users
        ]);

    }

    public function userstogglestatus(Request $request)
    {
        
        if($request->toggler==1){
            $subjects = User::where('id',$request->userId)->update(['is_active' => 0 ]);
        }
        elseif($request->toggler==0){
            $subjects = User::where('id',$request->userId)->update(['is_active' => 1 ]);
        }
        else{
            return 'Error';
        }
        
        return redirect()->back();

    }

    public function addnewuser(Request $request)
    {
        
        $user=User::insert(array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'created_at' => now(),
            'updated_at' => now()
        ));

        return redirect()->back();

    }


    public function qandaIndex()
    {
        
        $q_and_a = Question::all();

        return view('admin.q_and_a',[
            'q_and_a' => $q_and_a
        ]);

    }

    public function qandatogglestatus(Request $request)
    {
        
        if($request->toggler==1){
            $q_and_a = Question::where('id',$request->qandaId)->update(['is_active' => 0 ]);
        }
        elseif($request->toggler==0){
            $q_and_a = Question::where('id',$request->qandaId)->update(['is_active' => 1 ]);
        }
        else{
            return 'Error';
        }
        return redirect()->back();

    }

    public function addnewqanda(Request $request)
    {
        
        $q_and_a=Question::insert(array(
            'subject' => $request->subject,
            'question' => $request->question,
            'answer' => $request->answer,
            'uploaded_by_admin' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now()
        ));

        return redirect()->back();

    }


    public function newquestionsIndex()
    {
        
        $new_questions = Newquestion::all();

        return view('admin.new_questions',[
            'new_questions' => $new_questions
        ]);

    }

    public function newquestionsDiscard(Request $request)
    {
        
        if($request->id!==null){
            // dd($request->id);
            $newquestion = Newquestion::where('id',$request->id)->delete();
        }
        else{
            return 'Error';
        }
        return redirect()->back();

    }

    public function newquestionsAnswer(Request $request)
    {

        if($request->id==null || $request->subject==null || $request->question==null || $request->answer==null || $request->asker==null || $request->askedat==null){
            // dd($request->question);
            return redirect()->back();

        }

        $newquestion = Newquestion::where('id',$request->id)->delete();

        $q_and_a=Question::insert(array(
            'subject' => $request->subject,
            'question' => $request->question,
            'answer' => $request->answer,
            'uploaded_by_admin' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now()
        ));

        $answer = 'In Regards To Your Question " '.$request->question.' " Posted Earlier On '.$request->askedat.' ,we have a reply for you " '.$request->answer.' ".';

        $message = Message::create([
            'asked_by' => $request->asker,
            'subject' => $request->subject,
            'question' => null,
            'answer' => $answer,
            'read' => 0
        ]);

        // broadcast(new ReplyMessage($message));
        broadcast(new NewMessage($message));

        return redirect()->back();

        // $message = Message::create([
        //     'from' => auth()->id(),
        //     'to' => $request->contact_id,
        //     'text' => $request->text
        // ]);

        // broadcast(new NewMessage($message));

        // return response()->json($message);

    }

}
