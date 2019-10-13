<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $IdOrder
 * @property string $Date
 * @property int $Customers_IdCustomer
 * @property int $Users_IdUser
 * @property int $Literature_IdLiterature
 * @property int $Count
 *
 * @property Customers $customersIdCustomer
 * @property Users $usersIdUser
 * @property Services $literatureIdLiterature
 * @property Sales[] $sales
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Date', 'Customers_IdCustomer', 'Users_IdUser', 'Literature_IdLiterature', 'Count'], 'required'],
            [['Date'], 'safe'],
            [['Customers_IdCustomer', 'Users_IdUser', 'Literature_IdLiterature', 'Count'], 'integer'],
            [['Customers_IdCustomer'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['Customers_IdCustomer' => 'IdCustomer']],
            [['Users_IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['Users_IdUser' => 'IdUser']],
            [['Literature_IdLiterature'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['Literature_IdLiterature' => 'IdService']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdOrder' => 'Id Order',
            'Date' => 'Date',
            'Customers_IdCustomer' => 'Customers Id Customer',
            'Users_IdUser' => 'Users Id User',
            'Literature_IdLiterature' => 'Literature Id Literature',
            'Count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomersIdCustomer()
    {
        return $this->hasOne(Customers::className(), ['IdCustomer' => 'Customers_IdCustomer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersIdUser()
    {
        return $this->hasOne(Users::className(), ['IdUser' => 'Users_IdUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLiteratureIdLiterature()
    {
        return $this->hasOne(Services::className(), ['IdService' => 'Literature_IdLiterature']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['Orders_IdOrder' => 'IdOrder']);
    }
}
