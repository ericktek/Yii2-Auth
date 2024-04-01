<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    
    public $imageFile; // Uploaded image file
    public $password_confirm; // Confirm password field
    public $password_hash;




    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password','email' , 'password_confirm'], 'required'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
            ['password', 'string', 'min' => 6],
            [['username', 'password', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],

        ];
    }
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
    public function afterValidate()
    {
        parent::afterValidate();

        // Set default role if it's empty
        if (empty($this->role)) {
            $this->role = self::ROLE_USER;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
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
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function upload()
    {
        if ($this->validate()) {
            $uploadDir = 'uploads/';
            $filePath = $uploadDir . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            if ($this->imageFile->saveAs($filePath)) {
                $this->image = $filePath;
                return true;
            }
        }
        return false;
    }
}
