<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;

/**
 * Controller to serve the routes, to keep logic out of the routes file.
 */
 
class PagesController extends Controller {
    
    /**
     * Serves the index page on the root (/) route.
     */

    public function indexPage(){
        $questionsController = new QuestionsController;

        $placeholderQuestions = array(
            "Why do we have canine teeth if we are not supposed to eat meat?",
            "What if you're stranded on a deserted island?",
            "How can you live without cheese?",
            "How can you milk almonds?"
        );
        $randomQuestion = Arr::random($placeholderQuestions);
        return view('index', ['questions' => $questionsController->getQuestions(),
                                'placeholderQuestion' => $randomQuestion]);
    }

    /**
     * Serves the question page on the (/question/:id) route.
     */

    public function questionPage($id){
        $questionsController = new QuestionsController;
        $answersController = new AnswersController;
        return view('question', ['question' => $questionsController->getQuestionById($id),
                                'answers' => $answersController->getAnswersToAQuestion($id)]);
    }
}
