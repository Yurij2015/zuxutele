<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $IdService
 * @property string $Name
 * @property double $Cost
 * @property string $Description
 * @property int $Category_IdCategory
 *
 * @property Orders[] $orders
 * @property Category $categoryIdCategory
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Cost', 'Description', 'Category_IdCategory'], 'required'],
            [['Cost'], 'number'],
            [['Category_IdCategory'], 'integer'],
            [['Name'], 'string', 'max' => 100],
            [['Description'], 'string', 'max' => 250],
            [['Category_IdCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_IdCategory' => 'IdCategory']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdService' => 'Id Service',
            'Name' => 'Name',
            'Cost' => 'Cost',
            'Description' => 'Description',
            'Category_IdCategory' => 'Category Id Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['Literature_IdLiterature' => 'IdService']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryIdCategory()
    {
        return $this->hasOne(Category::className(), ['IdCategory' => 'Category_IdCategory']);
    }
}
