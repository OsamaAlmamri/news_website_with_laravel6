<div class=" col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> تب‌های عمودی
                <small>شناور به چپ</small>
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
                    <li><a href="#tab-option" data-toggle="tab">خيارات</a></li>
                    <li><a href="#tab-discount" data-toggle="tab">تخفيض</a></li>
                    <li><a href="#tab-special" data-toggle="tab">جملة</a></li>
                    <li><a href="#tabs" data-toggle="tab">التابات</a></li>
                </ul>
            </div>
            <div class="col-xs-9">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="data">

{{--                        <div class="form-group">--}}
{{--                            {!! Form::label('store_id', 'اسم المتجر') !!}--}}
{{--                            {!!Form ::select('store_id', $stores,null,['class' => 'form-control', 'id' => 'store_id'])!!}--}}
{{--                            @error('store_id') <span--}}
{{--                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

                        <div class="form-group">
                            {!! Form::label('name', 'اسم المنتج') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'اسم المنتج ']) !!}
                            @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('input-description', 'التفاصيل') !!}
                            {!! Form::text('infos', null, ['class' => 'form-control', 'id' => 'input-description', 'data-toggle'=>"summernote", 'data-lang'=>"summernote" ,'placeholder' => 'التفاصيل  ']) !!}
                            @error('infos') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('number', 'رقم المنتج') !!}
                            {!! Form::number('number', null, ['class' => 'form-control', 'id' => 'number', 'placeholder' => 'رقم المنتج  ']) !!}
                            @error('number') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('video', 'رابط الفيديو') !!}
                            {!! Form::url('video', null, ['class' => 'form-control', 'id' => 'video', 'placeholder' => 'رابط الفيديو   ']) !!}
                            @error('video') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('quantity', 'الكمية ') !!}
                            {!! Form::number('quantity', null, ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'الكمية']) !!}
                            @error('quantity') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('price', 'السعر ') !!}
                            {!! Form::number('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'السعر']) !!}
                            @error('price') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('company_id', ' الشركة') !!}
                            {!!Form ::select('company_id', $companies,(isset($product)?$product->company_id:''),['class' => 'form-control', 'id' => 'company_id'])!!}
                            @error('company_id') <span
                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">الاقسام </label>
                            <select class="select2 @error('categories') is-invalid @enderror"
                                    name="categories[]" multiple="multiple" data-placeholder="الاقسام"
                                    style="width: 100%;">
                                @foreach(\App\Admin\Categories::orderByDesc('id')->get() as $category)
                                    <option @if(isset($categories) and in_array( $category->id,$categories)) selected @endif
                                    value="{{ encrypt($category->id) }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            @error('categories') <span
                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('shipping', 'شحن المنتج') !!}
                            {!!Form ::select('shipping', array ('yes' => 'نعم','no' => 'لا',),'yes',['class' => 'form-control', 'id' => 'shipping'])!!}
                            @error('shipping') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('vip', ' مميز') !!}
                            {!!Form ::select('vip', array ('yes' => 'نعم','no' => 'لا',),'yes',['class' => 'form-control', 'id' => 'vip'])!!}
                            @error('vip') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('new', ' جديد') !!}
                            {!!Form ::select('new', array ('yes' => 'نعم','no' => 'لا',),'yes',['class' => 'form-control', 'id' => 'new'])!!}
                            @error('new') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'الحالة') !!}

                            {!!Form ::select('status', array ('allow' => 'تمكين','deny' => 'تعطيل',),'allow',['class' => 'form-control', 'id' => 'status'])!!}
                            @error('status') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="tab-pane" id="pictures"><div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">input</td>
                                    <td class="text-right">Image</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-left">
                                        <div id="thumb-image5" data-toggle="image" class="img-thumbnail">
                                            <input id="ProductFile" accept="image/*" type="file" value="{{ old('logo') }}"
                                                   name="logo"
                                                   class="form-control @error('logo') is-invalid @enderror"
                                                   id="exampleInputEmail1">
                                            @error('logo') <span
                                                class="btn-block badge badge-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div id="ProductFile-thumb">
                                            @if(isset($product->logo))
                                                <img src="{{url($product->logo)}}" width="100px">

                                            @endif
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table id="images" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">Additional Images</td>
                                    <td class="text-right">Sort Order</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @include('admin.products.row.old_image')--}}
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td class="text-left">
                                        <button type="button" onclick="addImage();" data-toggle="tooltip" title=""
                                                class="btn btn-primary" data-original-title="Add Image"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div></div>
                    <div class="tab-pane" id="tab-option">   <div class="row">
                            <div class="col-sm-2">
                                <ul class="nav nav-pills nav-stacked" id="option">
                                    <li>
                                        <input type="text" name="option" value="" placeholder="خيارات" id="input-option" class="form-control"/>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-10">
                                <div class="tab-content">

                                </div>
                            </div>
                        </div></div>
                    <div class="tab-pane" id="tab-discount">   <div class="table-responsive">
                            <table id="discount" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">مجموعة العميل</td>
                                    <td class="text-right">الكمية</td>
                                    <td class="text-right">الأولوية</td>
                                    <td class="text-right">السعر</td>
                                    <td class="text-left">تاريخ البدء</td>
                                    <td class="text-left">تاريخ الانتهاء</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @include('admin.products.row.old_discount')

                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="6"></td>
                                    <td class="text-left">
                                        <button type="button" onclick="addDiscount();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="اضافة تخفيض">
                                            <i class="fa fa-plus-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div> </div>
                    <div class="tab-pane" id="tab-special">    <div class="table-responsive">
                            <table id="special" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">مجموعة العميل</td>
                                    <td class="text-right">الأولوية</td>
                                    <td class="text-right">السعر</td>
                                    <td class="text-left">تاريخ البدء</td>
                                    <td class="text-left">تاريخ الانتهاء</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @include('admin.products.row.old_specials')--}}
                                <tfoot>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="text-left">
                                        <button type="button" onclick="addSpecial();" data-toggle="tooltip" title=""
                                                class="btn btn-primary" data-original-title="اضافة عروض مميزة">
                                            <i class="fa fa-plus-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div></div>
                    <div class="tab-pane" id="tabs">تابات </div>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</div>



