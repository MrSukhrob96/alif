@extends('layouts.app')

@section('content')
@if($users->count())
<div class="row mb-5">
    <div class="col-12">
        @foreach($users as $user)
            @include('components.search.profile_list', ['user' => $user])
        @endforeach
    </div>
</div>
@else
<div class="row justify-content-center mb-5">
    <div class="col-6">
        <div class="card p-4 shadow-lg border-white text-center">
            <div class="card-body pb-4">
                No result
            </div>
            <div class="border-top pt-4">
                <a href="{{ route('contacts.index') }}" class="btn btn-outline-dark px-4 input_border">OK</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection