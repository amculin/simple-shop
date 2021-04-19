<?php

namespace app\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "simple_pay".
 *
 * @property string $account_number
 * @property int $user_id
 * @property int $balance
 * @property string $created_date
 * @property string|null $updated_date
 *
 * @property User $user
 */
class SimplePay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'simple_pay';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_number', 'user_id', 'balance'], 'required'],
            [['account_number', 'user_id'], 'unique'],
            [['user_id', 'balance'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['account_number'], 'string', 'max' => 8],
            [['account_number'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'account_number' => 'Account Number',
            'user_id' => 'User ID',
            'balance' => 'Balance',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            Yii::$app->user->identity->is_using_simple_pay = User::IS_USING_SIMPLE_PAY;
            Yii::$app->user->identity->update();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function beforeValidate()
    {
        parent::beforeValidate();

        if ($this->isNewRecord) {
            $this->user_id = Yii::$app->user->identity->id;
            $this->account_number = strtoupper(substr(md5($this->user_id), 0, 8));
        } else
            $this->updated_date = date('Y-m-d H:i:s');

        return true;
    }
}
