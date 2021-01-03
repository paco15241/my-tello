@extends('layouts.app')

@section('content')
    <div id="board" class="flex mt-2 px-1" data-lists="{{ $cardlists->toJson() }}">
        <List v-for="list in lists" :list="list" :key="list.id"></List>
    </div>
@endsection
