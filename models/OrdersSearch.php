<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdOrder', 'Customers_IdCustomer', 'Users_IdUser', 'Literature_IdLiterature', 'Count'], 'integer'],
            [['Date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdOrder' => $this->IdOrder,
            'Date' => $this->Date,
            'Customers_IdCustomer' => $this->Customers_IdCustomer,
            'Users_IdUser' => $this->Users_IdUser,
            'Literature_IdLiterature' => $this->Literature_IdLiterature,
            'Count' => $this->Count,
        ]);

        return $dataProvider;
    }
}
