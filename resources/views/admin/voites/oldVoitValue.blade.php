@if(isset($voit))
    <?php $option_row = 1000; ?>

    @foreach( $voit->voit_values as $v)
        <tr id="option-row{{$option_row}}">
            <input type="hidden" name="option_value[{{$option_row}}][id]" value="{{$v->id}}">
            <td class="text-right"><input type="text" name="option_value[{{$option_row}}][name]" value="{{$v->name}}"
                                          placeholder=""
                                          class="form-control"></td>
            <td class="text-left">
                <button type="button"
                        onclick="deleteOption('{{$option_row}}' ,'{{$v->id}}')"
                        data-toggle="tooltip" title=""
                        class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
            </td>
        </tr>
        @php $option_row++@endphp
    @endforeach
@endif
