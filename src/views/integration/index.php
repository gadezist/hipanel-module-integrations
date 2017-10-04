<?php

use hipanel\modules\integrations\grid\IntegrationGridView;
use hipanel\widgets\IndexPage;
use hipanel\widgets\Pjax;

$this->title = Yii::t('hipanel.integrations', 'Integrations');
$this->params['breadcrumbs'][] = $this->title;
$subtitle = array_filter(Yii::$app->request->get($model->formName(), [])) ? Yii::t('hipanel', 'filtered list') : Yii::t('hipanel', 'full list');

?>

<?php Pjax::begin(array_merge(Yii::$app->params['pjax'], ['enablePushState' => true])) ?>
    <?php $page = IndexPage::begin(compact('model', 'dataProvider')) ?>
        <?php $page->beginContent('table') ?>
            <?php $page->beginBulkForm() ?>
                <?= IntegrationGridView::widget([
                    'boxed' => false,
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $model,
                    'columns'      => [
                        'checkbox',
                        'actions',
                        'name',
                        'provider',
                        'state',
                    ],
                ]) ?>
            <?php $page->endBulkForm() ?>
        <?php $page->endContent() ?>
    <?php $page->end() ?>
<?php Pjax::end() ?>
