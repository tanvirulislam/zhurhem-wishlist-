@extends('admin.master.master')
@section('title')
Size
@endsection


@section('body')
<section class="content">
  <div class="block-header">
    <div class="row">
      <div class="col-lg-7 col-md-6 col-sm-12">
        <h2>Admin
          <small class="text-muted">Welcome to Admin Panel</small>
        </h2>
      </div>
      <div class="col-lg-5 col-md-6 col-sm-12">
        <ul class="breadcrumb float-md-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">size</a></li>
          
        </ul>
      </div>
    </div>
  </div>
  <div class="container-fluid">
   <div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-4">
      @if (Auth::guard('admin')->user()->can('size.create'))
      <a href="{{ route('admin.size.create') }}" type="button"  class="btn btn-raised btn-primary waves-effect" >Add size</a>
      @endif
    </div>

  </div>
  
  <div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card">
        <div class="header">
          <h2> size List</h2>
          
        </div>
        <div class="body">
          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
              <tr>
               <th>SL</th>
               <th>Size</th>
               <th>Action</th>
             </tr>
           </thead>
           <tfoot>
            <tr>
              <th>SL</th>
              <th>Size</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            
            @foreach ($category as $categories) 
            <tr>
             <td>{{ $loop->index+1 }}</td>

             <td>{{ $categories->size }}</td>


            <td>
              @if (Auth::guard('admin')->user()->can('size.edit'))
              <a class="btn btn-success text-white" href="{{ route('admin.size.edit',$categories->id) }}"><i class="material-icons">build</i></a>
              @endif
              @if (Auth::guard('admin')->user()->can('size.delete'))
              <button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $categories->id}})" data-toggle="tooltip" title="Delete"><i class="material-icons">delete</i></button>
              <form id="delete-form-{{ $categories->id }}" action="{{ route('admin.size.delete',$categories->id) }}" method="POST" style="display: none;">
                @method('DELETE')
                @csrf
                
              </form>
              @endif
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
</section>

@endsection
@section('scripts')
<script>
         /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
           if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
               }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
               }
             });
         function checkPermissionByGroup(className, checkThis){
          const groupIdName = $("#"+checkThis.id);
          const classCheckBox = $('.'+className+' input');
          if(groupIdName.is(':checked')){
           classCheckBox.prop('checked', true);
         }else{
           classCheckBox.prop('checked', false);
         }
       }
     </script>

     <script type="text/javascript">
      function deleteTag(id) {
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
          } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                    ) {
            swal(
              'Cancelled',
              'Your data is safe :)',
              'error'
              )
          }
        })
      }
    </script> 
    @endsection