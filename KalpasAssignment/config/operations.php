<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operations extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $name = $db->check($_POST['name']);
                $mobile = $db->check($_POST['mobile']);
                $email = $db->check($_POST['email']);
        
                if($this->insert_record($name,$mobile,$email))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($name,$mobile,$email)
        {
            global $db;
            $query = "insert into users (name,mobile,email) values('$name','$mobile','$email')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        // View Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from users";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        //View particular user record
        public function view_user_record()
        {
            global $db;
            $query = "select * from users where id='$id'";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($id)
        {
            global $db;
            $sql = "select * from users where id='$id'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $id = $_POST['id'];
                $FirstName = $db->check($_POST['name']);
                $LastName = $db->check($_POST['mobile']);
                $Email = $db->check($_POST['email']);
                if($this->update_record($id,$name,$mobile,$email ))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:view.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Wrong : )</div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($id,$name,$mobile,$email )
        {
            global $db;
            $sql = "update users set name='$name', mobile='$mobile', email='$email' where id='$id'";
            $result = mysqli_query($db->connection,$sql);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }



        // Set Session Message
        public function set_messsage($msg)
        {
            if(!empty($msg))
            {
                $_SESSION['Message']=$msg;
            }
            else
            {
                $msg = "";
            }
        }
        

        // Display Session Message
        public function display_message()
        {
            if(isset($_SESSION['Message']))
            {
                echo $_SESSION['Message'];
                unset($_SESSION['Message']);
            }
        }

        // Delete Record
        public function Delete_Record($id)
        {
            global $db;
            $query = "delete from users where id='$id'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }




?>