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
            html += '  <td class="text-left">' +
                '<select onchange="CategoryChanged($(this),' + statustic_row + ')" name="statustics[' + statustic_row + '][type]" class="form-control">';
            html += '      <option value="student">الطلاب و الخريجيين </option>';
            html += '      <option value="teacher">هيئة التدريس </option>';
            html += '      <option value="management">الهيئة الادارية </option>';
            html += '  </select>' +
                '</td>';

            html += '  <td class="text-right">' +
                '<select  id="degree' + statustic_row + '" name="statustics[' + statustic_row + '][degree]" class="form-control">';
            html += '      <option value="diploma">  دبلوم </option>';
            html += '      <option value="bac"> بيكلاريوس  </option>';
            html += '      <option value="master]"> ماجستير  </option>';
            html += '      <option value="doctor"> دكتوراة  </option>';
            html += '  </select>' +
                '</td>';

            html += '  <td class="text-right">' +
                '<select  id="status' + statustic_row + '"  id name="statustics[' + statustic_row + '][status]" class="form-control">';
            html += '      <option value="new">  مستجدون</option>';
            html += '      <option value="old">ملتحقون  </option>';
            html += '      <option value="graduate">خريجون  </option>';
            html += '  </select>' +
                '</td>';
            html += '  <td class="text-right">' +
                '<select  name="statustics[' + statustic_row + '][year]" class="form-control">';
            html += '      <option value="2016/2017">2016/2017  </option>';
            html += '      <option value="2017/2018"> 2017/2018 </option>';
            html += '      <option value="2018/2019"> 2018/2019 </option>';
            html += '  </select>' + '</td>';


            html += '  <td class="text-right">' +
                '<select  name="statustics[' + statustic_row + '][gender]" class="form-control">';
            html += '      <option value="male"> ذكور </option>';
            html += '      <option value="female">اناث   </option>';
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

        function CategoryChanged(e, id) {

            // $('input[name=\'option\']')
            //     html += '      <option value="student">الطلاب و الخريجيين </option>';
            // html += '      <option value="teacher">هيئة التدريس </option>';
            // html += '      <option value="management">الهيئة الادارية </option>';
            var html = '';
            var html2 = '';
            if (e.val() == 'student') {
                html = '      <option value="diploma">  دبلوم </option>';
                html += '      <option value="bac"> بيكلاريوس  </option>';
                html += '      <option value="master]"> ماجستير  </option>';
                html += '      <option value="doctor"> دكتوراة  </option>';

                html += '      <option value="new">  مستجدون</option>';
                html += '      <option value="old">ملتحقون  </option>';
                html += '      <option value="graduate">خريجون  </option>';
            } else if (e.val() == 'teacher') {

                html += '      <option value="teacher]"> معيد  </option>';
                html += '      <option value="bac"> ماجستير  </option>';
                html += '      <option value="doctor"> دكتوراة  </option>';

                html2 = '      <option value="fixed">  متعاقد </option>';
                html2 += '      <option value="contractor"> ثابت  </option>';
            } else if (e.val() == 'management') {

                html += '      <option value="management]"> اداري  </option>';
                html += '      <option value="worker"> عامل  </option>';


                html2 = '      <option value="fixed">  متعاقد </option>';
                html2 += '      <option value="contractor"> ثابت  </option>';


            }

            $("#degree" + id).html(html);
            $("#status" + id).html(html2);

        }


        //--></script>




@endsection


@section('scripts')


@endsection




