<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "active_event".
 *
 * @property int $id
 * @property int $data_event_id
 * @property string $start_time
 * @property string $finish_time
 * @property string $created_date
 * @property string|null $updated_date
 */
class ActiveEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'active_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_event_id', 'start_time', 'finish_time'], 'required'],
            [['data_event_id'], 'integer'],
            [['start_time', 'finish_time', 'created_date', 'updated_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_event_id' => 'Data Event ID',
            'start_time' => 'Start Time',
            'finish_time' => 'Finish Time',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
