<div class="col-sm-12">
    {!! Form::label('voit', ' التصويت   ') !!}
    <input type="text" name="voit" id="input-parent" placeholder=" ابحث .." class="form-control"/>
    <div id="voit" class="well well-sm" style="height: 50px; overflow: auto;">
        @if (isset($cat_voit))
            <div id="voit{{ $cat_voit->category_value_id }}"><i
                    class="fa fa-minus-circle"></i> {{ $cat_voit->voit->name }}
                <input type="hidden" name="voit_id" value="{{$cat_voit->category_value_id }}"/>
            </div>
        @endif
    </div>
    @error('voit_id') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

</div>
<div class="col-sm-12">
    {!! Form::label('category_value', ' القسم الذي ستعرض فية   ') !!}
    <input type="text" name="category_value" id="input-parent" placeholder=" ابحث .." class="form-control"/>
    <div id="category_value" class="well well-sm" style="height: 50px; overflow: auto;">
        @if (isset($cat_voit))
            <div id="category_value{{ $cat_voit->category_value_id }}"><i
                    class="fa fa-minus-circle"></i> {{ $cat_voit->voit->title }}
                <input type="hidden" name="category_value_id" value="{{$cat_voit->category_value_id }}"/>
            </div>
        @endif
    </div>
    @error('category_value_id') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<input type="hidden" id="category_id" name="category_id" value="{{$cat_id}}">



