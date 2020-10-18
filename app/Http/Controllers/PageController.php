<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * Controller to serve the routes, to keep logic out of the routes file.
 */
 
class PageController extends Controller {
    
    /**
     * Serves the index page on the root (/) route.
     */

    public function indexPage(){

        // Mock data, since back end is not developed.

        $question1 = (object) ["id" => 1, "text" => "What is your name?"];
        $question2 = (object) ["id" => 2, "text" => "What is your favorite food?"];
        $question3 = (object) ["id" => 3, "text" => "How are you?"];
        $questions = array($question1,$question2,$question3);

        $placeholderQuestions = array(
            0 => "Why do we have canine teeth if we are not supposed to eat meat?",
            1 => "What if you're stranded on an island?",
            2 => "How can you live without cheese?",
            3 => "How can you milk almonds?"
        );
        
        $index = array_rand($placeholderQuestions);

        return view('index', ['questions' => $questions, 'placeholderQuestion' => $placeholderQuestions[$index]]) ;
    }

    /**
     * Serves the question page on the (/question/:id) route.
     */

    public function questionPage($id){

        // Mock data, since back end is not developed.
        
        $question = (object) ["id" => $id, "text" => "What is your name?"];
        $answers = array(
            0 => "Manuel Santos",
            1 => "Sophie",
            2 => "Kyle",
            3 => "Ty Smith"
        );

        return view('question', ['question' => $question, 'answers' => $answers]) ;
    }
}
