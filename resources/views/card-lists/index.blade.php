@extends('layouts.app')

@section('content')
    <div class="mt-2 px-1 flex">
        @foreach($cardlists as $cardlist)
            <div class="bg-gray-300 mx-2 w-64 rounded">
                <h2 class="px-3 py-1 font-bold">{{ $cardlist->name }}</h2>
            </div>
        @endforeach
    </div>
@endsection
