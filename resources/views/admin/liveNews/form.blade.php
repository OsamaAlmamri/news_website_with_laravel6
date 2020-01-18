
                        <div class="form-group">
                            {!! Form::label('text', 'الخبر  ') !!}
                            {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text', 'rows'=>3,'placeholder' => 'الخبر     ']) !!}
                            @error('text') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>



                        <div class="form-group">
                            {!! Form::label('time', ' وقت الظهور بالدقائق   ') !!}
                            {!! Form::number('time', null, ['class' => 'form-control', 'id' => 'time', 'placeholder' => 'وقت الظهور بالدقائق ']) !!}
                            @error('time') <span
                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="">
                                    <label>
                                        <input type="checkbox" name="status"  class="js-switch"
                                               checked/>
                                        مفعل
                                    </label>
                                </div>
                            </div>
                        </div>
