<div class="card-body">
    <div class="form-group">
        {!! Form::label('name',' الجامعة ') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'الجامعة  ']) !!}
        @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('type', 'نوع الجامعة ') !!}
        {!!Form ::select('type', ['خاص'=>'خاص','حكومي'=>'حكومي'],isset($statistic )?$statistic->type:null,['class' => 'form-control', 'id' => 'type'])!!}
        @error('type') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>
    <!-- /.card-body -->
</div>
