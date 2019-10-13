<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $IdUser
 * @property string $Login
 * @property string $Password
 * @property int $Status
 * @property int $Roles_IdRole
 *
 * @property Orders[] $orders
 * @property Roles $rolesIdRole
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Login', 'Password', 'Roles_IdRole'], 'required'],
            [['Status', 'Roles_IdRole'], 'integer'],
            [['Login'], 'string', 'max' => 45],
            [['Password'], 'string', 'max' => 55],
            [['Roles_IdRole'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['Roles_IdRole' => 'IdRole']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUser' => 'Id User',
            'Login' => 'Login',
            'Password' => 'Password',
            'Status' => 'Status',
            'Roles_IdRole' => 'Roles Id Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['Users_IdUser' => 'IdUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolesIdRole()
    {
        return $this->hasOne(Roles::className(), ['IdRole' => 'Roles_IdRole']);
    }
}
