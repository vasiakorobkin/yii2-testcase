<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel, 'authors' => $authors]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'label' => 'ID',
            ],
            [
                'attribute' => 'name',
                'label' => 'Название',
            ],
            [
                'label' => 'Превью',
                'format' => 'raw',
                'value' => function($book)
                {
                    $url = $book['preview'];
                    $imgTag = Html::img($url, ['alt' => $book['name'], 'class' => 'img-preview']);
                    return Html::a($imgTag, $url, ['target' => '_blank']);
                }

            ],
            [
                'attribute' => 'author_fullname',
                'label' => 'Автор',
            ],
            [
                'attribute' => 'date',
                'format' => 'date',
                'label' => 'Дата выхода книги',
            ],
            [
                'attribute' => 'date_create',
                'format' => 'date',
                'label' => 'Дата добавления',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Кнопки действий',
                'template' => '{update}<br>{view}<br>{delete}',
                'buttons' => [
                    'update' => function($url)
                    {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span> Ред', $url);
                    },
                    'view' => function($url)
                    {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span> Просм', $url);
                    },
                    'delete' => function($url)
                    {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span> Удл', $url);
                    },
                ]
            ]
        ],
    ]); ?>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
