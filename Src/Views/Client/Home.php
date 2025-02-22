<?php $this->layout('Client/Components/Layout'); ?>

<?php

$this->start('additional_content');

$this->insert('/Client/Home/Carousel');

$this->stop()
?>


<?php $this->start('main_content') ?>
<!-- Insert nội dung vào đây -->
<?php
$this->insert('/Client/Home/ProductAds', ['dataProduct' => $dataProduct ]);
$this->Insert("/Client/Home/BrandAds");
$this->insert('/Client/Home/ProductNew', ['LatestProduct' => $LatestProduct ]);
$this->Insert("/Client/Home/BlogNews" );

?>


<?php $this->stop() ?>




<?php
$this->push('scripts')
?>
<?php
$this->end();
?>