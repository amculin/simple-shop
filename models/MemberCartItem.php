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
 *
 * @property MemberCart $cart
 * @property Item $itemCode
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
            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => MemberCart::className(), 'targetAttribute' => ['cart_id' => 'id']],
            [['item_code'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_code' => 'item_code']],
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

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(MemberCart::className(), ['id' => 'cart_id']);
    }

    /**
     * Gets query for [[ItemCode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemCode()
    {
        return $this->hasOne(Item::className(), ['item_code' => 'item_code']);
    }
}
