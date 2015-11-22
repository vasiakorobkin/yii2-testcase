<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;
use app\models\Author;

/**
 * BookSearch represents the model behind the search form about `app\models\Book`.
 */
class BookSearch extends Book
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
            [['name', 'date_create', 'date_update', 'preview', 'date'], 'safe'],
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
        $query = Book::find();

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
            '{{books}}.id' => $this->id,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'date' => $this->date,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'preview', $this->preview]);

        $query->joinWith('author')
            ->select([
                '{{books}}.*',
                "CONCAT({{authors}}.firstname, ' ', {{authors}}.lastname) as author_fullname"
            ])
            ->asArray();

        $dataProvider->sort->attributes['author_fullname'] = [
            'asc' => ['author_fullname' => SORT_ASC],
            'desc' => ['author_fullname' => SORT_DESC],
        ];

        return $dataProvider;
    }

    /**
     * Returns query to provide information for authors select
     *
     * @return ActiveQuery
     */
    public function getAuthors()
    {
        $query = Author::find();
        $query->select(['{{authors}}.id', "CONCAT({{authors}}.firstname, ' ', {{authors}}.lastname) as fullname"])
            ->orderBy('fullname')
            ->asArray();
        return $query;
    }
}
