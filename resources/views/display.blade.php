<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AVIAN BRAND | DISPLAY HUT UNDIAN</title>
    <link rel="shortcut icon" href="<?=url('img/avian.png');?>">
    <link rel="stylesheet" href="<?=url('css/bootstrap.min.css');?>">
    <script src="<?=url('js/jquery-3.3.1.min.js');?>"></script>
    <style>
        #content{
            font-size : 32px;
            font-weight: bold;
        }
        .hadiah{
            color : red;
            font-size : 38px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body style="overflow: hidden;">
    <div class="container text-center">
        <h2>UNDIAN HADIAH <span class="hadiah" id="title"><?=$jenis_hadiah;?></span></h2>
    </div>
    <br/>
    <?php
        $i = $jumlah;
    ?>
    <div class="container" id="content" style="height : 640px; overflow-y : auto">
        @foreach ($data_undian as $item)
            <div class="row">
                <div class="col-xs-1">
                    <?=$i;?>
                </div>
                <div class="col-xs-11">
                    <?=$item->peserta->nama;?> - <?=$item->peserta->bagian;?>
                </div>
            </div>
            <?php
                $i--;
            ?>
        @endforeach
    </div>
    <script src="<?=url('js/bootstrap.min.js');?>"></script>
    <script>
        $('#content').attr('tabindex','0').focus();
        setInterval(function() {
            $.ajax({
                url: "{{ url('/undian/auto') }}",
                method: 'get',
                dataType:"json",
                success: function(result){
                    $("#title").html(result.jenis_hadiah);
                    $("#content").html(result.data_undian);
                    $('#content').attr('tabindex','0').focus();
                },
                error : function(result){
                    console.log(result);
                }
            });            
        }, 2500); //10 seconds
    </script>
</body>
</html>