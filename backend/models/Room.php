<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property integer $house_id
 * @property string $description
 *
 * @property House $house
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['house_id', 'description'], 'required'],
            [['house_id'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['house_id'], 'exist', 'skipOnError' => true, 'targetClass' => House::className(), 'targetAttribute' => ['house_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'house_id' => 'House ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHouse()
    {
        return $this->hasOne(House::className(), ['id' => 'house_id']);
    }
}
