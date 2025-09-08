@extends('layouts.app')

@section('title')
    បង្កើតអាណត្តិ
@endsection

@section('content')
    <livewire:term.term-create-form :branch_id="$branch_id" :sub_branch_id="$sub_branch_id" />
@endsection

@section('js')
@endsection
