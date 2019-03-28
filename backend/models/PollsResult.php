<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "polls_result".
 *
 * @property integer $id
 * @property integer $id_answer
 * @property integer $id_polls
 * @property integer $result
 *
 * @property Polls $idPolls
 * @property PollsAnswer $idAnswer
 */
class PollsResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polls_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_answer', 'id_polls', 'result'], 'required'],
            [['id_answer', 'id_polls', 'result'], 'integer'],
            [['id_polls'], 'exist', 'skipOnError' => true, 'targetClass' => Polls::className(), 'targetAttribute' => ['id_polls' => 'id']],
            [['id_answer'], 'exist', 'skipOnError' => true, 'targetClass' => PollsAnswer::className(), 'targetAttribute' => ['id_answer' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_answer' => 'Id Answer',
            'id_polls' => 'Id Polls',
            'result' => 'Result',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPolls()
    {
        return $this->hasOne(Polls::className(), ['id' => 'id_polls']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnswer()
    {
        return $this->hasOne(PollsAnswer::className(), ['id' => 'id_answer']);
    }
}
