<?php

/* @var $this yii\web\View */

$this->title = "My Yii Application";
?>
<div class="site-index">

    <p class="text-center my-4"><a class="btn btn-lg btn-success" href="/request/create">Отправить заявку</a></p>
    <h1 class="text-center" style="margin-bottom: 2em;">Недавние заявки</h1>
    <div class="card-deck text-center">
    <?php
        foreach($recentRequests as $key => $value)
        {
            echo '
            <div class="card inline" style="width: 50rem;">
                <div class="card-body">
                <h4 class="card-title">'.$value['name'].'</h4>
                <h6 class="card-subtitle mb-2 text-muted">'.$value['category']['name'].'</h6>
                <img class="card-img-top request-img-after request-img-before" src="'.$value['img_after'].'" alt="Card image cap">
                <img class="card-img-top request-img-before" src="'.$value['img_before'].'" alt="Card image cap">
                </div>
                <div class="card-footer text-muted">
                '.$value['created_at'].'
                </div>
            </div>
          ';
          if ($key == '1')
          {
              echo '</div><div class="card-deck text-center">';
          }
        }
    ?>
    </div>
</div>
