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
                                    <h4>File Table</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard/admin"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/Dashboard/User/Show">User Table</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/Dashboard/User/Create">Create New </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <!-- Config. table start -->
                    <div class="card">
                        <div class="pull-right">

                            {{-- <a href="create/booking" class="btn btn-primary me-md-2" type="button">Add New</a> --}}

                        </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <div class="dt-responsive table-responsive">
                                            <table id="res-config" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>


                                                        <th scope="col">View</th>
                                                        <th scope="col">Delete</th>
                                                    </tr>
                                                </thead>
                                              <tbody id="students">

                        @foreach ($file as $file)


                           <td>{{ $file->name }}</td>



                             <td>
                                <a href="{{ url('/viewe', $file->id) }}"
                                    class="btn btn-outline-info">view</a>
                                    {{--
                                 {{-- <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-success">Edit</a> --}}

                             </td>



                             <td >
                                 <a onclick="delete_file(this)" data-id="{{$file->id}}"
                                id="user_delete" class="button btn btn-danger" > Delete </a>
                            </td>


                         </tr>
                     @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Config. table end -->
</div>
</div>
</div>
<!-- Warning Section Starts -->
<div id="styleSelector">

</div>
</div>
</div>




@endsection
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="application/javascript">

function delete_file(e) {
let id = e.getAttribute('data-id');
// alert(id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type:'POST',
                    url: '{{url('/Dashboard/File/Delete')}}',
                    data:{
                        id : id,
                        "_token" : "{{csrf_token()}}",
                    },
                    success:function (response) {
                        // alert("delete")
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        $("#"+id+"").remove();//remove the tr without refreshing
                        location.reload();// to refresh  the page after the tr deleted

                    }
                }); // ajax end

            } else {
                swal("Your imaginary file is safe!");
            }
        });
}
</script>



<tbody>


</tbody>
