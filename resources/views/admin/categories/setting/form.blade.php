<input type="hidden" name="category_id" value="{{$cat_id}}">

<div class="form-group">
    {!! Form::label('name', 'العنوان للبحث ') !!}
    {!! Form::textarea('name', null, ['class' => 'form-control', 'id' => 'name', 'rows'=>2,'placeholder' => 'العنوان     ']) !!}
    @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>


<div class="form-group">
    {!! Form::label('display_name', ' اسم العرض في الموقع') !!}
    {!! Form::textarea('display_name', null, ['class' => 'form-control', 'id' => 'display_name', 'rows'=>2, 'placeholder' => 'اسم العرض في الموقع  ']) !!}
    @error('display_name') <span
        class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    {!! Form::label('content', ' نوع المحتوى ') !!}
    {!! Form::select('content',['اعلان'=>'اعلان','تصويت'=>'تصويت'], null, ['class' => 'form-control','id' => 'content' ]) !!}
    @error('content') <span
        class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    {!! Form::label('padding', ' قسم العرض ') !!}
    {!! Form::select('padding',['يمين'=>'يمين','يسار'=>'يسار'], null, ['class' => 'form-control','id' => 'padding' ]) !!}
    @error('padding') <span
        class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>



<div class="form-group">
    {!! Form::label('sort', ' الترتيب  ') !!}
    {!! Form::number('sort', null, ['class' => 'form-control', 'id' => 'sort_on_md', 'placeholder' => 'الترتيب   ']) !!}
    @error('sort') <span
        class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>



<div class="form-group">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="">
            <label>
                <input type="checkbox" name="status" class="js-switch"
                       @if(isset($news->status) and $news->status == 1) checked @endif
                />
                مفعل
            </label>
        </div>
    </div>
</div>



