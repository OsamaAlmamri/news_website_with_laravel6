@section('style')
    <style>
        .well-sm {
            padding: 9px;
            border-radius: 2px;
        }

        .well {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            border-radius: 3px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        }
    </style>


@endsection


@section('js')



    <script>

        $.ajax({
            url: '{{route('admin.statistics.fetchCharData')}}',
            dataType: 'json',
            method: 'post',
            data: '_token=' + encodeURIComponent("{{csrf_token()}}") + '&filter_name=' + encodeURIComponent('k'),
            success: function (json) {
                console.log(json);

            }, error: function (err) {
                console.log(err);
            }
        });



        var statustic_row = 0;

        function addStatustic() {
            html = '<tr id="discount-row' + statustic_row + '">';
            html += '<input type="hidden" name="statustics[' + statustic_row + '][id]" value=""> ' ;
            html += '  <td class="text-left">' +
                '<select onchange="CategoryChanged($(this),' + statustic_row + ')" name="statustics[' + statustic_row + '][type]" class="form-control">';
            html += '      <option value="الطلاب و الخريجيين">الطلاب و الخريجيين </option>';
            html += '      <option value="هيئة التدريس">هيئة التدريس </option>';
            html += '      <option value="الهيئة الادارية">الهيئة الادارية </option>';
            html += '  </select>' +
                '</td>';

            html += '  <td class="text-right">' +
                '<select  id="degree' + statustic_row + '" name="statustics[' + statustic_row + '][degree]" class="form-control">';
            html += '      <option value="دبلوم">  دبلوم </option>';
            html += '      <option selected value="بيكلاريوس"> بيكلاريوس  </option>';
            html += '      <option value="ماجستير"> ماجستير  </option>';
            html += '      <option value="دكتوراة"> دكتوراة  </option>';
            html += '  </select>' +
                '</td>';

            html += '  <td class="text-right">' +
                '<select  id="status' + statustic_row + '"  id name="statustics[' + statustic_row + '][status]" class="form-control">';
            html += '      <option value="مستجدون">  مستجدون</option>';
            html += '      <option value="ملتحقون">ملتحقون  </option>';
            html += '      <option value="خريجون">خريجون  </option>';
            html += '  </select>' +
                '</td>';
            html += '  <td class="text-right">' +
                '<select  name="statustics[' + statustic_row + '][year]" class="form-control">';
            html += '      <option value="2016/2017">2016/2017  </option>';
            html += '      <option value="2017/2018"> 2017/2018 </option>';
            html += '      <option value="2018/2019" selected> 2018/2019 </option>';
            html += '  </select>' + '</td>';


            html += '  <td class="text-right">' +
                '<select  name="statustics[' + statustic_row + '][gender]" class="form-control">';
            html += '      <option value="ذكور"> ذكور </option>';
            html += '      <option value="اناث">اناث   </option>';
            html += '  </select>' + '</td>';
            html += '  <td class="text-left" style="width: 20%;"><div class="input-group ">' +
                '<input id="start_statustics' + statustic_row + '" type="number" name="statustics[' + statustic_row + '][number]" value="" placeholder="  العدد " class="form-control " /><span class="input-group-btn">' +
                '</span></div>' +
                '</td>';
            html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + statustic_row + '\').remove();" data-toggle="tooltip" title="  ازالة" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#discount tbody').append(html);

            statustic_row++;
        }


        function DeleteOldStatistic(row,id) {
            $('#discount-row'+row).remove();
            var newInput = '<input type="hidden" name="deletedId[]" value="' + id + '">';
            $('#form_add').html($('#form_add').html() + newInput)

        }
        function CategoryChanged(e, id) {

            // $('input[name=\'option\']')
            //     html += '      <option value="student">الطلاب و الخريجيين </option>';
            // html += '      <option value="teacher">هيئة التدريس </option>';
            // html += '      <option value="management">الهيئة الادارية </option>';
            var html = '';
            var html2 = '';
            if (e.val() == 'الطلاب و الخريجيين') {
                html = '      <option value="دبلوم">  دبلوم </option>';
                html += '      <option selected value="بيكلاريوس"> بيكلاريوس  </option>';
                html += '      <option value="ماجستير"> ماجستير  </option>';
                html += '      <option value="دكتوراة"> دكتوراة  </option>';

                html2 += '      <option value="مستجدون">  مستجدون</option>';
                html2 += '      <option value="ملتحقون">ملتحقون  </option>';
                html2 += '      <option value="خريجون">خريجون  </option>';
            } else if (e.val() == 'هيئة التدريس') {

                html += '      <option value="معيد"> معيد  </option>';
                html += '      <option value="ماجستير"> ماجستير  </option>';
                html += '      <option value="دكتوراة"> دكتوراة  </option>';

                html2 = '      <option value="متعاقد">  متعاقد </option>';
                html2 += '      <option value="ثابت"> ثابت  </option>';
            } else if (e.val() == 'الهيئة الادارية') {

                html += '      <option value="اداري"> اداري  </option>';
                html += '      <option value="عامل"> عامل  </option>';


                html2 = '      <option value="متعاقد">  متعاقد </option>';
                html2 += '      <option value="ثابت"> ثابت  </option>';


            }

            $("#degree" + id).html(html);
            $("#status" + id).html(html2);

        }


        //--></script>




@endsection


@section('scripts')


@endsection




