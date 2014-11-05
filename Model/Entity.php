<?php

	namespace Model;

	class Entity {

		//aucun setter pour l'id, pas besoin
		protected $id;
		protected $dateCreated;
		protected $dateModified;
	
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
     * Gets the value of dateCreated.
     *
     * @return mixed
     */
    public function getDateCreated()
    {
        return \Tool\SecurityTool::safeOnGet($this->dateCreated);
    }

    /**
     * Sets the value of dateCreated.
     *
     * @param mixed $dateCreated the date created
     *
     * @return self
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = \Tool\SecurityTool::safeOnSet($dateCreated);

        return $this;
    }

    /**
     * Gets the value of dateModified.
     *
     * @return mixed
     */
    public function getDateModified()
    {
        return \Tool\SecurityTool::safeOnGet($this->dateModified);
    }

    /**
     * Sets the value of dateModified.
     *
     * @param mixed $dateModified the date modified
     *
     * @return self
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = \Tool\SecurityTool::safeOnSet($dateModified);

        return $this;
    }
}