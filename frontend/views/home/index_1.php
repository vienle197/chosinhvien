<style>
    .font-material {
    font-size: 20px;
    font-family: 'Material Icons';
    display: inline-block;
    margin-right: 10px;
    vertical-align: middle;
    }

</style>
<?php
$content = file_get_contents("http://chosinhvien.beta/json.json");
$data = json_decode($content,true);
foreach ($data as $key => $val){?>
    <style>
        #test-<?= $key ?>:before {
            font-size: 20px;
            content: "\<?= $val ?>";
            font-family: 'Material Icons';
            display: inline-block;
            margin-right: 10px;
            vertical-align: middle;
        }

    </style>

    <div>
      <?= $key ?> : <?= $val ?> : <span class="font-material" id="test-<?= $key ?>" ><?= $val ?></span>
    </div>


<?php }
?>



