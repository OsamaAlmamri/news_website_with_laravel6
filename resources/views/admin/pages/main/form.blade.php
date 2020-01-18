@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css" integrity="sha256-QaRlBIHoN1LIkxeziW34nknOVrCasnLJY6esf3ldv+k=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/pages_drag_drop.css') }}">
@endsection
<div class="card-body">
    <div class="form-group">
        {!! Form::label('name', 'الإسم') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
        @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        {!! Form::label('route', 'المسار') !!}
        {!! Form::text('route', null, ['class' => 'form-control', 'id' => 'route']) !!}
        @error('route') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        {!! Form::label('status', 'الحالة') !!}
        {!! Form::select('status', ['0' => 'تعطيل', '1' => 'تمكين'], $page->status ?? '1', ['class' => 'form-control', 'id' => 'status']) !!}
        @error('status') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <textarea id="html" name="content" class="form-control" style="display: none"></textarea>
    </div>
    <div class="form-group">
        <textarea id="widget_content" name="widget_content" class="form-control" style="display: none"></textarea>
    </div>
    <div class="form-group">
        <div class="widget-container col-sm-12 ui-sortable">
            @if(isset($page) && !empty($page->widget_content))
            {!! $page->widget_content !!}
            @else
            <div class="widget-row col-sm-12 ui-sortable-handle">
                <div class="row-action">
                    <div class="action-group">
                        <input type="text" class="form-control input-class-name" name="widget[0][class]" value="" placeholder="Custom Classname">
                        <span class="row-identify">Columns</span>
                        <div class="col-count">
                            <a href="javascript:void(0);" onclick="builder.plusMainColumn($(this));" rel="1" class="col-plus"></a>
                            <span class="count">1</span>
                            <a href="javascript:void(0);" onclick="builder.minusMainColumn($(this));" rel="1" class="col-minus"></a>
                        </div>
                        <div class="a-group">
                            <a class="a-column-custom" title="Columns Customization" onclick="builder.customMainColumns($(this));" href="javascript:void(0);"></a>
                            <a class="a-row-delete" onclick="builder.removeRow($(this));" href="javascript:void(0);"></a>
                        </div>
                    </div>
                    <input type="hidden" class="cols-format" value="12">
                </div>
                <div class="row-content row-0">
                    <div class="col-sm-12 main-column">
                        <input type="hidden" class="main-col-pos" value="0">
                        <input type="hidden" class="main-col-format" name="widget[0][main_cols][0][format]" value="12">
                        <a class="a-sub-row-add" href="javascript:void(0);" onclick="builder.drawSubRow($(this))">Add Row in this Column</a>
                        <div class="main-col-content main-col-0">
                            <div class="sub-row sub-row-0">
                                <div class="sub-row-action">
                                    <div class="action-group">
                                        <span class="row-identify">Columns</span>
                                        <div class="sub-col-count">
                                            <a href="javascript:void(0);" onclick="builder.plusSubColumn($(this))" rel="1" class="col-plus"></a>
                                            <span class="count">1</span>
                                            <a href="javascript:void(0);" onclick="builder.minusSubColumn($(this))" rel="1" class="col-minus"></a>
                                        </div>
                                        <div class="a-group">
                                            <a class="a-column-custom" title="Columns Customization" onclick="builder.customSubColumns($(this))" href="javascript:void(0);"></a>
                                            <a class="a-row-delete" onclick="builder.removeSubRow($(this))" href="javascript:void(0);"></a>
                                        </div>
                                    </div>
                                    <input type="hidden" class="sub-cols-format" value="12">
                                </div>
                                <div class="sub-row-content">
                                    <div class="col-sm-12 column-area">
                                        <div class="module-area droparea ui-droppable ui-sortable sub-col-0">
                                            <div class="text-insert-module"><span class="">Insert or Drag modules here</span></div>
                                        </div>
                                        <div class="col-action">
                                            <div class="action-group">
                                                <a class="a-module-add" onclick="builder.showAllModules($(this))" href="javascript:void(0);"><i class="fa fa-plus"></i> Insert modules</a>
                                            </div>
                                        </div>
                                        <input type="hidden" class="sub-col-pos" value="0">
                                        <input type="hidden" class="sub-col-format" name="widget[0][main_cols][0][sub_rows][0][sub_cols][0][format]" value="12">
                                    </div>
                                </div>
                                <input type="hidden" class="sub-row-pos" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="main-row-pos" value="0">
            </div>
            @endif
        </div>
        <div class="widget-info-group col-sm-12">
            <button type="button" class="btn-insert btn">
                <i class="fa fa-plus"></i>
                <span>Add New Row</span>
            </button>
        </div>
    </div>
</div>
<input type="hidden" id="text-columns" value="Columns">
<input type="hidden" id="text-insert-module" value="Insert or Drag modules here">
<input type="hidden" id="text-add-module" value="Insert modules">
<input type="hidden" id="text-custom-columns" value="Columns Customization">
<input type="hidden" id="text-custom-classname" value="Custom Classname">
<input type="hidden" id="text-number-min-over" value="The number of columns must be more than 0">
<input type="hidden" id="text-number-max-over" value="The number of columns must be less than 12">
<input type="hidden" id="text-columns-error-format" value="Can't create columns because of columns format">
<div class="all-modules-container row">
    <div class="clearfix border-bottom">
        <button type="button" class="btn btn-info float-left padding-2 m-2" onclick="showBlocksCategories()" > عودة للخلف <i class="fa fa-arrow-left" ></i></button>
        <div class="text-center p-2" ><h5 id="model-title" >أقسام البلوكات</h5></div>
    </div>
    <div class="modules-container d-block">
        <div class="row" id="categories" >
            @foreach(\App\Admin\Blocks::select('type')->distinct()->get() as $cat)
            <div class="col-md-4" >
                <button type="button" onclick="selectModules('{{ $cat->type }}', '{{ $cat->type_name }}')" class="btn btn-default" >
                    <span>
                        {{ $cat->type_name }}
                    </span>
                </button>
            </div>
            @endforeach
        </div>
        <div class="row" id="blocks" style="display: none" >
            @foreach(\App\Admin\Blocks::where('status', 1)->get() as $block)
            <div class="col-md-4 {{ $block->type }}">
                <button type="button" onclick="builder.addModule('{{$block->name }}', '{{ $block->id }}', 'link')" class="btn-choose-module btn btn-default" value="{{ $block->id }}">
                    <span>
                        {{ $block->name }}
                    </span>
                </button>
            </div>
            @endforeach
        </div>
    </div>
    <input type="hidden" id="module-row" value="0">
    <input type="hidden" id="module-col" value="0">
    <input type="hidden" id="module-sub-row" value="0">
    <input type="hidden" id="module-sub-col" value="0">
    <div class="modules-btn-group">
        <button type="button" class="btn-close btn-default pull-right" onclick="builder.closeAllModules();">Close</button>
    </div>
</div>
<div class="popup-background" style="display: none;"></div>
<div class="popup-loader-img" style="display: none;">
</div>
<div class="popup-container" style="display: none;">
    <div class="popup-content">
        <iframe src="" id="module-frame" scrolling="yes"></iframe>
    </div>
    <div class="popup-btn-group">
        <button type="button" class="btn-close btn-default pull-right" onclick="closePopup();">Close</button>
    </div>
</div>
@section('scripts')
<script type="text/javascript" src="{{ asset('dist/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/js/pages_drag_drop.js') }}"></script>
<script type="text/javascript">
    function showBlocksCategories() {
        $('#model-title').text('أقسام البلوكات');
        $('#blocks').slideUp();
        $('#categories').show('slow');
    }

    function selectModules(className, typeName){
        $('#model-title').text(typeName);
        $('#blocks > .' + className).show('slow');
        $('#blocks > div:not(.' + className + ')').hide();
        $('#blocks').show('slow');
        $('#categories').slideUp();
    }
</script>
@endsection
