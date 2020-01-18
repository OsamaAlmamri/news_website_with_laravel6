<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'File Manager') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" id="fm-main-block">
            <div id="fm"></div>
        </div>
    </div>
</div>

<!-- File manager -->
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // set fm height
    document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

    const FileBrowserDialogue = {
      init: function() {
        // Here goes your code for images your custom things onLoad.
      },
      mySubmit: function (URL) {
        // pass selected file path to TinyMCE
        parent.postMessage({
            mceAction: 'insert',
            content: URL,
            text: URL.split('/').pop()
        })
        // close popup window
        parent.postMessage({ mceAction: 'close' });
      }
    };

    // Add callback to file manager
    fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
      FileBrowserDialogue.mySubmit(fileUrl);
    });
  });
</script>
</body>
</html>
