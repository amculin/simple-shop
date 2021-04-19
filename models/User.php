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
 * @property int $is_using_simple_pay 0 = false; 1 = true;
 * @property string|null $created_time
 * @property string|null $updated_time
 *
 * @property MemberCart[] $memberCarts
 * @property SimplePay[] $simplePays
 * @property UserAddress[] $userAddresses
 * @property UserBankAccount[] $userBankAccounts
 * @property UserBiodata[] $userBiodatas
 */
class User extends \yii\db\ActiveRecord
{
    const IS_NOT_USING_SIMPLE_PAY = 0;
    const IS_USING_SIMPLE_PAY = 1;

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
            [['username', 'user_type', 'auth_key', 'password_hash', 'email', 'phone_number'], 'required'],
            [['username', 'email', 'phone_number'], 'unique'],
            ['email', 'email'],
            [['user_type', 'phone_number', 'status', 'is_using_simple_pay'], 'integer'],
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
            'is_using_simple_pay' => 'Is Using Simple Pay',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }

    /**
     * Gets query for [[MemberCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMemberCarts()
    {
        return $this->hasMany(MemberCart::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[SimplePays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSimplePays()
    {
        return $this->hasMany(SimplePay::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddresses()
    {
        return $this->hasMany(UserAddress::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserBankAccounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserBankAccounts()
    {
        return $this->hasMany(UserBankAccount::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserBiodatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserBiodatas()
    {
        return $this->hasMany(UserBiodata::className(), ['user_id' => 'id']);
    }
}
