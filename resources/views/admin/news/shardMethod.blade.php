@section('style')
    <link href="{{url('vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{url('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('vendors/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- Switchery -->
    <link href="{{url('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{url('vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('vendors/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{url('vendors/wyswyg/file-manager/css/file-manager.css')}}">

<style>
    .thumb{
        width: 100px;
    }
</style>


@endsection

@section('js')

    <script>

        $(function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>

    <script>


        $(document).on('change', '#logo', function () {


            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                $('#logo_image').html('');
                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
                                $('#logo_image').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });

        CKEDITOR.replace('editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
    </script>

@endsection

@section('scripts')

    Theme Scripts -->
    <!-- jQuery Tags Input -->
    <script src="{{url('vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    <!-- Switchery -->
    <script src="{{url('vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{url('vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Parsley -->
    <script src="{{url('vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <script src="{{url('vendors/parsleyjs/dist/i18n/fa.js')}}"></script>
    <!-- Autosize -->
    <script src="{{url('vendors/autosize/dist/autosize.min.js')}}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{url('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
    <!-- starrr -->
    <script src="{{url('vendors/starrr/dist/starrr.js')}}"></script>

    <script src="{{url('vendors/jquery-ui/jquery-ui.js') }}"></script>

    <script src="{{url('vendors/select2/js/select2.full.min.js') }}"></script>


    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>

{{--    <script src="{{url('vendors/wyswyg/ckeditor/ckeditor.js')}}"></script>--}}
    <script src="{{url('vendors/wyswyg/file-manager/js/file-manager.js')}}"></script>



@endsection
