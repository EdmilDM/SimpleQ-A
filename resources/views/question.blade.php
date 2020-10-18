@extends('layouts.app')

@section('content')

  @isset($question)
    <div class="p-3 mb-2 bg-primary text-white mt-3 rounded">{{$question->text}}</div>

    @isset($answers)
        <div class="list-group mt-2">
            @foreach ($answers as $answer)
              <li class="list-group-item">{{ $answer }}</li>
            @endforeach
        </div>
    @endisset

    @empty($answers)
        <div class="p-3 mb-2 bg-danger text-white mt-3 rounded">No answers yet for this question :(</div>
    @endempty

    <form class="needs-validation" novalidate>  
        <div class="form-group mt-3 ">
            <textarea class="form-control " id="questiontextarea" rows="3" placeholder="Answer the question!" required minlength="5"></textarea>
            <div class="invalid-feedback">
              Answer must be at least 5 characters long.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Answer</button>
    </form>

  @endisset

  @empty($question)
    <div class="p-3 mb-2 bg-danger text-white mt-3 rounded">There are no questions with that id!</div>
  @endempty

@endsection