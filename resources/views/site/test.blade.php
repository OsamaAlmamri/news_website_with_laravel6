{{--@forelse( $teacher as $t)--}}

{{--    <p> {{$t}}</p>--}}
{{--    @empty--}}
{{--    <p> there is not teacher yet </p>--}}
{{--@endforelse--}}


@foreach($student as $s)

    <p> {{$s}} </p>
    <p> there is not student yet </p>
@endforeach
