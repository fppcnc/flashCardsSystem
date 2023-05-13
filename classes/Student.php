<?php

class Student
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private string $registrationTime;

    /**
     * @param int|null $id
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $email
     * @param string|null $password
     * @param string|null $registrationTime
     */
    public function __construct(int|null $id = null, string|null $firstName = null, string|null $lastName = null, string|null $email = null, string|null $password = null, string|null $registrationTime = null)
    {
        if (isset($id) && isset($firstName) && isset($lastName) && isset($email) && isset($password) && isset($registrationTime)) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->registrationTime = $registrationTime;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getRegistrationTime(): string
    {
        return $this->registrationTime;
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $password
     * @return Student
     */
    public function registerNewStudent(string $firstName, string $lastName, string $email, string $password): Student
    {
        $dbh = new PDO (DB_DNS, DB_USER, DB_PASSWD);
        $sql = "INSERT INTO student (id, firstName, lastName, email, password, registrationTime) VALUES (NULL, :firstName, :lastName, :email, :password, :registrationTime)";
        $stmt = $dbh->prepare($sql);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $registrationTime = date("Y-m-d H:i:s");
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':registrationTime', $registrationTime);
        $stmt->execute();
        $id = $dbh->lastInsertId();
        $dbh = null;
        return new Student($id, $firstName, $lastName, $email, $password, $registrationTime);
    }

    /**
     * @param $email
     * @return bool
     */
    public function checkForEmail(string $email): bool
    {
        $dbh = new PDO (DB_DNS, DB_USER, DB_PASSWD);

        // Check if email already exists in database
        $sql = "SELECT id FROM student WHERE email = :email";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetchObject('Student');
        // fetchObject returns, as an Object, the query stored in $stmt

        if ($result) {
            // if something is returned, then data is retrieved
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $email
     * @return void
     */
    public function grantAccess(string $email, string $password): bool
    {
        // check if email exists in Db
        $dbh = new PDO (DB_DNS, DB_USER, DB_PASSWD);
        $this->email = $email;
        $checkEmail = (new Student())->checkForEmail($email);
        // if check forForEmail finds something, then stores it in $checkEmail
        if ($checkEmail === true) {
            // search if input passwd matches the one associated to email in Db
            $sql = "SELECT password FROM student WHERE email =:email";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $hash_password = $stmt->fetch();
            $this->password = $password;
            $validity = password_verify($password, $hash_password['password']);
        } else {
            $validity = false;
        }
        return $validity;
    }
}