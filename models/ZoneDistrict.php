<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zone_district".
 *
 * @property string $id
 * @property string $regency_id
 * @property string $name
 *
 * @property ZoneCity $regency
 * @property ZoneVillage[] $zoneVillages
 */
class ZoneDistrict extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zone_district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'regency_id', 'name'], 'required'],
            [['id'], 'string', 'max' => 7],
            [['regency_id'], 'string', 'max' => 4],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['regency_id'], 'exist', 'skipOnError' => true, 'targetClass' => ZoneCity::className(), 'targetAttribute' => ['regency_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regency_id' => 'Regency ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Regency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegency()
    {
        return $this->hasOne(ZoneCity::className(), ['id' => 'regency_id']);
    }

    /**
     * Gets query for [[ZoneVillages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZoneVillages()
    {
        return $this->hasMany(ZoneVillage::className(), ['district_id' => 'id']);
    }
}
