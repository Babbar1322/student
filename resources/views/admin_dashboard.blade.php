
@extends('layout.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <div class="text-center pt-2">
                   Welcome to Admin Dashboard !
               </div>

                <div class="card-body">
                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ Session('status') }}
                        </div>
                    @endif
                   

                    {{-- You are logged in! --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
