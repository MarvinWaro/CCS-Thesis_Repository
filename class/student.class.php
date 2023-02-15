<?php

require_once 'database.php';

class Student{
    //attributes

    public $firstname;
    public $middle_name;
    public $lastname;
    public $email;
    public $username;
    public $password;
    public $course;
    public $year_level;
    public $section;
    public $sem;
    public $type;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO student (firstname, middle_name, lastname,  email, username, password, course ,year_level, section, sem, type) VALUES
        (:firstname, :middle_name, :lastname, :email, :username, :password, :course, :year_level, :section, :sem, :type);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':course', $this->course);
        $query->bindParam(':year_level', $this->year_level);
        $query->bindParam(':section', $this->section);
        $query->bindParam(':sem', $this->sem);
        $query->bindParam(':type', $this->type);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function edit_student(){
        $sql = "UPDATE student SET firstname=:firstname, middle_name=:middle_name, lastname=:lastname, email=:email, username=:username, password=:password, course=:course, year_level=:year_level, section=:section, sem=:sem, type=:type WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':course', $this->course);
        $query->bindParam(':year_level', $this->year_level);
        $query->bindParam(':section', $this->section);
        $query->bindParam(':sem', $this->sem);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function fetch($record_id){
        $sql = "SELECT * FROM student WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM student WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM student ORDER BY CONCAT('lastname',', ','firstname') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>
