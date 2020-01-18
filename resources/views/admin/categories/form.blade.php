<div class=" col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i>الاقسام
                <small> اضافة قسم </small>
            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-xs-3">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left">
                    <li class="active"><a href="#data" data-toggle="tab">البيانات</a></li>

                    <li><a href="#setting" data-toggle="tab">الاعدادات </a></li>
                </ul>
            </div>
            <div class="col-xs-9">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="data">

                        <div class="form-group">
                            {!! Form::label('name_ar', 'الاسم باللغة العربية  ') !!}
                            {!! Form::text('name_ar', null, ['class' => 'form-control', 'id' => 'name_ar', 'placeholder' => 'الاسم باللغة العربية   ']) !!}
                            @error('name_ar') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('name_en', 'الاسم باللغة الانجليزية  ') !!}
                            {!! Form::text('name_en', null, ['class' => 'form-control', 'id' => 'name_en', 'placeholder' => 'الاسم باللغة الانجليزية   ']) !!}
                            @error('name_en') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('section_count', ' عدد الاقسام بالصفحة   ') !!}
                            {!! Form::number('section_count', null, ['class' => 'form-control', 'min'=>1,'max'=>'3','id' => 'section_count', 'placeholder' => 'عدد الاقسام ']) !!}
                            @error('section_count') <span
                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('newsCount', ' عدد الاخبار بالصفحة الواحدة  ') !!}
                            {!! Form::number('newsCount', null, ['class' => 'form-control', 'min'=>2,'id' => 'newsCount', 'placeholder' => 'عدد الاخبار بالصفحة الواحدة ']) !!}
                            @error('newsCount') <span
                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('sort', ' ترتيبة ضمن  الاقسام   ') !!}
                            {!! Form::number('sort', null, ['class' => 'form-control', 'id' => 'sort', 'placeholder' => 'ترتيبة ضمن  الاقسام ']) !!}
                            @error('sort') <span
                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        {{--                        <div class="form-group">--}}
                        {{--                            {!! Form::label('status', 'الحالة') !!}--}}
                        {{--                            @php if(isset($user->situation)and $user->status==1)--}}
                        {{--                            $x=$user->status ;--}}
                        {{--                          else $x=-1 ;    @endphp--}}
                        {{--                            {!!Form ::select('status', array (1 => 'مسموح',-1 => 'معطل',),$x,['class' => 'form-control', 'id' => 'status'])!!}--}}
                        {{--                            @error('status') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror--}}
                        {{--                        </div>--}}

                        <tr>
                            <td class="text-left">
                                <div id="thumb-image5" data-toggle="image" class="img-thumbnail">

                                    <input id="userImage" accept="image/*" type="file" value="{{ old('image') }}"
                                           name="image"
                                           class="form-control @error('logo') is-invalid @enderror"
                                           id="exampleInputEmail1">
                                    @error('logo') <span
                                        class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                                </div>
                            </td>
                            <td class="text-right">
                                <div id="userImage-thumb">
                                    @if(isset($user->image))
                                        <img src="{{url($user->image)}}" width="100px">

                                    @endif
                                </div>
                            </td>
                            </td>
                        </tr>


                    </div>

                    <div class="tab-pane" id="setting">
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="">
                                    <label>
                                        <input type="checkbox" name="isMain" class="js-switch"
                                               @if(isset($category->isMain) and $category->isMain == 1) checked @endif

                                        />
                                        يعرض في الاقسام الرئيسية
                                        {{--                                        {!!Form::checkbox('isMain','null',['class' => 'js-switch', 'checked' => 'checked'])!!}--}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="">
                                    <label>
                                        <input type="checkbox" name="status" class="js-switch"
                                               @if(isset($category->status) and $category->status == 1) checked @endif
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
                                        <input type="checkbox" name="liveNews"
                                               class="js-switch"
                                               @if(isset($category->liveNews) and $category->liveNews == 1) checked @endif
                                        />
                                        يعرض الشريط الاخباري
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="">
                                    <label>
                                        <input type="checkbox" name="hasSlides"
                                               class="js-switch"
                                               @if(isset($category->hasSlides) and $category->hasSlides == 1) checked @endif

                                        />
                                        يعرض السلايدات المتحركة فية
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-10">
                            {!! Form::label('parent', ' القسم الاب لهذا القسم   ') !!}
                            <input type="text" name="parent" placeholder="القسم الاب  " id="input-parent"
                                   class="form-control"/>
                            <div id="parent" class="well well-sm" style="height: 50px; overflow: auto;">
                                @if (isset($category))
                                    <div id="parent{{ $category->parent }}"><i
                                            class="fa fa-minus-circle"></i> {{ getCategoryName($category->parent) }}
                                        <input type="hidden" name="parent" value="{{$category->parent }}"/>
                                    </div>
                                @endif
                            </div>
                            @error('parent') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="clearfix"></div>

    </div>
</div>
</div>



