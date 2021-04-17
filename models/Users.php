<?php

namespace app\models;

use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $full_name
 * @property string $photo_url
 * @property int $status 0: Inactive | 1: Active
 * @property int $created_time
 * @property int|null $updated_time
 */
class Users extends User implements \yii\web\IdentityInterface
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public $password;

    /**
     * {@inheritdoc}
     */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function beforeValidate()
    {
        parent::beforeValidate();

        if ($this->isNewRecord) {
            $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
			$this->auth_key = md5(Yii::$app->getSecurity()->generatePasswordHash($this->password_hash));
			$this->status = $this::STATUS_ACTIVE;
		}

        return true;
    }
}
