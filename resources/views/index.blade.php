@extends('layouts.app')

@section('content')

    <form class="needs-validation" novalidate action="/question/add" method="POST">  
    @csrf
        <div class="form-group mt-3 ">
            <div class="p-3 mb-2 bg-primary text-white rounded">Ask a question here!</div>
            <input name="question" type="text" class="form-control " required minlength="5" pattern=".*\?$" rows="3" placeholder="{{ $placeholderQuestion }}"></input>
            <div class="invalid-feedback">
              Question must be at least 5 characters long and end with a question mark (?).
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit question!</button>
    </form>

    <div class="p-3 mb-2 bg-primary text-white mt-3 rounded">Questions</div>

    @isset($questions)
        <div class="list-group ">
        
            @foreach ($questions as $question)
                <a href="/question/{{$question->id }}" class="list-group-item list-group-item-action">{{ $question->text }}</a>
            @endforeach
            
        </div>
    @endisset

    @empty($questions)
        <div class="p-3 mb-2 bg-danger text-white mt-3 rounded">No questions yet, submit one with the form above!</div>
    @endempty

@endsection