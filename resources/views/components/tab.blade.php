<div class="container mt-5">
    <div class="row">
        <div class="col-12 mb-3">
            <ul class="nav nav-tabs justify-content-end" role="tablist">
                <li class="nav-item">
                    <a class="active" data-toggle="tab" href="#home" role="tab">

                    </a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark px-4 input_border py-2" data-toggle="tab" href="#profile" role="tab" type="submit">
                        Search &nbsp
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </li>
                &nbsp
                &nbsp
                <li class="nav-item">
                    <button class="btn btn-outline-dark px-4 input_border py-2" data-toggle="tab" href="#messages" role="tab" type="submit">
                        Add &nbsp
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </button>
                </li>
            </ul>
        </div>
        <div class="col-12 mb-5" style="padding: 0;">
            <div class="tab-content text-center">
                <div class="tab-pane active" id="home" role="tabpanel">
                </div>
                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="card p-3 shadow-lg border-white">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('contacts.store') }}" method="post">
                                @csrf
                                <div class="col-lg-4 col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control border-secondary input_border" id="floatingInputGrid" placeholder="Alex" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control border-secondary input_border" id="floatingInputGrid" placeholder="alex@gmail.com" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="phone" class="form-control border-secondary input_border" id="floatingInputGrid" placeholder="+992926352444" value="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating d-flex justify-content-end">
                                        <button class="btn btn-dark px-5 input_border py-2" type="submit">
                                            Add &nbsp
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="card p-3 shadow-lg border-white">
                        <div class="card-body">
                            <form action="{{ route('search') }}" method="post" class="row g-3">
                                @csrf
                                <div class="col-lg-9 col-md-7 col-sm-12 mb-3">
                                    <input type="text" name="search" class="form-control form-control-lg border-secondary input_border" required>
                                </div>
                                <div class="col-lg-3 col-md-5 col-sm-12">
                                    <button class="btn btn-dark float-end px-5 input_border py-2" type="submit">
                                        Search &nbsp
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>