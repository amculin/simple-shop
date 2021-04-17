<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property int $user_type 1 = Administrator | 2 = Member
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $phone_number
 * @property int $status 0 = Inactive | 1 = Active
 * @property int $is_using_simpley_pay 0 = false; 1 = true;
 * @property string|null $created_time
 * @property string|null $updated_time
 */
class User extends \yii\db\ActiveRecord
{
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
            [['username', 'user_type', 'auth_key', 'password_hash', 'email', 'phone_number', 'is_using_simpley_pay'], 'required'],
            [['user_type', 'phone_number', 'status', 'is_using_simpley_pay'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'user_type' => 'User Type',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'status' => 'Status',
            'is_using_simpley_pay' => 'Is Using Simpley Pay',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
}
