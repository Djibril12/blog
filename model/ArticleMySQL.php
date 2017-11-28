<?php

class ArticleMySQL
{
    protected $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function add(Article $article)
    {
        $sql = 'INSERT INTO article VALUES (NULL, :title, :teaser, :content, :published, :created_at)';
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(array(
            'title' => $article->getTitle(),
            'teaser' => $article->getTeaser(),
            'content' => $article->getContent(),
            'published' => $article->getPublished(),
            'created_at' => $article->getCreatedAt()->format('Y-m-d h:i:s'),
        ));
        return $result;
    }
    public function all()
    {
        $sql = 'SELECT * FROM article';
        $stmt = $this->pdo->prepare($sql);
        $articles = [];
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $article) {
                $a = new Article();
                $a->setId($article['id'])
                  ->setTitle($article['title'])
                  ->setTeaser($article['teaser'])
                  ->setContent($article['content'])
                  ->setPublished($article['published'])
                  ->setCreatedAt(new DateTime($article['created_at']));
                $articles[] = $a;
            } 
        }
        return $articles;
    }
}