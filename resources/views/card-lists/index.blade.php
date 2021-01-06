@extends('layouts.app')

@section('content')
    <div id="board" class="mt-2 px-1">
        <draggable v-model="lists" class="flex" @change="moveList">
            <List v-for="list in lists" :list="list" :key="list.id"></List>
            <Newlist></Newlist>
        </draggable>
    </div>
@endsection
