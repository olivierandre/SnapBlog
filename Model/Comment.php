<?php

namespace Model;

class Comment extends TextualContent {

    protected $postId;

    /**
     * Gets the value of postId.
     *
     * @return mixed
     */
    public function getPostId() {
        return $this->postId;
    }

    /**
     * Sets the value of postId.
     *
     * @param mixed $postId the post id
     *
     * @return self
     */
    public function setPostId($postId) {
        $this->postId = $postId;

        return $this;
    }
}