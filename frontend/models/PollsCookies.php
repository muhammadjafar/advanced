<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "polls_cookies".
 *
 * @property integer $id
 * @property integer $id_poll
 * @property string $cookies
 *
 * @property Polls $idPoll
 */
class PollsCookies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polls_cookies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_poll', 'cookies'], 'required'],
            [['id_poll'], 'integer'],
            [['cookies'], 'string', 'max' => 50],
            [['id_poll'], 'exist', 'skipOnError' => true, 'targetClass' => Polls::className(), 'targetAttribute' => ['id_poll' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_poll' => 'Id Poll',
            'cookies' => 'Cookies',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPoll()
    {
        return $this->hasOne(Polls::className(), ['id' => 'id_poll']);
    }
}
