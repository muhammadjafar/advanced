<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property integer $author_id
 * @property string $title
 * @property string $deskripsi
 * @property string $content
 * @property string $date
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'title', 'deskripsi', 'content', 'date'], 'required'],
            [['author_id'], 'integer'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['deskripsi', 'content'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'title' => 'Title',
            'deskripsi' => 'Deskripsi',
            'content' => 'Content',
            'date' => 'Date',
        ];
    }
}
