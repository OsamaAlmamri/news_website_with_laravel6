<div class="col-sm-12">
    {!! Form::label('advertisment', ' الاعلان   ') !!}
    <input type="text" name="advertisment" id="input-parent" placeholder=" ابحث .." class="form-control"/>
    <div id="advertisment" class="well well-sm" style="height: 50px; overflow: auto;">
        @if (isset($cat_advertisment))
            <div id="advertisment{{ $cat_advertisment->category_value_id }}"><i
                    class="fa fa-minus-circle"></i> {{ $cat_advertisment->advertisment->title }}
                <input type="hidden" name="advertismen_id" value="{{$cat_advertisment->category_value_id }}"/>
            </div>
        @endif
    </div>
    @error('advertismen_id') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

</div>
<div class="col-sm-12">
    {!! Form::label('category_value', ' القسم الذي ستعرض فية   ') !!}
    <input type="text" name="category_value" id="input-parent" placeholder=" ابحث .." class="form-control"/>
    <div id="category_value" class="well well-sm" style="height: 50px; overflow: auto;">
        @if (isset($cat_advertisment))
            <div id="category_value{{ $cat_advertisment->category_value_id }}"><i
                    class="fa fa-minus-circle"></i> {{ $cat_advertisment->advertisment->title }}
                <input type="hidden" name="category_value_id" value="{{$cat_advertisment->category_value_id }}"/>
            </div>
        @endif
    </div>
    @error('category_value_id') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<input type="hidden" id="category_id" name="category_id" value="{{$cat_id}}">


<div class="form-group">
    {!! Form::label('time', ' وقت الظهور بالدقائق   ') !!}
    {!! Form::number('time', null, ['class' => 'form-control', 'id' => 'time', 'placeholder' => 'وقت الظهور بالدقائق ']) !!}
    @error('time') <span
        class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
    {!! Form::label('sort', ' الترتيب ضمن المحتوى الخاص بة   ') !!}
    {!! Form::number('sort', null, ['class' => 'form-control', 'id' => 'sort', 'placeholder' => 'الترتيب   ']) !!}
    @error('sort') <span
        class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="">
            <label>
                <input type="checkbox" name="status" class="js-switch"
                       checked/>
                مفعل
            </label>
        </div>
    </div>
</div>



