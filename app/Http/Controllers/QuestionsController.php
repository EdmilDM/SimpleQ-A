<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

/**
 * Controller to manipulate questions objects.
 */

class QuestionsController extends Controller{

    /**
     * Questions must be sorted by newest to oldest, that's why it needs
     * to be ordered by creation date descending.
     */

    public function getQuestions(){
        $questions = Question::orderBy('created_at', 'desc')->get();
        if (count($questions) == 0) {
            return null;
        } else {
            return $questions;
        }
    }

    public function getQuestionById($id){
        return Question::where('id', $id)->first();
    }

    public function insertQuestion(Request $request){
        $text= $request->input("question");
        $question = new Question;
        $question->text = $text;
        $question->save();
        return redirect('/');
    }
}
