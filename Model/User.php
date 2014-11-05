<?php

	namespace Model;

	class User extends Entity {

		protected $username;
		protected $email;
		protected $password;
		protected $salt;
		protected $token;

    /**
     * Gets the value of username.
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
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
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
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
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the value of password.
     *
     * @param mixed $password the password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Gets the value of salt.
     *
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Sets the value of salt.
     *
     * @param mixed $salt the salt
     *
     * @return self
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Gets the value of token.
     *
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Sets the value of token.
     *
     * @param mixed $token the token
     *
     * @return self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    public static function setCookieUser($username, $email) {
        setcookie("snapblog_username", $username, time() + 300, '/');
        setcookie("snapblog_email", $email, time() + 300, '/');
    }

    public static function isCookieUserExist() {
        if( empty($_COOKIE["snapblog_username"]) && empty($_COOKIE["snapblog_email"]) ) {
            return false;
        }
        return true;
    }

    public static function getUsernameViaCookie() {
        return $_COOKIE["snapblog_username"];
    }

    public static function getEmailViaCookie() {
        return $_COOKIE["snapblog_email"];
    }

}