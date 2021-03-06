<?php

use yii\helpers\Html;
use yii\grid\GridView;
use callmez\wechat\models\Wechat;

$this->title = '公众号管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wechat-index">

    <div class="page-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <?//= $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加公众号', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'options' => [
                    'width' => 75
                ]
            ],
            'name',
//            'hash',
//            'token',
//            'access_token',
//            'account',
//            'original',
            [
                'attribute' => 'type',
                'format' => 'html',
                'value' => function($model) {
                    return Html::tag('span', Wechat::$types[$model->type], [
                        'class' => 'label label-info'
                    ]);
                },
                'filter' => Wechat::$types,
                'options' => [
                    'width' => 120
                ]

            ],
//            'app_id',
//            'app_secret',
//            'encoding_type',
//            'encoding_aes_key',
//            'avatar',
//            'qr_code',
//            'address',
//            'description',
//            'username',
//            'status',
//            'password',
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'options' => [
                    'width' => 160
                ]
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'datetime',
                'options' => [
                    'width' => 160
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{manage} {update} {delete}',
                'buttons' => [
                    'manage' => function ($url, $model) {
                        return Html::a('<span class="text-danger glyphicon glyphicon glyphicon-cog"></span>', $url, [
                            'data' => [
                                'toggle' => 'tooltip',
                                'placement' => 'bottom'
                            ],
                            'title' => '管理此公众号'
                        ]);
                    }
                ],
                'options' => [
                    'width' => 70
                ]
            ]
        ],
    ]); ?>
</div>

<?php
$this->registerJs(<<<EOF
    $('[data-toggle="tooltip"]').tooltip();
EOF
);