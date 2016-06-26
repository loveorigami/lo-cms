<?php
namespace console\controllers\import;

use Zelenin\Ddd\String\Infrastructure\Service\Transformer;
use Zelenin\Ddd\String\Domain\Model\TransformerCollection;
use Zelenin\Ddd\String\Infrastructure\Service\Transformer\IntlNormalizeTransformer;
use Zelenin\Ddd\String\Infrastructure\Service\Transformer\IntlTransliterateTransformer;
use Zelenin\Ddd\String\Infrastructure\Service\Transformer\UrlifyTransformer;

class Story
{

    public function write($tbl, $data)
    {

        $transformers = [
            new IntlNormalizeTransformer(),
            new IntlTransliterateTransformer('Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFKC; [:Punctuation:] Remove;'),
            new UrlifyTransformer()
        ];
        $transformer = new Transformer(new TransformerCollection($transformers));
        $slug = $transformer->transform($data['title']);
        
        $slug2 = $this->checkSlug($slug, $data['id_story']);

        \Yii::$app->db->createCommand()->insert($tbl, [
            'id' => $data['id_story'],
            'status' => $data['is_activ'],

            'author_id' => 1,
            'updater_id' => 1,
            'created_at' => strtotime($data['date']),
            'updated_at' => time(),

            'name' => $data['title'],
            'slug' => $slug2,
            'text' => $data['story'],
            'lib_id' => $data['id_wrt'],
            'aut_id' => $data['id_aut'],
            'aut2_id' => $data['id_aut2'],
            'epigraph' => $data['epigraph'],
            'intro' => $data['intro'],
            'prim' => $data['prim'],
            'img' => $data['preload'],
            'total_hits' => $data['view'],

        ])->execute();


        //$this->addAuthor($data['id_story'], $data['id_aut']);
        //$this->addAuthor($data['id_story'], $data['id_aut2']);
    }

    protected function addAuthor($story_id, $aut_id){
        if(!$aut_id) return;

        \Yii::$app->db->createCommand()->insert('{{%love__author_story}}', [
            'story_id' => $story_id,
            'aut_id' => $aut_id,
        ])->execute();
    }

    protected function checkSlug($slug, $story_id){

        $query = "SELECT * FROM mx_love__story  WHERE slug = '$slug'";
        $item = \Yii::$app->db->createCommand($query)->queryOne();
        if($item) return $slug.'-'.$story_id;
        return $slug;
    }
} 