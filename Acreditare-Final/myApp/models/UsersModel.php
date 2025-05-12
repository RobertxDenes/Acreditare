<?php

class UsersModel extends DBModel
{
    protected $name;
    protected $email;
    protected $pass;

    public function __construct($n = 0, $e = 0, $p = 0)
    {
        $this->name = $n;
        $this->email = $e;
        $this->pass = $p;
    }

    public function getDetails()
    {
        return $this->name . ' are e-mailul '
            . $this->email . ' și parola '
            . $this->pass;
    }
    public function getUsers()
    {
        $q = "SELECT * FROM	users_test";
        $result = $this->db()->query($q);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function isAuth($uName, $uPass)
    {
        $interogare = "SELECT * FROM `users_test` WHERE `userName`=?;";
        $myPrep = $this->db()->prepare($interogare);
        $myPrep->bind_param("s", $uName);
        $myPrep->execute();
        $rez = $myPrep->get_result()->fetch_assoc();
        if ($rez) {
            if (password_verify($uPass, $rez['hashedPass']))
                return true;
            else
                return false;
        } else
            return false;
    }
    public function addUser($userName, $userPass)
    {
        $interogare = "SELECT * FROM `users_test` WHERE `userName`=?;";
        $myPrep = $this->db()->prepare($interogare);
        $myPrep->bind_param("s", $userName);
        $myPrep->execute();
        $rez = $myPrep->get_result()->fetch_assoc();
        if (isset($rez['userName'])) {
            return false;
        }
        $interogare = "INSERT INTO `users_test`(`userName`, `userPass`, `hashedPass`) VALUES (?,?,?)";
        $myPrep = $this->db()->prepare($interogare);
        $hash = password_hash($userPass, PASSWORD_DEFAULT);
        $myPrep->bind_param("sss", $userName, $userPass, $hash);
        $myPrep->execute();
        $myPrep->close();
        return true;
    }
}