@extends('layouts.app')

@section('title', $task->title)


@section('content')

    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.index') }}">Back to all
            tasks</a>
    </nav>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700"> {{ $task->long_description }} </p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Created:{{ $task->created_at->diffForHumans() }} . Last
        Updete{{ $task->updated_at->diffForHumans() }}</p>


    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>

    <div class="flex gap-2" >
        <a class="btn" href="{{ route('tasks.edit', ['task' => $task]) }}">
            Edit Here
        </a>
  
        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('put')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'Completed' : 'not Completed' }}
            </button>
        </form>
   
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn" type="submit">Delete</button>
        </form>
    </div>
@endsection
