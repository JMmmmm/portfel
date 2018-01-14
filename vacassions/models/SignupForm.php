<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    
    public $username;
    public $email;
    public $password;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message'=>'Пожалуйста, введите ваш логин'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такой пользователь уже существует.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required', 'message'=>'Пожалуйста, введите ваш email'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такой email уже существует.'],
            ['password', 'required', 'message'=>'Пожалуйста, введите пароль'],
            ['password', 'string', 'min' => 6, 'message'=>'Минимально 6 символов'],
        ];
    }
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
    
}