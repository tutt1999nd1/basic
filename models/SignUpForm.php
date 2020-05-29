<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignUpForm extends Model
{
    public $username;
    public $password;
    public $passwordrepeat;

    public function rules()
    {
        return [
            [['username', 'password', 'passwordrepeat', ], 'required', 'message' => 'Mời điền thông tin'],
            [['password','passwordrepeat'], 'string', ],
            [[ 'password','passwordrepeat'], 'string', 'max'=>600, 'min'=>6, 'tooLong' => 'Mật khảu quá dài', 'tooShort'=>'Mật khâu tối thiểu 6 kí tự'],
            ['passwordrepeat','compare','compareAttribute'=>'password', 'message'=>'Mật khẩu chưa khớp'],
            [['username'], 'unique',
                'targetClass' => User::className(),
                'message' => 'Tên tài khoản đã tồn tại']

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Tên đăng nhập',
            'password' => 'Mật khẩu',
            'passwordrepeat' => 'Nhập lại mật khẩu',

        ];
    }





    public function uniqUsername(){
        if (User::find()->select(['username'])->where(['username' => $this->username])->count() > 0) {
            $this->addError('username', 'Tên tài khoản đã tồn tại');
            return false;
        }
        return true;
    }





}