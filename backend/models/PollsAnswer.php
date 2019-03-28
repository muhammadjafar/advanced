<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "polls_answer".
 *
 * @property integer $id
 * @property integer $id_poll
 * @property string $answer
 *
 * @property Polls $idPoll
 * @property PollsResult[] $pollsResults
 */
class PollsAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polls_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['answer'], 'required'],
            [['id_poll'], 'integer'],
            [['answer'], 'string'],
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
            'answer' => 'Answer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPoll()
    {
        return $this->hasOne(Polls::className(), ['id' => 'id_poll']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollsResults()
    {
        return $this->hasMany(PollsResult::className(), ['id_answer' => 'id']);
    }
}
