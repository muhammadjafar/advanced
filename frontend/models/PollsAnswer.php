<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "polls_answer".
 *
 * @property integer $id
 * @property integer $id_poll
 * @property string $answer
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
            [[ 'answer'], 'required'],
            ['id','integer'],
            [['answer'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'answer' => 'Answer',
        ];
    }

    public function getAnswerOptions()
    {
        return [
            '0' => 'sangat memuaskan',
            '1' => 'Yii',
            '2' => 'CI',
        ];
    }
}
