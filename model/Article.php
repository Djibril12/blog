<?php

class Article {

    private $id;
    private $title;
    private $teaser;
    private $content;
    private $published;
    private $createdAt;

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getTeaser() {
        return $this->teaser;
    }

    public function getContent() {
        return $this->content;
    }

    public function getPublished() {
        return $this->published;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = (string) $title;
        return $this;
    }

    public function setTeaser($teaser) {
        $this->teaser = (string) $teaser;
        return $this;
    }

    public function setContent($content) {
        $this->content = (string) $content;
        return $this;
    }

    public function setPublished($published) {
        $this->published = (int) $published;
        return $this;
    }

    public function setCreatedAt(DateTime $createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

}
