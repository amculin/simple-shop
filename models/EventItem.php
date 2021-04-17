<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_item".
 *
 * @property int $id
 * @property string $item_code
 * @property int $data_event_id
 * @property string $created_date
 * @property string|null $updated_date
 *
 * @property DataEvent $dataEvent
 * @property Item $itemCode
 */
class EventItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_code', 'data_event_id'], 'required'],
            [['data_event_id'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['item_code'], 'string', 'max' => 15],
            [['data_event_id'], 'exist', 'skipOnError' => true, 'targetClass' => DataEvent::className(), 'targetAttribute' => ['data_event_id' => 'id']],
            [['item_code'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_code' => 'item_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_code' => 'Item Code',
            'data_event_id' => 'Data Event ID',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * Gets query for [[DataEvent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataEvent()
    {
        return $this->hasOne(DataEvent::className(), ['id' => 'data_event_id']);
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
