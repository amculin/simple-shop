<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zone_province".
 *
 * @property string $id
 * @property string $name
 *
 * @property ZoneCity[] $zoneCities
 */
class ZoneProvince extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zone_province';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ZoneCities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZoneCities()
    {
        return $this->hasMany(ZoneCity::className(), ['province_id' => 'id']);
    }
}
