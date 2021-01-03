@extends('layouts.app')

@section('content')
    <div id="board" class="flex mt-2 px-1" data-lists="{{ $cardlists->toJson() }}">
        <div class="bg-gray-300 mx-2 w-64 rounded" v-for="list in lists">
            <h2 class="px-3 py-1 font-bold">@{{ list.name }}</h2>
        </div>
    </div>
@endsection
