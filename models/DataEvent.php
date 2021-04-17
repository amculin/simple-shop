<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_event".
 *
 * @property int $id
 * @property string $event_name
 * @property int $event_type 1 = Hourly; 2 = Daily; 3 = Weekly; 4 = Incidental;
 * @property string $created_date
 * @property string|null $updated_date
 */
class DataEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_name', 'event_type'], 'required'],
            [['event_type'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['event_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_name' => 'Event Name',
            'event_type' => 'Event Type',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
