<?php

	namespace Model;

	use \Validator;

	class TextualContent extends Entity {


	    // propriétés de notre objet

		protected $content;
		protected $username;
		protected $email;
		protected $published;


	    //getters et setters (accesseurs / mutateurs)

	    /**
	     * Gets the value of id.
	     *
	     * @return mixed
	     */
	    public function getId()
	    {
	        return \Tool\SecurityTool::safeOnGet($this->id);
	    }

	    /**
	     * Sets the value of id.
	     *
	     * @param mixed $id the id
	     *
	     * @return self
	     */
	    public function setId($id)
	    {
	        $this->id = \Tool\SecurityTool::safeOnSet($id);

	        return $this;
	    }

	    

	    /**
	     * Gets the value of content.
	     *
	     * @return mixed
	     */
	    public function getContent()
	    {
	        return \Tool\SecurityTool::safeOnGet($this->content);
	    }

	    /**
	     * Sets the value of content.
	     *
	     * @param mixed $content the content
	     *
	     * @return self
	     */
	    public function setContent($content)
	    {
	        $this->content = \Tool\SecurityTool::safeOnSet($content);

	        return $this;
	    }

	    /**
	     * Gets the value of username.
	     *
	     * @return mixed
	     */
	    public function getUsername()
	    {
	        return \Tool\SecurityTool::safeOnGet($this->username);
	    }

	    /**
	     * Sets the value of username.
	     *
	     * @param mixed $username the username
	     *
	     * @return self
	     */
	    public function setUsername($username)
	    {
	        $this->username = \Tool\SecurityTool::safeOnSet($username);

	        return $this;
	    }

	    /**
	     * Gets the value of email.
	     *
	     * @return mixed
	     */
	    public function getEmail()
	    {
	        return \Tool\SecurityTool::safeOnGet($this->email);
	    }

	    /**
	     * Sets the value of email.
	     *
	     * @param mixed $email the email
	     *
	     * @return self
	     */
	    public function setEmail($email)
	    {
	        $this->email = \Tool\SecurityTool::safeOnSet($email);

	        return $this;
	    }

	    /**
	     * Gets the value of published.
	     *
	     * @return mixed
	     */
	    public function getPublished()
	    {
	        return \Tool\SecurityTool::safeOnGet($this->published);
	    }

	    /**
	     * Sets the value of published.
	     *
	     * @param mixed $published the published
	     *
	     * @return self
	     */
	    public function setPublished($published)
	    {
	        $this->published = \Tool\SecurityTool::safeOnSet($published);

	        return $this;
	    }

	}