<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zone_village".
 *
 * @property string $id
 * @property string $district_id
 * @property string $name
 *
 * @property ZoneDistrict $district
 */
class ZoneVillage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zone_village';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'district_id', 'name'], 'required'],
            [['id'], 'string', 'max' => 10],
            [['district_id'], 'string', 'max' => 7],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => ZoneDistrict::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district_id' => 'District ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(ZoneDistrict::className(), ['id' => 'district_id']);
    }
}
