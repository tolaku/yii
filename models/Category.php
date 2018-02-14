<?php 
namespace app\models;

// пространнсвтво имен
use yii\db\ActiveRecord;

class Category extends ActiveRecord{
	public static function tableName(){
		return 'categories';
	}

	public function getProducts(){
		return->hasMany(Product::className(), ['parent' => 'id']);
	}
}

 ?>