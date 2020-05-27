<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
// *
// * @property int $id
// * @property int $user_id
// * @property string $order_date
// * @property string $expiration_date
// * @property int $book_id
 */
class Order extends \yii\db\ActiveRecord
{
    public $Book;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'order_date', 'expiration_date', 'book_id'], 'required'],
            [['user_id', 'book_id'], 'integer'],
            [['order_date', 'expiration_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Mã sinh viên',
            'order_date' => 'Ngày mượn',
            'expiration_date' => 'Hạn trả sách',
            'book_id' => 'Mã sách',

        ];
    }

    public function getBook(){
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

}
