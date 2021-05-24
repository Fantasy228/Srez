<?php

/* @var $this yii\web\View */
use yii\widgets\Pjax;
use yii\helpers\Html;

$this->title = "Сделаем лучше вместе";
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Сделаем лучше вместе!</h1>
            
            <?php
                Pjax::begin(['id' => 'acceptedRequestsCount']); // Обновляемая часть страницы с счетчиком принятых заявок
                    echo '<div style="margin-bottom: 3rem; display: flex; align-items: center; justify-content: center;">';
                        echo '<h2 id="countValue" style="margin-right: 1rem;">'.$acceptedRequests.'</h2>';
                        if (str_ends_with($acceptedRequests, '1')){
                            echo '<h2 id="countText"> заявка принята</h2>';
                        } else if (str_ends_with($acceptedRequests, '2') || str_ends_with($acceptedRequests, '3') || str_ends_with($acceptedRequests, '4')) {
                            echo '<h2 id="countText"> заявки приняты</h2>';
                        } else {
                            echo '<h2 id="countText"> заявок принято</h2>';
                        }
                    echo '</div>';
                Pjax::end();

                $js = <<< JS
                    let pjaxinfoInit = $.pjax.reload({container: '#acceptedRequestsCount', async: false}); // Получение кол-ва заявок для дальнейшего сравнения
                    let lastCountValue = pjaxinfoInit.responseText;
                    setInterval(() => {
                        let pjaxinfo = $.pjax.reload({container: '#acceptedRequestsCount', async: false}); // Обновление #countValue
                        if (pjaxinfo.responseText !== lastCountValue) // Анимация при смене значения
                        {
                            $('#countValue').animate({fontSize: "2.5rem"}, 200).animate({fontSize: "3rem"}, 1000);
                            // console.log('Request counter value changed!!');
                            lastCountValue = pjaxinfo.responseText;
                        }
                    }, 5000);
                JS;
                $this->registerJs($js);
            ?>

        <p><a class="btn btn-lg btn-success" href="/request/create">Новая заявка</a></p>
    </div>
    <h1 class="text-center" style="margin-bottom: 2em;">Недавние заявки</h1>
    <div class="card-deck text-center">
    <?php
        foreach($recentRequests as $key => $value) // Вывод 4-ех последних заявок со статусом "Принято"
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
          if ($key == '1') // После вывода двух - создаем новый блок card-deck
          {
              echo '</div><div class="card-deck text-center">';
          }
        }
    ?>
    </div>
</div>
