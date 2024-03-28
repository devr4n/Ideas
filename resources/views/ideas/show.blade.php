@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-side-bar')
        </div>
        <div class="col-6">
            @include('shared.success-message')

            <div class="mt-3">
                @include('ideas.shared.idea-card')
            </div>

            <hr>

        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>

@endsection
