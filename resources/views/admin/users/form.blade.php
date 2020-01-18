<div class=" col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i>المستخدمين
                <small> اضافة مستخدم </small>
            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-xs-3">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left">
                    <li class="active"><a href="#data" data-toggle="tab">البيانات</a></li>
                    <li><a href="#pictures" data-toggle="tab">الصور</a></li>

                    <li><a href="#tabs" data-toggle="tab">الصلاحيات</a></li>
                </ul>
            </div>
            <div class="col-xs-9">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="data">


                        <div class="form-group">
                            {!! Form::label('name', 'الاسم الثلاثي ') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'الاسم الثلاثي   ']) !!}
                            @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('username', ' اسم المستخدم ') !!}
                            {!! Form::text('username', null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'اسم المستخدم  ']) !!}
                            @error('username') <span
                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('phone', 'رقم الهاتف') !!}
                            {!! Form::number('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'رقم الهاتف   ']) !!}
                            @error('phone') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('email', ' الايميل') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'الايميل ']) !!}
                            @error('email') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('password', 'كلمة المرور') !!}
                            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'كلمة المرور ']) !!}
                            @error('password') <span
                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'تاكيد كلمة المرور') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'تاكيد كلمة المرور']) !!}
                            @error('password_confirmation') <span
                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('status', 'الحالة') !!}
                            @php if(isset($user->situation)and $user->status==1)
                            $x=$user->status ;
                          else $x=-1 ;    @endphp
                            {!!Form ::select('status', array (1 => 'مسموح',-1 => 'معطل',),$x,['class' => 'form-control', 'id' => 'status'])!!}
                            @error('status') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

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

                    {{--                    --}}
                    {{--                    <div class="tab-pane" id="pictures"><div class="table-responsive">--}}
                    {{--                            <table class="table table-striped table-bordered table-hover">--}}
                    {{--                                <thead>--}}
                    {{--                                <tr>--}}
                    {{--                                    <td class="text-left">input</td>--}}
                    {{--                                    <td class="text-right">Image</td>--}}
                    {{--                                </tr>--}}
                    {{--                                </thead>--}}
                    {{--                                <tbody>--}}
                    {{--                                <tr>--}}
                    {{--                                    <td class="text-left">--}}
                    {{--                                        <div id="thumb-image5" data-toggle="image" class="img-thumbnail">--}}
                    {{--                                            <input id="ProductFile" accept="image/*" type="file" value="{{ old('logo') }}"--}}
                    {{--                                                   name="logo"--}}
                    {{--                                                   class="form-control @error('logo') is-invalid @enderror"--}}
                    {{--                                                   id="exampleInputEmail1">--}}
                    {{--                                            @error('logo') <span--}}
                    {{--                                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror--}}
                    {{--                                        </div>--}}
                    {{--                                    </td>--}}
                    {{--                                    <td class="text-right">--}}
                    {{--                                        <div id="ProductFile-thumb">--}}
                    {{--                                            @if(isset($product->logo))--}}
                    {{--                                                <img src="{{url($product->logo)}}" width="100px">--}}

                    {{--                                            @endif--}}
                    {{--                                        </div>--}}
                    {{--                                    </td>--}}
                    {{--                                    </td>--}}
                    {{--                                </tr>--}}
                    {{--                                </tbody>--}}
                    {{--                            </table>--}}
                    {{--                        </div>--}}
                    {{--                        --}}
                    {{--                        <div class="table-responsive">--}}
                    {{--                            <table id="images" class="table table-striped table-bordered table-hover">--}}
                    {{--                                <thead>--}}
                    {{--                                <tr>--}}
                    {{--                                    <td class="text-left">Additional Images</td>--}}
                    {{--                                    <td class="text-right">Sort Order</td>--}}
                    {{--                                    <td></td>--}}
                    {{--                                </tr>--}}
                    {{--                                </thead>--}}
                    {{--                                <tbody>--}}
                    {{--                                @include('admin.products.row.old_image')--}}
                    {{--                                </tbody>--}}

                    {{--                                <tfoot>--}}
                    {{--                                <tr>--}}
                    {{--                                    <td colspan="2"></td>--}}
                    {{--                                    <td class="text-left">--}}
                    {{--                                        <button type="button" onclick="addImage();" data-toggle="tooltip" title=""--}}
                    {{--                                                class="btn btn-primary" data-original-title="Add Image"><i--}}
                    {{--                                                class="fa fa-plus-circle"></i></button>--}}
                    {{--                                    </td>--}}
                    {{--                                </tr>--}}
                    {{--                                </tfoot>--}}
                    {{--                            </table>--}}
                    {{--                        </div></div>--}}
                    {{--                    --}}
                    {{--                    <div class="tab-pane" id="tab-option">   <div class="row">--}}
                    {{--                            <div class="col-sm-2">--}}
                    {{--                                <ul class="nav nav-pills nav-stacked" id="option">--}}
                    {{--                                    <li>--}}
                    {{--                                        <input type="text" name="option" value="" placeholder="خيارات" id="input-option" class="form-control"/>--}}
                    {{--                                    </li>--}}
                    {{--                                </ul>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-sm-10">--}}
                    {{--                                <div class="tab-content">--}}

                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div></div>--}}
                    {{--                    <div class="tab-pane" id="tab-discount">   <div class="table-responsive">--}}
                    {{--                            <table id="discount" class="table table-striped table-bordered table-hover">--}}
                    {{--                                <thead>--}}
                    {{--                                <tr>--}}
                    {{--                                    <td class="text-left">مجموعة العميل</td>--}}
                    {{--                                    <td class="text-right">الكمية</td>--}}
                    {{--                                    <td class="text-right">الأولوية</td>--}}
                    {{--                                    <td class="text-right">السعر</td>--}}
                    {{--                                    <td class="text-left">تاريخ البدء</td>--}}
                    {{--                                    <td class="text-left">تاريخ الانتهاء</td>--}}
                    {{--                                    <td></td>--}}
                    {{--                                </tr>--}}
                    {{--                                </thead>--}}
                    {{--                                <tbody>--}}
                    {{--                                @include('admin.products.row.old_discount')--}}

                    {{--                                </tbody>--}}

                    {{--                                <tfoot>--}}
                    {{--                                <tr>--}}
                    {{--                                    <td colspan="6"></td>--}}
                    {{--                                    <td class="text-left">--}}
                    {{--                                        <button type="button" onclick="addDiscount();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="اضافة تخفيض">--}}
                    {{--                                            <i class="fa fa-plus-circle"></i>--}}
                    {{--                                        </button>--}}
                    {{--                                    </td>--}}
                    {{--                                </tr>--}}
                    {{--                                </tfoot>--}}
                    {{--                            </table>--}}
                    {{--                        </div> </div>--}}
                    {{--                    <div class="tab-pane" id="tab-special">    <div class="table-responsive">--}}
                    {{--                            <table id="special" class="table table-striped table-bordered table-hover">--}}
                    {{--                                <thead>--}}
                    {{--                                <tr>--}}
                    {{--                                    <td class="text-left">مجموعة العميل</td>--}}
                    {{--                                    <td class="text-right">الأولوية</td>--}}
                    {{--                                    <td class="text-right">السعر</td>--}}
                    {{--                                    <td class="text-left">تاريخ البدء</td>--}}
                    {{--                                    <td class="text-left">تاريخ الانتهاء</td>--}}
                    {{--                                    <td></td>--}}
                    {{--                                </tr>--}}
                    {{--                                </thead>--}}
                    {{--                                <tbody>--}}
                    {{--                                @include('admin.products.row.old_specials')--}}
                    {{--                                <tfoot>--}}
                    {{--                                <tr>--}}
                    {{--                                    <td colspan="5"></td>--}}
                    {{--                                    <td class="text-left">--}}
                    {{--                                        <button type="button" onclick="addSpecial();" data-toggle="tooltip" title=""--}}
                    {{--                                                class="btn btn-primary" data-original-title="اضافة عروض مميزة">--}}
                    {{--                                            <i class="fa fa-plus-circle"></i>--}}
                    {{--                                        </button>--}}
                    {{--                                    </td>--}}
                    {{--                                </tr>--}}
                    {{--                                </tfoot>--}}
                    {{--                            </table>--}}
                    {{--                        </div></div>--}}
                    {{--                    --}}
                    <div class="tab-pane" id="tabs">


                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="flat" checked="checked"> انتخاب شده
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="flat"> انتخاب نشده
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="flat" disabled="disabled"> غیر فعال
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="flat" disabled="disabled"
                                           checked="checked"> غیر فعال و انتخاب شده
                                </label>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</div>



