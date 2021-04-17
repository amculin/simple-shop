<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_cart".
 *
 * @property int $id
 * @property int $user_id
 * @property int $status 0 = Is unpaid; 1 = Is paid; 2 = Is being packed; 3 = Is on delivery; 4 = Is delivered;
 * @property int $amount
 * @property int $total_price
 * @property string $created_date
 * @property string|null $updated_date
 */
class MemberCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'amount', 'total_price'], 'required'],
            [['user_id', 'status', 'amount', 'total_price'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
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
            'status' => 'Status',
            'amount' => 'Amount',
            'total_price' => 'Total Price',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
