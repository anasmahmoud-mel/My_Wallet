@extends('dashboard_layouts.index')

@section('content')



<div class="pcoded-content">
  <div class="pcoded-inner-content">
      <!-- Main-body start -->
      <div class="main-body">
          <div class="page-wrapper">
              <!-- Page-header start -->
              <div class="page-header">
                  <div class="row align-items-end">
                      <div class="col-lg-8">
                          <div class="page-header-title">
                              <div class="d-inline">
                                  <h4>Professor Table</h4>

                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="page-header-breadcrumb">
                              <ul class="breadcrumb-title">
                                  <li class="breadcrumb-item">
                                      <a href="/dashboard/admin"> <i class="feather icon-home"></i> </a>
                                  </li>
                                  <li class="breadcrumb-item"><a href="/dashboard/professor">Professor Table</a>
                                  </li>
                                  <li class="breadcrumb-item"><a href="#!">Edit Professor</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Page-header end -->
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert background-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div><br />
                @endif
                  <!-- Page body start -->
                  <div class="page-body">
                      <div class="row">
                          <div class="col-sm-12">
                              <!-- Basic Inputs Validation start -->
                              <div class="card">
                                  <div class="card-header">



                                  </div>
                                  <div class="card-block">
                                    <form method="post" action="{{ route('Professors.update', $professor->id) }}">

                                        @csrf
                                            @method('PUT')
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="name"  class="form-control"  id="name" value={{ $professor->name }}>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email:</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email" name="email" value={{ $professor->email }}>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-2 col-form-label">Password:</label>
                                                  <div class="col-sm-10">
                                                      <input type="text" name="password"  class="form-control"  id="password" >
                                                      <span class="messages"></span>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">User Type:</label>
                                                <div class="col-sm-10">

                                                    <select class="form-control input-lg" name="user_type" id="user_type" value="type">
                                                      <option value="admin">Admin</option>
                                                      <option value="professor">Professor</option>
                                                      <option value="student">Student</option>
                                                    </select>
                                                    <span class="messages"></span>
                                                </div>

                                            </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary m-b-0">Update</button>
                                                    </div>
                                                </div>

                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
          </div>
      </div>
  </div>
</div>




@endsection
