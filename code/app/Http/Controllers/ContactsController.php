<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Message;
use App\Events\NewMessage;
use App\Question;
use App\Newquestion;

class ContactsController extends Controller
{
    public function get()
    {
        // get all users except the authenticated one ( the one logged in )

        $contacts = Subject::where('is_active','1')->get();

        // now a query to get an array of all the unread messages count with the respective user id
        // look at the query in the following manner
        // first--where_clauses-- 
        // then --groupby-- 
        // and then --select_statement--

        $unreadIds = Message::select(\DB::raw('`subject` as sender_id, count(`subject`) as messages_count'))
            ->where('asked_by',auth()->id())
            ->where('read',false)
            ->groupBy('subject')
            ->get(); 

        // expected result is a collection.each item in the collection is going to be an array
        // [ ["sender_id" => id of the sender, "messages_count" => how many messages unread this user have for us ] ]
        // same structure for each user 

        // now map through existing contacts and add another key to each one of them called unread and this is going to be based on the count of unread messages i have for each one of them	

        $contacts = $contacts->map(function($contact) use ($unreadIds){

            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            // this statement will return the item inside the unread id collection or null

            // based on this logic we can do the following
            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;

        });


    	return response()->json($contacts);
    
    }

    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact a s read
        Message::where('subject', $id)->where('asked_by', auth()->id())->update(['read' => true]);
    	// $messages = Message::where('subject',$id)->orWhere('asked_by',$id)->get();

        $messages = Message::where(function($q) use($id){
            $q->where('subject',auth()->id());
            $q->where('asked_by',$id);
        })->orWhere(function($q) use($id){
            $q->where('subject',$id);
            $q->where('asked_by',auth()->id());
        })->get();
        // a = 1 and b = 2 or c = 1 and d = 2 the result returned

    	return response()->json($messages);
    
    }

    public function send(Request $request)
    {

        $answer = Question::select('answer')->where('is_active','1')->where('question','LIKE','%'.$request->text.'%')->where('subject',$request->contact_id)->first();

        if(!is_object($answer)){
            $answer='We dont have an answer to this question now,but we will soon reply you.';
            $newquestion=Newquestion::insert(array(
            'subject' => $request->contact_id,
            'question' => $request->text,
            'asked_by_userId' => auth()->user()->id,
            'asked_by_userName' => auth()->user()->name,
            'created_at' => now(),
            'updated_at' => now()
            ));
            
                $message = Message::create([
                'asked_by' => auth()->id(),
                'subject' => $request->contact_id,
                'question' => $request->text,
                'answer' => $answer
                ]);

                // broadcast user nhi karta lakin jab bhi admin answer upload krta hai tab broadcast hta hai 
                // broadcast(new NewMessage($message));

            return response()->json($message);
        }
        else{
            $answer=$answer->answer;
        }

    	$message = Message::create([
    		'asked_by' => auth()->id(),
    		'subject' => $request->contact_id,
    		'question' => $request->text,
            'answer' => $answer
    	]);

        // if(!is_object($answer)){
        // 	broadcast(new NewMessage($message));
        // }

    	return response()->json($message);
    
    }
    
}
