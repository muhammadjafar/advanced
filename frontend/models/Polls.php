<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "polls".
 *
 * @property integer $id
 * @property string $judul
 * @property string $question
 *
 * @property PollsAnswer[] $pollsAnswers
 * @property PollsResult[] $pollsResults
 */
class Polls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'question'], 'required'],
            [['judul', 'question'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'question' => 'Question',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollsAnswers()
    {
        return $this->hasMany(PollsAnswer::className(), ['id_poll' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollsResults()
    {
        return $this->hasMany(PollsResult::className(), ['id_polls' => 'id']);
    }
}
