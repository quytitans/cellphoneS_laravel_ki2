@extends('admin.layout.master-layout')

@section('title')
<title>Form</title>
@endsection

@section('breadcrumb')
<header class="page-header">
    <h2>Form Create</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="#">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Form Create</span></li>
        </ol>

        <div class="sidebar-right-toggle" ></div>
    </div>
</header>
@endsection

@section('content')
<h1>WELCOM TO BAT DONG SAN QUY NGUYEN</h1>
@endsection

@section('script')
<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
<script type="text/javascript">
    var myWidget = cloudinary.createUploadWidget({
            cloudName: 'dark-faith',
            uploadPreset: 'nqbsybdh'}, (error, result) => {
            if (!error && result && result.event === "success") {
                console.log('Done! Here is the image info: ', result.info.secure_url);
                document.forms['register-form']['thumbnail'].value += result.info.secure_url + ',';

                document.getElementById('preview-img').innerHTML += `<img src="${result.info.secure_url}" class="img-thumbnail img-200px">`;
            }
        }
    )

    $('#upload_widget').click(function () {
        myWidget.open();
    });
    CKEDITOR.replace( 'editor' );
</script>
@endsection
