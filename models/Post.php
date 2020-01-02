<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;
/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $note
 * @property integer $created
 * @property string $created_at
 * @property integer $updted
 * @property string $updated_at
 * 
 * @property User $updted0
 * @property User $created0
 * @property PostTag[] $postTags
 * @property Tag[] $tags
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $tags=[];
    public $gsearch;
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'note', 'created', 'created_at','tags'], 'required'],
            [['note'], 'string'],
            [['created', 'updted','status'], 'integer'],
            [['post','created_at', 'updated_at','tags','live_demo','github_link'], 'safe'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'note' => 'Note',
            'created' => 'Created',
            'created_at' => 'Created At',
            'updted' => 'Updted',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdted0()
    {
        return $this->hasOne(User::className(), ['id' => 'updted']);
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreated0()
    {
        return $this->hasOne(User::className(), ['id' => 'created']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('post_tag', ['post_id' => 'id']);
    }
}
