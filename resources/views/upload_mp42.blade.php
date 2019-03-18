<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>ok</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="../themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>
    <script src="../js/locales/fr.js" type="text/javascript"></script>
    <script src="../js/locales/es.js" type="text/javascript"></script>
    <script src="../themes/fas/theme.js" type="text/javascript"></script>
    <script src="../themes/explorer-fas/theme.js" type="text/javascript"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container my-4">

    <form enctype="multipart/form-data">
        {{ csrf_token() }}
        <div class="file-loading">
            <input id="kv-explorer"  accept="video/*" name="logo" type="file" multiple>
        </div>
        <br>

    </form>
</div>
</body>

    <script>


    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
    /*
     $('#file-4').on('fileselectnone', function() {
     alert('Huh! You selected no files.');
     });
     $('#file-4').on('filebrowse', function() {
     alert('File browse clicked for #file-4');
     });
     */
    $(document).ready(function () {
        $("#kv-explorer").fileinput({
            language:'zh',//设置语言为中文
            uploadUrl:'./test',//提交到后台的地址
            maxFileSize:204800,//文件的大小的最大值，单位为kb
            allowedFileExtensions:['jpg','jpeg','png','gif','mp4'],//允许上传的图片的格式
            maxFileCount:1,
            autoReplace:true,
            uploadAsync:true,//是否异步上传
            showUpload:true,//是否显示上传框
            showClose:true,//是否显示关闭按钮
            showRemove:false,//是否显示删除按钮
            showCancel:false,//是否有显示取消按钮
            required:true,//必须选择一个文件才能上传
            layoutTemplates:{
                actionDelete:'',//去掉预览图片上的删除按钮
                actionUpload:'',//去掉预览图片上的上传按钮
                previewTemplate:''
            },
        });

        // $("#kv-explorer").on('fileloaded', function(event, file, previewId, index) {
        //     // alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        // });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
</script>

</html>
