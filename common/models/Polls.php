<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "polls".
 *
 * @property integer $id
 * @property string $question
 * @property string $date_begin
 * @property string $date_end
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
            [['id', 'question', 'date_begin', 'date_end'], 'required'],
            [['id'], 'integer'],
            [['question'], 'string'],
            [['date_begin', 'date_end'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'date_begin' => 'Date Begin',
            'date_end' => 'Date End',
        ];
    }
}
