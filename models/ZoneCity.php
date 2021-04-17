<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zone_city".
 *
 * @property string $id
 * @property string $province_id
 * @property string $name
 *
 * @property ZoneProvince $province
 * @property ZoneDistrict[] $zoneDistricts
 */
class ZoneCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zone_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'name'], 'required'],
            [['id'], 'string', 'max' => 4],
            [['province_id'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => ZoneProvince::className(), 'targetAttribute' => ['province_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_id' => 'Province ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Province]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(ZoneProvince::className(), ['id' => 'province_id']);
    }

    /**
     * Gets query for [[ZoneDistricts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZoneDistricts()
    {
        return $this->hasMany(ZoneDistrict::className(), ['regency_id' => 'id']);
    }
}
