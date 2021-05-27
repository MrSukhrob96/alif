@extends('layouts.app')

@section('content')

@include('components.tab')

<div class="row mb-5">
    <div class="col-12">
        <ul class="list-group">
            @isset($users)
                @if($users->count())
                    @foreach($users as $user)
                        @include('components.contact_list', ['user' => $user])
                    @endforeach
                    <div class="d-flex justify-content-center mt-5">
                        {!! $users->links() !!}
                    </div>
                @else
                    <h1>No users</h1>
                @endif
            @else
                <h1>No users</h1>
            @endisset
        </ul>
    </div>
</div>
@endsection