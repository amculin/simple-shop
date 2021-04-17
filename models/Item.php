<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property string $item_code
 * @property string $item_name
 * @property int $weight In grams
 * @property int $base_price In Rupiah
 * @property int $item_category_id
 * @property int $stock
 * @property string $created_date
 * @property string|null $updated_date
 *
 * @property MemberCart[] $carts
 * @property EventItem[] $eventItems
 * @property ItemCategory $itemCategory
 * @property MemberCartItem[] $memberCartItems
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_code', 'item_name', 'weight', 'base_price', 'item_category_id', 'stock'], 'required'],
            [['weight', 'base_price', 'item_category_id', 'stock'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['item_code'], 'string', 'max' => 15],
            [['item_name'], 'string', 'max' => 255],
            [['item_code'], 'unique'],
            [['item_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::className(), 'targetAttribute' => ['item_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_code' => 'Item Code',
            'item_name' => 'Item Name',
            'weight' => 'Weight',
            'base_price' => 'Base Price',
            'item_category_id' => 'Item Category ID',
            'stock' => 'Stock',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(MemberCart::className(), ['id' => 'cart_id'])->viaTable('member_cart_item', ['item_code' => 'item_code']);
    }

    /**
     * Gets query for [[EventItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventItems()
    {
        return $this->hasMany(EventItem::className(), ['item_code' => 'item_code']);
    }

    /**
     * Gets query for [[ItemCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemCategory()
    {
        return $this->hasOne(ItemCategory::className(), ['id' => 'item_category_id']);
    }

    /**
     * Gets query for [[MemberCartItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMemberCartItems()
    {
        return $this->hasMany(MemberCartItem::className(), ['item_code' => 'item_code']);
    }
}
