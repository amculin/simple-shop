<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_biodata".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birth_place
 * @property string $birth_date
 * @property int $sex 1 = Male; 2 = Female;
 * @property string $created_date
 * @property string|null $updated_date
 */
class UserBiodata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_biodata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'first_name', 'last_name', 'birth_place', 'birth_date', 'sex'], 'required'],
            [['user_id', 'sex'], 'integer'],
            [['birth_date', 'created_date', 'updated_date'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 32],
            [['birth_place'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birth_place' => 'Birth Place',
            'birth_date' => 'Birth Date',
            'sex' => 'Sex',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
