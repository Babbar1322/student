@extends('layout.admin_app')
@section('content')

<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-6">
            <h4 class="page-title">Students</h4>
          
        </div>
        <div class="col-md-3 col-lg-3">
            {{-- <div class="searchbar">
                <form action="" method="get">
                    <div class="input-group">
                      <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="search">
                      <div class="input-group-append">
                        <button class="btn" type="submit" id="button-addon2" style="background-color:lightgray;"><img src="{{asset('admin/assets/images/svg-icon/search.svg')}}" class="img-fluid" alt="search" style="min-width:20px;"></button>
                      </div>
                    </div>
                </form>
            </div> --}}
        </div>
        <div class="col-md-3">
            <div class="widgetbar">
                <a href="{{route('student.add')}}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Students</a>
            </div>                        
        </div>
    </div>          
</div>
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                               @if (!empty($students))
                                   @foreach ($students as $stu)
                                       <tr>
                                           <td>{{$stu->id}}</td>
                                           <td>{{$stu->first_name}}</td>
                                           <td>{{$stu->last_name}}</td>
                                           <td>{{$stu->address}}</td>
                                           <td style="white-space: nowrap; width: 15%;">
                                            <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                            <a  href="{{route('student.edit',['id'=>$stu->id])}}"   class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                            <a href="{{route('student.delete',['id'=>$stu->id])}}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;" id="delete"><span class="ti-trash"></span></a>
                                            </div>
                                            </div>
                                    </td>  
                                       </tr>
                                   @endforeach
                               @endif
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        
    </div>
    <!-- End row -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection