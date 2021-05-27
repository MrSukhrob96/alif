@extends('layouts.app')

@section('content')
    <form action="{{ route('profile.store') }}" method="post" class="row g-3">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">

        @if($action === 'phone')
            <div class="col-md-8 mb-3">
                <input type="text" name="phone" class="form-control form-control-lg border-secondary input_border" placeholder="user phone number" required>
            </div>
            <div class="col-md-4 text-right">
                <button name="phone_action" class="btn btn-dark float-end px-5 input_border py-2" type="submit">
                    Add &nbsp
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </button>
            </div>
        @elseif($action === 'email')
            <div class="col-md-8 mb-3">
                <input type="email" name="email" class="form-control form-control-lg border-secondary input_border" placeholder="user email" required>
            </div>
            <div class="col-md-4 text-right">
                <button name="email_action" class="btn btn-dark float-end px-5 input_border py-2" type="submit">
                    Add &nbsp
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </button>
            </div>
        @endif
    </form>
@endsection