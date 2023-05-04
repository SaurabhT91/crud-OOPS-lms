<?php

class DB
{
    private $dbHost = 'localhost';
    private $dbUsername = 'root';
    private $dbPassword = 'MYSQL_saurabh@5378*';
    private $dbName = 'myapp';

    private $db;

    public function __construct()
    {
        if (!isset($this->db)) {
            // Connect to the database
            try {
                $connection = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUsername, $this->dbPassword);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $connection;
            } catch (PDOException $e) {
                die("Failed to connect with MySQL: " . $e->getMessage());
            }
        }
    }

//      Returns rows from the database based on the conditions
//      @param string name of the table
//      @param array select, where, order_by, limit and return_type conditions

    public function get_all_leads($table)
    {

        $sql_query = 'SELECT * FROM '.$table;
        $statement = $this->db->prepare($sql_query);

        $statement->execute();

        return $statement->fetchAll();

    }

    public function get_all_users($table)
    {

        $sql_query = 'SELECT * FROM USERS';
        $statement = $this->db->prepare($sql_query);

        $statement->execute();

        return $statement->fetchAll();

    }
    public function get_lead_by_id($table,$conditions)
    {

        $sql_query = "SELECT * FROM ".$table." WHERE id = ".$conditions;

        $statement = $this->db->prepare($sql_query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }
    public function get_leads_by_USER_ID($table,$conditions)
    {

        $sql_query = "SELECT * FROM ".$table." WHERE USER_ID = ".$conditions;

        $statement = $this->db->prepare($sql_query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }
    public function get_user_by_user_id($table,$conditions)
    {

        $id = $conditions;

        $sql_query = "SELECT * FROM " . $table . " WHERE USER_ID = " . $id;

        $statement = $this->db->prepare($sql_query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    // Insert data into the database
    // @param string name of the table
    // @param array the data for inserting into the table

    public function insert_lead($table, $data)
    {
        $name=$data['Lead_name'];
        $number=$data['Contact_number'];
        $address=$data['Address'];
        $City=$data['City'];
        $State_name=$data['State_name'];
        $Employment_type=$data['Employment_type'];
        $Loan_status=$data['Loan_status'];
        $user_id=$data['USER_ID'];


        $sql = "INSERT INTO lead_data (Lead_Name, Contact_number, Address, City, State_name, Employment_type, Loan_status,USER_ID) VALUES ('$name', '$number', '$address', '$City', '$State_name', '$Employment_type', '$Loan_status', '$user_id');";
        $query = $this->db->prepare($sql);
        $insert = $query->execute();
        return $insert ? $this->db->lastInsertId() : false;


    }

    public function delete($table,$conditions){
        $whereSql = '';

        $sql = "DELETE FROM ".$table." where id = ".$conditions['id'];
        $delete = $this->db->exec($sql);
        return $delete?$delete:false;
    }



    // Update data into the database
    // @param string name of the table
    // @param array the data for updating into the table
    // @param array where condition on updating data

    public function update_lead($table,$data,$conditions){


        $id = $conditions['id'];
        $name=$data['Lead_name'];
        $number=$data['Contact_number'];
        $address=$data['Address'];
        $City=$data['City'];
        $State_name=$data['State_name'];
        $Employment_type=$data['Employment_type'];
        $Loan_status=$data['Loan_status'];
        $user_id=$data['User_Id'];


        $sql = "UPDATE lead_data SET Lead_name='$name',Contact_number='$number',Address='$address',City='$City',State_name='$State_name',Employment_type='$Employment_type',Loan_status='$Loan_status',USER_ID='$user_id' 
                WHERE id ='$id'";
        $query = $this->db->prepare($sql);
        $update = $query->execute();
        return $update?$query->rowCount():false;
    }
}
