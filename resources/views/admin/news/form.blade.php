<div class="form-group">
    {!! Form::label('title', 'العنوان  ') !!}
    {!! Form::textarea('title', null, ['class' => 'form-control', 'id' => 'text', 'rows'=>2,'placeholder' => 'العنوان     ']) !!}
    @error('title') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    {!! Form::label('introduction', 'المقدمة ') !!}
    {!! Form::textarea('introduction', null, ['class' => 'form-control', 'id' => 'introduction', 'rows'=>3,'placeholder' => 'المقدمة  ']) !!}
    @error('introduction') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    {!! Form::label('input-description', 'التفاصيل') !!}
    {!! Form::textarea('editor', null, ['class' => 'form-control', 'id' => 'input-description','placeholder' => 'التفاصيل  ']) !!}
    @error('infos') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>


<div class="form-group">
    {!! Form::label('sort', ' الترتيب') !!}
    {!! Form::number('sort', null, ['class' => 'form-control', 'id' => 'sort', 'placeholder' => 'الترتيب   ']) !!}
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


<div class="form-group">
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="">
            <label>
                <input type="checkbox" name="has_comment" class="js-switch"
                       @if(isset($news->has_comment) and $news->has_comment == 1) checked @endif
                />
                التعليقات
            </label>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="exampleInputFile">الاقسام </label>

    <select class="select2 @error('categories')  is-invalid @enderror" name="categories[]" multiple="multiple"
            data-placeholder="التصنيفات" style="width: 100%;">
        @foreach($categories as $category)
            <option value="{{ ($category->id) }}"
                    @if (isset($old_cate) and  in_array( $category->id,$old_cate)) selected @endif >{{ $category->name_ar }} </option>
        @endforeach
    </select>
    @error('categories') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>


<div class="form-group">
    {!! Form::label('logo', 'الشعار ') !!}
    {!! Form::file('logo', null, ['id' => 'logo','class' => 'form-control', 'accept'=>"image/*"]) !!}
    {{--    <input type="file" id="logo_input">--}}
    @error('logo') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div id="logo_image">
    @if(isset($news->logo))
        <img src="{{url($news->logo)}}" width="100px">

    @endif
</div>






