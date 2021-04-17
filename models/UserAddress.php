<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_address".
 *
 * @property int $id
 * @property int $user_id
 * @property string $address_name
 * @property string $receiver_name
 * @property int $phone_number
 * @property string $district_id
 * @property string $city_id
 * @property int $postal_code
 * @property string $address
 * @property string $created_date
 * @property string $updated_date
 *
 * @property User $user
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'address_name', 'receiver_name', 'phone_number', 'district_id', 'city_id', 'postal_code', 'address', 'updated_date'], 'required'],
            [['user_id', 'phone_number', 'postal_code'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['address_name', 'receiver_name'], 'string', 'max' => 64],
            [['district_id'], 'string', 'max' => 7],
            [['city_id'], 'string', 'max' => 4],
            [['address'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'address_name' => 'Address Name',
            'receiver_name' => 'Receiver Name',
            'phone_number' => 'Phone Number',
            'district_id' => 'District ID',
            'city_id' => 'City ID',
            'postal_code' => 'Postal Code',
            'address' => 'Address',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
