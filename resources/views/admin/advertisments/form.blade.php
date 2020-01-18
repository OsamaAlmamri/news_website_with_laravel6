
<div class="form-group">
    {!! Form::label('title', 'العنوان  ') !!}
    {!! Form::textarea('title', null, ['class' => 'form-control', 'id' => 'text', 'rows'=>2,'placeholder' => 'العنوان     ']) !!}
    @error('title') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>


<div class="form-group">
    {!! Form::label('input-description', 'التفاصيل') !!}
    {!! Form::textarea('editor', null, ['class' => 'form-control', 'id' => 'input-description','placeholder' => 'التفاصيل  ']) !!}
    @error('infos') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>




<div class="form-group">
    {!! Form::label('image', 'الصورة ') !!}
    {!! Form::file('image', null, ['class' => 'form-control', 'accept'=>'image/*' ,'id' => 'image']) !!}
    @error('image') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>



<div id="logo_image">
    @if(isset($advertisment->image))
        <img src="{{url($advertisment->image)}}" width="100px">

    @endif
</div>






