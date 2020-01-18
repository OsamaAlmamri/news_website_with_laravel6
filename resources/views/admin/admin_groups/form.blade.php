<div class="card-body">
    <div class="form-group">
        {!! Form::label('name', 'إسم المجموعة') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'إسم المجموعة']) !!}
        @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>
<!-- 
    <div class="form-group">
        {!! Form::label('name', 'صلاحيات الدخول') !!}
        <select class="select2" name="access[]" multiple="multiple" data-placeholder="صلاحيات الدخول" style="width: 100%;">
            <option value="permission 1">صلاحية 1</option>
            <option value="permission 2">صلاحية 2</option>
        </select>
        @error('access') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>صلاحيات التعديل</label>
        <select class="select2" name="update[]" multiple="multiple" data-placeholder="صلاحيات التعديل" style="width: 100%;">
            <option value="permission 1">صلاحية 1</option>
            <option value="permission 2">صلاحية 2</option>
        </select>
        @error('update') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>
     -->
</div>
<!-- /.card-body -->