
@extends('layout.user_app')

@section('content')
<div class="container">
    @if (session::has('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="text-center pt-2">
                        welcome to user pannel !
                    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   

                    {{-- You are logged in! --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
