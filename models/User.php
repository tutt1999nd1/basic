<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
// * @property int $id
// * @property string $username
// * @property string $password
// * @property string $authKey
// * @property string $accessToken



 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $Id0;
    public $role;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','password','role'], 'required'],
            [['username' ,'role'], 'string', 'max' => 300],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Mã người dùng',
            'username' => 'Tài khoản',
            'password' => 'Mật khẩu',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);


        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    public function getId0()
    {
        return $this->hasOne(AuthAssignment::className(), ['user_id' => 'id']);
    }


}

