<?php
class UserManager extends Database
{
    private $users;
    public function __construct() {
        $this->users = array();
    }
    public static function GetUsers()
    {
        $users = [];
        $sql = "SELECT * FROM users;";
        $query = Database::connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        foreach ($result as $row)
        {
            if ($row['type']!="admin") {
                $user = new User($row['id'],$row['type'],$row['first_name'],$row['last_name'],$row['email'],$row['password'],$row['phone']);    
                array_push($users,$user);                
            }
        }
        return $users;
    }
    public static function GetAllAdminsExceptCurrent($email) {
        $admins = [];
        $sql = "SELECT * FROM users WHERE type != 'user' AND email != ?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$email]);
        $result = $query->fetchAll();
        foreach ($result as $row) {
            $admin = new Admin($row['id'],$row['type'],$row['first_name'],$row['last_name'],$row['email'],$row['password'],$row['phone']);
            array_push($admins,$admin);
        }
        return $admins;
    }
    public static function GetUserById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);

        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function GetUserFirstNameByID($id)
    {
        $sql = "SELECT first_name FROM users WHERE id=?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['first_name'];
        return $result;
    }
    public static function GetUserLastNameByID($id)
    {
        $sql = "SELECT last_name FROM users WHERE id=?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['last_name'];
        return $result;    
    }

    public static function GetUserFullNameById($id) {
        $sql = "SELECT first_name, last_name FROM users WHERE id=?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['first_name'] . ' ' . $result['last_name'];    
    }

    public static function LogInUser($email, $password) {
        $sql = "SELECT * FROM users where email = ?";
        $query = Database::connect()->prepare($sql);
        $query->execute([$email]);
        $result = $query->fetchAll();

        foreach($result as $row) {
            $confirmPassword = password_verify($password, $row['password']);

            if($confirmPassword) {
                // IF PASSWORD IS CORRECT
               // $userObject;
                session_start();
                if($row['type'] === 'user') {
                    // IF USER IS A USER
                    $userObject = new RegularUser($row['id'], $row['type'], $row['first_name'], $row['last_name'], $row['email'], $row['password'], $row['phone']);
                    $_SESSION['user'] = $userObject;
                    return 1;
                } else if($row['type'] === 'admin') {
                    // IF USER IS AN ADMIN
                    $userObject = new Admin($row['id'], $row['type'], $row['first_name'], $row['last_name'], $row['email'], $row['password'], $row['phone']);
                    $_SESSION['admin'] = $userObject;
                    return 2;
                }
                return 0;
                // SET CURRENT USER OBJECT AS A SESSION VARIABLE
               // $_SESSION['user'] = $userObject;

                //return true;
            }
        }
    }

    public static function GetUserIdByEmail($email)
    {
        $sql = "SELECT id FROM users WHERE email = ?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$email]);
        $result = $query->fetch()['id'];

        if(!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }

    public static function UpdateUserPreferences($firstName, $lastName, $email, $password, $phone, $id)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ?, phone = ? WHERE id = ?;";
        $query = Database::connect()->prepare($sql);
        $result = $query->execute([$firstName, $lastName, $email, $hashedPassword, $phone, $id]);

        return $result;
    }

    public static function CheckIfEmailIsInUse($email) {
        $sql = "SELECT * FROM users WHERE email = ?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$email]);
        $result = $query->fetchAll();

        if(empty($result)) {
            return false;
        } else {
            return true;
        }
    }
    public static function RegisterUser($firstName, $lastName, $email, $password, $phone) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (type, first_name, last_name, email, password, phone) VALUES ('user', ?, ?, ?, ?, ?);";
        $query = Database::connect()->prepare($sql);
        $result = $query->execute([$firstName, $lastName, $email, $hashedPassword, $phone]);
        if (!empty($result)) {
            successMessage('Registration successful!');
            return $result;
        }
       
        
    }
    public static function RegisterAdmin($firstName, $lastName, $email, $password, $phone) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (type, first_name, last_name, email, password, phone) VALUES ('admin', ?, ?, ?, ?, ?);";
        $query = Database::connect()->prepare($sql);
        $result = $query->execute([$firstName, $lastName, $email, $hashedPassword, $phone]);

        return $result;
    }
    
}

?>