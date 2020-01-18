<div class="card-body">
    <div class="form-group">
        {!! Form::label('name', 'اسم اللغة') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
        @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('symbol', 'الرمز') !!}
        {!! Form::text('symbol', null, ['class' => 'form-control', 'id' => 'symbol']) !!}
        @error('symbol') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('local', 'محلى') !!}
        {!! Form::text('local', null, ['class' => 'form-control', 'id' => 'local']) !!}
        @error('local') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('status', 'الحالة') !!}
        {!! Form::select('status', ['1' => 'تمكين', '0' => 'تعطيل'], $language->status ?? 1, ['class' => 'form-control',
        'id' => 'status']) !!}
        @error('status') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('sort', 'ترتيب الفرز') !!}
        {!! Form::number('sort', null, ['class' => 'form-control', 'id' => 'sort']) !!}
        @error('sort') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>


</div>
