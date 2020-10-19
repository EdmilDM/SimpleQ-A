<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

/**
 * Controller to manipulate answers objects.
 */

class AnswersController extends Controller{

    /**
     * Answers must be sorted by oldest to newest, that's why it needs
     * to be ordered by creation date ascending.
     */

    public function getAnswersToAQuestion($question_id){
        $answers = Answer::where('question_id', $question_id)->orderBy('created_at', 'asc')->get();
        if (count($answers) == 0) {
            return null;
        } else {
            return $answers;
        }
    }
    
    public function insertAnswer(Request $request, $question_id){
        $text= $request->input('answer');
        $answer = new Answer;
        $answer->question_id = $question_id;
        $answer->text = $text;
        $answer->save();
        return redirect("question/$question_id");
    }
}
