@extends('layouts.app')

@section('title')
    បង្កើតអាណត្តិ
@endsection

@section('content')
    @if (Auth::user()->hasRole('System Manager'))
        <livewire:term.admin-term-create-form :branch_id="$branch_id" :sub_branch_id="$sub_branch_id" />
    @elseif (Auth::user()->hasRole('Branch System Operator'))
        <livewire:term.branch-term-create-form :sub_branch_id="$sub_branch_id" />
    @elseif (Auth::user()->hasRole('Sub-Branch System Operator'))
        <livewire:term.sub-branch-term-create-form />
    @endif
@endsection

@section('js')
@endsection
