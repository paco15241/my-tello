@extends('layouts.app')

@section('content')
    <div id="board" class="mt-2 px-1" data-lists="{{ $cardlists->toJson() }}">
        <draggable v-model="lists" class="flex" @change="listMoved">
            <List v-for="list in lists" :list="list" :key="list.id"></List>
        </draggable>
    </div>
@endsection
