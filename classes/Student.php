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
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $password
     * @param string $registrationTime
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
    public function getemail(): string
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
        return new Student($id, $firstName, $lastName, $password, $registrationTime);
    }

}