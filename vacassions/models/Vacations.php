<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "vacations".
 *
 * @property integer $id
 * @property string $name
 * @property string $company
 * @property string $town
 * @property string $descript
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 * @property integer $access
 * @property integer $category_id
 * @property string $img_address
 *
 * @property Access[] $accesses
 * @property Category $category
 */
class Vacations extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacations';
    }

    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            [['name', 'descript', 'img_address'], 'required'],
            [['descript'], 'string'],
            [['access', 'category_id'], 'integer'],
            [['name', 'company', 'town', 'phone', 'created_at', 'updated_at', 'img_address'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'company' => 'Company',
            'town' => 'Town',
            'descript' => 'Descript',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'access' => 'Access',
            'category_id' => 'Category ID',
            'img_address' => 'Img Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesses()
    {
        return $this->hasMany(Access::className(), ['vacations_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\VacationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\VacationsQuery(get_called_class());
    }
    
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}
