<div class="card-body">
    <div class="form-group">
        {!! Form::label('name', 'الإسم') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
        @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      {!! Form::label('route', 'المسار') !!}
      {!! Form::text('route', null, ['class' => 'form-control', 'id' => 'route']) !!}
        @error('route') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      {!! Form::label('content', 'المحتوى') !!}
        <div class="mb-3">
          {!! Form::textarea('content', null, ['style' => 'width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'placeholder' => 'أدخل محتوى الصفحة بتنسيق html', 'class' => 'textarea']) !!}
        </div>
        @error('content') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>
   <div class="form-group">
      {!! Form::label('status', 'الحالة') !!}
      {!! Form::select('status', ['0' => 'تعطيل', '1' => 'تمكين'], $page->status ?? '1', ['class' => 'form-control', 'id' => 'status']) !!}
       @error('status') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
   </div>
</div>