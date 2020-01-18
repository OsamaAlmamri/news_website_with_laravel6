<div class="card-body">


    <div class="form-group">
        {!! Form::label('university', 'الجامعة ') !!}
        {!!Form ::select('university', $universities,isset($statistic )?$statistic->university_id:null,['class' => 'form-control', 'id' => 'university'])!!}
        @error('statustics') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror
    </div>

    <div class="table-responsive">
        <table id="discount" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <td class="text-left"> نوع الاحصائية</td>
                <td class="text-right">الفئة</td>
                <td class="text-right">نوع الفئة</td>
                <td class="text-right">السنة</td>
                <td class="text-left">الجنس</td>
                <td class="text-left">العدد</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @if(isset($statistic))
                @include("statistics.old_statistics")
            @endif

            </tbody>


            <tfoot>

            @error('statustics.*.number') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

            <tr>
                <td colspan="6"></td>
                <td class="text-left">
                    <button type="button" onclick="addStatustic();" data-toggle="tooltip" title=""
                            class="btn btn-primary" data-original-title="اضافة احصائية">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>


    <!-- /.card-body -->
</div>
