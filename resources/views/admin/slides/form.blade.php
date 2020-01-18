<div class="form-group">
    {!! Form::label('name', 'الاسم ') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'الاسم ']) !!}
    @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label class="col-md-3 col-sm-3 col-xs-12 control-label"> الصفحات الذي يعرض فيها
        <br>
    </label>
    <div class="clearfix"></div>

    <div class="clearfix"></div>
    <li><label><input type="checkbox" name="select-all" id="select_all"/> Select all</label></li>

    <div class="form-group">
        @foreach($categories as $category)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="checkbox">
                    <label class="">

                        <input type="checkbox" name="categories[]" class="select-message"
                               @if( isset($slide) and  in_array($category->id,json_decode($slide->categories))) checked @endif
                               value="{{$category->id}}">
                        <ins class="iCheck-helper"
                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        {{$category->name_ar}}
                    </label>
                </div>

            </div>
        @endforeach
            @error('categories') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

    </div>

    <div class="clearfix"></div>
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



