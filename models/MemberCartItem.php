<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_cart_item".
 *
 * @property int $cart_id
 * @property string $item_code
 * @property int $amount
 * @property int $total_price
 * @property string $created_date
 * @property string|null $updated_date
 */
class MemberCartItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_cart_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cart_id', 'item_code', 'amount', 'total_price'], 'required'],
            [['cart_id', 'amount', 'total_price'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['item_code'], 'string', 'max' => 15],
            [['cart_id', 'item_code'], 'unique', 'targetAttribute' => ['cart_id', 'item_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cart_id' => 'Cart ID',
            'item_code' => 'Item Code',
            'amount' => 'Amount',
            'total_price' => 'Total Price',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
