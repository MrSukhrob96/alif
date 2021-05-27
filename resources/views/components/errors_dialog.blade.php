@if ($errors->any())
<div class="overlay">
    <div class="row justify-content-center mb-5">
        <div class="col-12">
            <div class="card p-4 shadow-lg border-white text-center">
                <div class="card-body pb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="border-top pt-4">
                    <a href="{{ route('contacts.index') }}" class="btn btn-outline-dark px-4 input_border">OK</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif