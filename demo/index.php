<?php
use Roolith\Filemanager\Adapter\LocalFileSystemDriver;
use Roolith\Filemanager\FileSystem;

require_once __DIR__.'/../vendor/autoload.php';

$driver = new LocalFileSystemDriver();
$driver->setRootFolder(__DIR__ . '/files');
$fileManager = new FileSystem($driver);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File manager</title>
</head>
<body>

    <?php
//        echo '<pre>';
//        print_r($fileManager->get());
//        echo '</pre>';
    ?>

    <form action="" method="post" enctype="multipart/form-data" id="form">
        <input type="file" name="file" id="file" multiple>
        <button type="submit" id="submit">Upload</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $('#submit').click((event) => {
            event.preventDefault();
            const input = $('#file')[0];

            const fd = new FormData();
            $.each(input.files, function(i, file) {
                fd.append(i, file);
            });

            $.ajax({
                url: './upload.php',
                data: fd,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    console.log(data);
                }
            });
        });
    </script>
</body>
</html>
