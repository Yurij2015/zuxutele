<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property int $IdSale
 * @property string $Date
 * @property int $Status
 * @property int $Orders_IdOrder
 *
 * @property Orders $ordersIdOrder
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Date', 'Orders_IdOrder'], 'required'],
            [['Date'], 'safe'],
            [['Status', 'Orders_IdOrder'], 'integer'],
            [['Orders_IdOrder'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['Orders_IdOrder' => 'IdOrder']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdSale' => 'Id Sale',
            'Date' => 'Date',
            'Status' => 'Status',
            'Orders_IdOrder' => 'Orders Id Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersIdOrder()
    {
        return $this->hasOne(Orders::className(), ['IdOrder' => 'Orders_IdOrder']);
    }
}
