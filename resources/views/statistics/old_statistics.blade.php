<?php $statistic_row = 1000; ?>

<tr id="discount-row{{$statistic_row}}">
    <input type="hidden" name="statustics[{{$statistic_row}}][id]" value="{{$statistic->id}}">
    <td class="text-left"><select onchange="CategoryChanged($(this),{{$statistic_row}})"
                                  name="statustics[{{$statistic_row}}][type]" class="form-control">
            <option value="الطلاب و الخريجيين" @if($statistic->type=='الطلاب و الخريجيين') selected @endif >الطلاب و
                الخريجيين
            </option>
            <option value="هيئة التدريس" @if($statistic->type=='هيئة التدريس') selected @endif >هيئة التدريس</option>
            <option value="الهيئة الادارية" @if($statistic->type=='الهيئة الادارية') selected @endif >الهيئة الادارية
            </option>
        </select></td>
    <td class="text-right"><select id="degree{{$statistic_row}}" name="statustics[{{$statistic_row}}][degree]"
                                   class="form-control">
            @if($statistic->type=='الطلاب و الخريجيين')
                <option value="دبلوم" @if($statistic->degree=='دبلوم') selected @endif> دبلوم</option>
                <option value="بيكلاريوس" @if($statistic->degree=='بيكلاريوس') selected @endif> بيكلاريوس</option>
                <option value="ماجستير" @if($statistic->degree=='ماجستير') selected @endif> ماجستير</option>
                <option value="دكتوراة" @if($statistic->degree=='دكتوراة') selected @endif> دكتوراة</option>
            @endif
            @if($statistic->type=='هيئة التدريس')
                <option value="معيد" @if($statistic->degree=='معيد') selected @endif> معيد</option>
                <option value="ماجستير" @if($statistic->degree=='ماجستير') selected @endif> ماجستير</option>
                <option value="دكتوراة" @if($statistic->degree=='دكتوراة') selected @endif> دكتوراة</option>
            @endif
            @if($statistic->type=='الهيئة الادارية')
                <option value="اداري" @if($statistic->degree=='اداري') selected @endif> اداري</option>
                <option value="عامل" @if($statistic->degree=='عامل') selected @endif> عامل</option>
            @endif
        </select></td>
    <td class="text-right"><select id="status{{$statistic_row}}" name="statustics[{{$statistic_row}}][status]"
                                   class="form-control">
            @if($statistic->type=='الطلاب و الخريجيين')
                <option value="مستجدون" @if($statistic->status=='مستجدون') selected @endif> مستجدون</option>
                <option value="ملتحقون" @if($statistic->status=='ملتحقون') selected @endif>ملتحقون</option>
                <option value="خريجون" @if($statistic->status=='خريجون') selected @endif>خريجون</option>
            @endif
            @if($statistic->type=='هيئة التدريس' or $statistic->type=='الهيئة الادارية' )

                <option value="متعاقد" @if($statistic->status=='متعاقد') selected @endif> متعاقد</option>
                <option value="ثابت" @if($statistic->status=='ثابت') selected @endif> ثابت</option>
            @endif
        </select></td>
    <td class="text-right"><select name="statustics[{{$statistic_row}}][year]" class="form-control">
            <option value="2016/2017" @if($statistic->year=='2016/2017') selected @endif>2016/2017</option>
            <option value="2017/2018" @if($statistic->year=='2017/2018') selected @endif> 2017/2018</option>
            <option value="2018/2019" @if($statistic->year=='2018/2019') selected @endif> 2018/2019</option>
        </select></td>
    <td class="text-right"><select name="statustics[{{$statistic_row}}][gender]" class="form-control">
            <option value="ذكور" @if($statistic->gender=='ذكور') selected @endif> ذكور</option>
            <option value="اناث" @if($statistic->gender=='اناث') selected @endif>اناث</option>
        </select></td>
    <td class="text-left" style="width: 20%;">
        <div class="input-group "><input id="start_statustics{{$statistic_row}}" type="number"
                                         name="statustics[{{$statistic_row}}][number]" value="{{$statistic->number}}"
                                         placeholder="  العدد " class="form-control "><span
                class="input-group-btn"></span></div>
    </td>
    <td class="text-left">
        <button type="button" onclick="DeleteOldStatistic('{{$statistic_row}}',{{$statistic->id}})"
                data-toggle="tooltip"
                title="  ازالة"
                class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
    </td>
</tr>

