<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "book".
 *
// * @property int $id
// * @property string $category_id
// * @property string|null $name
// * @property string|null $author
// * @property int|null $amount
// *
// * @property Category $category
 */
class Book extends \yii\db\ActiveRecord
{
//    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['amount'], 'integer'],
            [['category_id', 'name', 'author'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['image'],'file','skipOnEmpty' => false, 'extensions' => 'png,jpg']

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Mã sách',
            'category_id' => 'Thể loại',
            'name' => 'Tên sách',
            'author' => 'Tác giả',
            'amount' => 'Số lượng trong kho',
            'image' =>'Hình ảnh',

        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }



}
