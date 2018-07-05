<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Categories;

/**
 * CategoriesSearch represents the model behind the search form about `common\models\db\Categories`.
 */
class CategoriesSearch extends Categories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'originName', 'parentId', 'description', 'active', 'MetaKeywords', 'MetaDescription', 'MetaTitle'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Categories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'originName', $this->originName])
            ->andFilterWhere(['like', 'parentId', $this->parentId])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'MetaKeywords', $this->MetaKeywords])
            ->andFilterWhere(['like', 'MetaDescription', $this->MetaDescription])
            ->andFilterWhere(['like', 'MetaTitle', $this->MetaTitle]);

        return $dataProvider;
    }
}
