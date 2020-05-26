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
            ['passwordrepeat','compare','compareAttribute'=>'password', 'message'=>'Mật khẩu chưa khớp'],

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



    public function passwordRepeat()
    {
        if ($this->password != $this->passwordrepeat) {
            $this->addError('passwordrepeat', 'Mật khẩu không kh');
            return false;
        }
        return true;
    }

    public function uniqUsername(){
        if (User::find()->select(['username'])->where(['username' => $this->username])->count() > 0) {
            $this->addError('username', 'Имя пользователя должно быть уникально.');
            return false;
        }
        return true;
    }





}