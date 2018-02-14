<?php 
namespace app\models;

// пространнсвтво имен
use yii\db\ActiveRecord;

class Product extends ActiveRecord{
	public static function tableName(){
		return 'products';
	}

	public function getCategories(){
		return->hasOne(Product::className(), ['id' => 'parent']);
	}
}

 ?>