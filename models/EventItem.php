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
}
