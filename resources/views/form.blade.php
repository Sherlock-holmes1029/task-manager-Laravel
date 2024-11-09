@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')



@section('content')
    {{-- {{$errors}} --}}
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('put')
        @endisset

        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" 
            @class(['border-red-500'=>$errors->has('title')])
            value="{{ $task->title?? old('title') }}">
            @error('title')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea 
            @class(['border-red-500'=>$errors->has('description')])
            name="description" id="description" cols="30" rows="1">
                {{ $task->description??old('description') }}
            </textarea>
            @error('description')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" 
            id="long_description" @class(['border-red-500'=>$errors->has('long_description')]) cols="30" rows="3">
                {{ $task-> long_description?? old('long_description') }}
            </textarea>
            @error('long_description')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4 items-center gap-2">
            <button type="submit" class="btn" >
                @isset($task)
                    Save Task
                    @else
                    Add Task
                @endisset
            </button>
            <a href="{{route('tasks.index')}}" class="cancel" >Cancel</a>
        </div>
    </form>
@endsection
