<?php
use navatech\role\helpers\RoleHelper;
use navatech\role\models\Role;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel navatech\role\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = RoleHelper::isMultiLanguage() ? RoleHelper::translate('user_role') : 'Nhóm thành viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

	<?php Pjax::begin(); ?>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel'  => $searchModel,
		'columns'      => [
			'id',
			'name',
			[
				'attribute' => 'is_backend_login',
				'filter'    => $searchModel->is_backend_login_array(),
				'value'     => function(Role $model) {
					$values = $model->is_backend_login_array();
					return $values[$model->is_backend_login];
				},
			],
			[
				'class'    => 'yii\grid\ActionColumn',
				'template' => '{update}{delete}',
			],
		],
	]); ?>
	<?php Pjax::end(); ?>
</div>
