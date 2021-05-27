@extends('layouts.app')

@section('content')
    @isset($user)
        @if($user->count())
            <div class="row my-5">
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card border-white p-3 py-4 shadow">
                        <div class="d-flex justify-content-center">
                            <img class="avatar_image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="card-img-top" alt="">
                            <a href="" class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                                    <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                                    <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $user->name }}
                                <a href="{{ route('contacts.edit', ['contact' => $user->id]) }}" class="text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                    </svg>
                                </a>
                            </h5>

                            <p class="card-text text-muted mt-3">
                                This profile created {{ $user->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    
                    @include('components.profile.panel_settings', ['user' => $user])

                    @if($user->phones->count())
                        @foreach($user->phones as $item)
                            @include('components.profile.phone_list', ['item' => $item, 'id' => $user->id])
                        @endforeach
                    @endif

                    <div class="mb-4"></div>

                    @if($user->emails->count())
                        @foreach($user->emails as $item)
                            @include('components.profile.email_list', ['item' => $item, 'id' => $user->id])
                        @endforeach
                    @endif

                </div>
            </div>
        @endif
    @else
        <h1>Empty</h1>
    @endisset
@endsection