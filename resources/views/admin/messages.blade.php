@if(session()->has('success'))
<div class="alert alert-success alert-dismissible text-center btn-block mt-2">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="icon fas fa-check mr-2"></i>{{ session('success') }}
</div>
@endif
@if(session()->has('danger'))
<div class="alert alert-danger alert-dismissible text-center btn-block mt-2">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="icon fas fa-check mr-2"></i>{{ session('danger') }}
</div>
@endif
@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissible text-center btn-block mt-2">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="icon fas fa-check mr-2"></i>{{ session('warning') }}
</div>
@endif
