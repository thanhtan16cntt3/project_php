<?php
class UserModel extends Database
{

    public function checkUser($username)
    {
        $query = "SELECT username FROM users WHERE username = '$username'";

        $row = mysqli_query($this->conn, $query);
        if (isset($row)) {
            if (mysqli_num_rows($row) > 0) {
                return false;
            }
        }
        return true;
    }

    public function InsertNewUser($username, $fullname, $email, $password, $img = "")
    {
        $query = "INSERT INTO users VALUES (NULL, '$username', '$password', '$email', '$img', '$fullname')";

        $result = false;
        if (mysqli_query($this->conn, $query)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function userLogin($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $row = mysqli_query($this->conn, $query);
        if (isset($row)) {
            if (mysqli_num_rows($row) > 0) {
                $result = mysqli_fetch_assoc($row);
                $dbPassword = $result['password'];
                $userID = $result['user_id'];
                if (password_verify($password, $dbPassword)) {
                    return ['status' => 'ok', 'userID' => $userID];
                } else {
                    return ['status' => 'PasswordNotMatched'];
                }
            } else {
                return ['status' => 'UsernameNotFound'];
            }
        }

    }
}
