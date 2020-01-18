<div class="form-group">
    {!! Form::label('text', 'النص على السلايد ') !!}
    {!! Form::text('text', null, ['class' => 'form-control', 'id' => 'text', 'placeholder' => 'النص على السلايد ']) !!}
    @error('text') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label class="col-md-3 col-sm-3 col-xs-12 control-label"> السلايد  الذي ستعرض  فيها
        <br>
    </label>
    <div class="clearfix"></div>

    <div class="clearfix"></div>
    <li><label><input type="checkbox" name="select-all" id="select_all"/> Select all</label></li>

    <div class="form-group">
        @foreach($slides as $slide)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="checkbox">
                    <label class="">

                        <input type="checkbox" name="slides[]" class="select-message"
                               @if( isset($slideImage) and  in_array($slide->id,json_decode($slideImage->sildes))) checked
                               @endif
                               value="{{$slide->id}}">
                        <ins class="iCheck-helper"
                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        {{$slide->name}}
                    </label>
                </div>

            </div>
        @endforeach
        @error('sildes') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

    </div>

    <div class="clearfix"></div>


    {{--<input type="hidden" name="category_value_id" value="{{$cat_id}}">--}}
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
<div class="clearfix"></div>

<div class="form-group">
    {!! Form::label('sort', ' الترتيب') !!}
    {!! Form::number('sort', null, ['class' => 'form-control', 'id' => 'sort', 'placeholder' => 'الترتيب   ']) !!}
    @error('sort') <span
        class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>


<div class="clearfix"></div>
<div class="form-group">
    {!! Form::label('slide_image', 'الصورة ') !!}
    {!! Form::file('slide_image', null, ['id' => 'slide_image','class' => 'form-control', 'accept'=>"image/*"]) !!}
    {{--    <input type="file" id="slide_image_input">--}}
    @error('slide_image') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div id="slide_image_image">
    @if(isset($slideImage->image))
        <img src="{{url($slideImage->image)}}" width="100px">

    @endif
</div>

