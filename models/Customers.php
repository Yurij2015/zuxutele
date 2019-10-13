<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $IdCustomer
 * @property string $SecondName
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $Address
 * @property string $Phone
 *
 * @property Orders[] $orders
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SecondName', 'FirstName', 'MiddleName', 'Address', 'Phone'], 'required'],
            [['SecondName', 'FirstName', 'MiddleName'], 'string', 'max' => 45],
            [['Address'], 'string', 'max' => 100],
            [['Phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdCustomer' => Yii::t('translatezazu', 'Id Customer'),
            'SecondName' => Yii::t('translatezazu', 'Second Name'),
            'FirstName' => Yii::t('translatezazu', 'First Name'),
            'MiddleName' => Yii::t('translatezazu', 'Middle Name'),
            'Address' => Yii::t('translatezazu', 'Address'),
            'Phone' => Yii::t('translatezazu', 'Phone'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['Customers_IdCustomer' => 'IdCustomer']);
    }
}
