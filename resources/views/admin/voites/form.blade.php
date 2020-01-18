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
    {!! Form::label('time', ' مدة التصويت  بالدقائق   ') !!}
    {!! Form::number('time', null, ['class' => 'form-control', 'id' => 'time', 'placeholder' => 'وقت التصويت  بالدقائق  ']) !!}
    @error('time') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="">
            <label>
                <input type="checkbox" name="status" class="js-switch"
                       @if(isset($voit->status) and $voit->status == 1) checked @endif
                />
                مفعل
            </label>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="form-group">
    {!! Form::label('image', 'الصورة ') !!}
    {!! Form::file('image', null, ['class' => 'form-control', 'accept'=>'image/*' ,'id' => 'image']) !!}
    @error('image') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
</div>

<div class="clearfix"></div>
الخيارات

<div id="logo_image">
    @if(isset($voit->image))
        <img src="{{url($voit->image)}}" width="100px">

    @endif
</div>



<div class="table-responsive">
    <table id="options" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <td class="text-left">الخيار </td>
            <td colspan="1"></td>

        </tr>
        </thead>
        <tbody>
        @include('admin.voites.oldVoitValue')
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td class="text-left">
                <button type="button" onclick="addOption();" data-toggle="tooltip" title=""
                        class="btn btn-primary" data-original-title="Add option"><i
                        class="fa fa-plus-circle"></i></button>
            </td>
        </tr>
        </tfoot>
    </table>

</div>
@error('option_value') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror





