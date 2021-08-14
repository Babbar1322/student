@extends('layout.admin_app')
@section('content')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-12">
            <h4 class="page-title">Add Student</h4>
        </div>
    </div>          
</div>
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
               @if(session('message'))
               <div class="alert alert-success">{{session('message')}}</div>
               @endif
               @if(session('error'))
               <div class="alert alert-danger">{{session('error')}}</div>
               @endif
                <div class="card-body">
                    <form class="form-validate" action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" >First Name <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="" name="first_name" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" >Last Name <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="" name="last_name" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" >Address <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <textarea rows="3" class="form-control" id="" name="address" placeholder="Enter Your Address"></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"></label>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>                                  
                    </form>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
@endsection