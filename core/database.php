<?php
    class Database
    {
        private $conn = null;
        private $queryParams = [];

        public $getData = false;
        public $errors = [];

        /**
         * Simple PDO powered database class designed to easily and safely perform queries.
         * @param array $config The database configuration, found in: 'cms/cms-admin/cms-config.php'.
         */
        public function __construct($config)
        {
            try
            {
                $pdo = new PDO(
                    'mysql:host='.$config['host'].
                    ';dbname='.$config['database'],
                    $config['user'],
                    $config['password']
                );
                
                $this->conn = $pdo;
            }
            catch(Exception $e)
            {
                echo '<h3>Could not connect to the database.</h3><br/>';
                var_dump($e->getTrace());
                die();
            }
        }

        public function __destruct()
        {
            $this->conn = null;
        }

        /**
         * Perform raw prepared SQL queries.
         * @param string $queryString A string containing the query + possible prepared statements.
         * @param array $args An array containing the prepared statement variables.
         */
        public function raw($queryString, $args = [])
        {
            $output = false;

            // Prepare and execute the query.
            $stmnt = $this->conn->prepare($queryString);
            
            // Make sure that the query succeeds.
            if($stmnt->execute($args) == true)
            {
                // Check if the query data needs to be fetched.
                if($this->getData == true)
                {
                    // Make sure the query succeeded.
                    if($stmnt != false)
                        $output = $stmnt->fetchAll(PDO::FETCH_ASSOC);
                    else
                        $this->errors = $stmnt->errorInfo();
                }
                else
                {
                    $output = true;
                }
            }

            // Return the query ouput.
            return $output;
        }

        /**
         * Performs a select query.
         * @param mixed $columns A string or array that defines the columns that need to be fetched e.g: '*' OR 'col1' OR ['col1', 'col2'].
         * @param string $table A string that defines the table from where the data needs to be fetched.
         * @param array $conditions [OPTIONAL] An array that is either multidimensional or contains some strings with the conditions eg: ['col1', '12'] OR ['col1', '='. '12'] OR [['col1', '=', '12'], ['col2', '12']].
         * @param string $extra [OPTIONAL] Extra clauses such as ORDER BY.
         * @return mixed Returns either a boolean or an array containing the fetched data.
         */
        public function select($columns, $table, $conditions = null, $extra = null)
        {
            $this->queryParams = [];
            $output = 'SELECT ';

            // Construct the columns.

            // First we check if it is an array, if it is an array we 
            // want to loop over it and create a string out of that array.
            if(is_array($columns))
            {
                $first = true;
                foreach($columns as $col)
                {
                    if($first == true)
                    {
                        $output .= '`'.$col.'`';
                        $first = false;
                    }
                    else
                    {
                        $output .= ', `'.$col.'`';
                    }
                }
            }
            // $columns is not an array, paste the raw column in the query.
            else
            {
                // Check if the user wants to select everything from the table.
                if($columns != '*')
                    $output .= '`'.$columns.'`';
                else
                    $output .= $columns;
            }

            // Add the table.
            $output .= ' FROM `'.$table.'`';

            // Insert the conditions.

            // Make sure that the $conditions variable is an array.
            if(is_array($conditions))
            {
                $output .= ' WHERE ';
                $output .= $this->CreateConditions($conditions);
            }

            // Parse the extra parameters behind the query.
            $output .= ' '.$extra.';';

            // Execute the query.
            $this->getData = true;
            $result = $this->raw($output, $this->queryParams);

            return $result;
        }

        /**
         * Performs a basic update query.
         * @param string $table A string that defines the table from where the data needs to be updated.
         * @param array $set An array that holds the value column and which value needs to be updated e.g: ['col1' => 'newValue', 'col2' => 'newValue']
         * @param array $conditions [OPTIONAL] An array that is either multidimensional or contains some strings with the conditions eg: ['col1', '12'] OR ['col1', '='. '12'] OR [['col1', '=', '12'], ['col2', '12']].
         * @return bool Returns a boolean which shows if the query was successfull. 
         */
        public function update($table, $set, $conditions)
        {
            $this->queryParams = [];
            $output = 'UPDATE ';

            // Insert the table.
            $output .= '`'.$table.'` SET';

            // Insert the setters.
            $first = true;
            foreach($set as $key => $var)
            {
                $pdoKey = preg_replace('/[_-]+/', '', $key);

                // Register the conditions.
                $this->queryParams[$pdoKey] = $var;

                if($first == true)
                {
                    $output .= '`'.$key.'` = :'.$pdoKey;
                    $first = false;
                }
                else
                {
                    $output .= ', `'.$key.'` = :'.$pdoKey;
                }
            }

            // Insert the conditions.

            // Make sure that the $conditions variable is an array.
            if(is_array($conditions))
            {
                $output .= ' WHERE ';
                $output .= $this->CreateConditions($conditions);
            }

            // Execute the query.
            $this->getData = false;
            $result = $this->raw($output, $this->queryParams);

            return $result;
        }

        /**
         * Performs a basic insert query.
         * @param string $table A string that defines the table from where the data needs to be inserted.
         * @param array $data An array which hold the column and the value that needs to be inserted e.g: ['col1' => 'myValue', 'col2' => 'myValue']
         * @return bool Returns a boolean which shows if the query was successfull. 
         */
        public function insert($table, $data)
        {
            $this->queryParams = [];
            $output = 'INSERT INTO ';

            // Insert the table.
            $output .= '`'.$table.'`';

            // Insert the data.

            // First we want to seperate all of the keys and values from each other.
            // This will make the creation of the prepared statement a bit easier.
            $keys = [];
            $values = [];

            foreach($data as $key => $value)
            {
                $keys[] = $key;
                $values[] = $value;
            }

            // Construct the column part.
            $output .= ' (';
            for($i = 0; $i < count($keys); $i += 1)
            {
                if($i == 0)
                    $output .= '`'.$keys[$i].'`';
                else
                    $output .= ', `'.$keys[$i].'`';
            }
            
            $output .= ') VALUES(';

            // Insert the values.
            for($i = 0; $i < count($keys); $i += 1)
            {
                $pdoKey = preg_replace('/[_-]+/', '', $keys[$i]);

                // Register the conditions.
                $this->queryParams[$pdoKey] = $values[$i];

                if($i == 0)
                    $output .= ':'.$pdoKey;
                else
                    $output .= ', :'.$pdoKey;
            }

            $output .= ');';

            // Execute the query.
            $this->getData = false;
            $result = $this->raw($output, $this->queryParams);

            return $result;
        }

        /**
         * Performs a basic delete query.
         * @param string $table A string that defines the table from where the data needs to be updated.
         * @param array $conditions [OPTIONAL] An array that is either multidimensional or contains some strings with the conditions eg: ['col1', '12'] OR ['col1', '='. '12'] OR [['col1', '=', '12'], ['col2', '12']].
         * @return bool Returns a boolean which shows if the query was successfull. 
         */
        public function delete($table, $conditions)
        {
            $this->queryParams = [];
            $output = 'DELETE FROM ';

            // Insert the table.
            $output .= '`'.$table.'`';

            // Insert the conditions.

            // Make sure that the $conditions variable is an array.
            if(is_array($conditions))
            {
                $output .= ' WHERE ';
                $output .= $this->CreateConditions($conditions);
            }
            
            // Execute the query.
            $this->getData = false;
            $result = $this->raw($output, $this->queryParams);

            return $result;
        }

        /**
         * Registers a new user in the 'cms-users' table.
         * @param string $name The full name of the user.
         * @param string $username The username.
         * @param string $email The email address of the user.
         * @param string $rawPassword The unhashed password of the user.
         * @return bool
         */
        public function register($name, $username, $email, $rawPassword)
        {
            /*
            
                --- Validation ---
            
            */

            $register = true;

            if(empty($name))
            {
                $register = false;
            }

            if(empty($username))
            {
                $register = false;
            }

            if(empty($rawPassword))
            {
                $register = false;
            }

            /*
            
                --- Registration ---
            
            */

            // Make sure the user can be registered.
            if($register == true)
            {
                $query = "INSERT INTO `cms-users` (`name`, `username`, `email`, `password`, `private_key`, `level`, `date_created`) 
                            VALUES(:name, :username, :email, :password, :privatekey, :level, :date_created)";
                $args = [
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($rawPassword, PASSWORD_BCRYPT),
                    'privatekey' => microtime(true),
                    'level' => 1,
                    'date_created' => date('Y-m-d H:i:s'),
                ];
                
                $this->getData = false;
                $stmnt = $this->raw($query, $args);

                if($stmnt == false)
                {
                    $register = false;
                }
            }

            return $register;
        }

        /**
         * Attempts to login a specific user.
         * @param string $username The username.
         * @param string $password The password.
         */
        public function login($username, $password)
        {
            $login = true;

            $query = "SELECT `id`, `username`, `password`, `private_key` FROM `cms-users` 
                        WHERE `username` = :username OR `email` = :username";

            $args = ['username' => $username];
            
            $this->getData = true;
            $stmnt = $this->raw($query, $args);

            // Make sure there are results found.
            if($stmnt != false)
            {
                // Validate the password.
                if(password_verify($password, $stmnt[0]['password']))
                {
                    $this->getData = false;
                    $this->raw("UPDATE `cms-users` SET `last_login` = :date WHERE `id` = :id", 
                                ['date' => date('Y-m-d H:i:s'), 'id' => $stmnt[0]['id']]);

                    // Create the login session.
                    StartSession();
                    $_SESSION['orange-user'] = [
                        'key' => $stmnt[0]['id'],
                        'name' => $stmnt[0]['username'],
                        'private' => $stmnt[0]['private_key']
                    ];
                }
                else
                {
                    $login = false;
                }
            }
            else
            {
                $login = false;
            }

            return $login;
        }

        /*
        
            --- Private functions ---
        
        */

        /**
         * Creates query conditions.
         */
        private function CreateConditions($condition)
        {
            $output = '';

            // Check if the first item in the $condition variable is an array.
            if(is_array($condition[0]))
            {
                $first = true;
                foreach($condition as $cond)
                {
                    // Check how many items the array has, if it is less then 3 auto use the '='.
                    if(count($cond) < 3)
                    {
                        $pdoKey = preg_replace('/[_-]+/', '', $cond[0]);
    
                        // Register the conditions.
                        $this->queryParams[$pdoKey] = $cond[1];
    
                        if($first == true)
                        {
                            $output .= '`'.$cond[0].'` = :'.$pdoKey;
                            $first = false;
                        }
                        else
                        {
                            $output .= ' AND `'.$cond[0].'` = :'.$pdoKey;
                        }
                    }
                    else
                    {
                        $pdoKey = preg_replace('/[_-]+/', '', $cond[0]);
    
                        // Register the conditions.
                        $this->queryParams[$pdoKey] = $cond[2];
    
                        if($first == true)
                        {
                            $output .= '`'.$cond[0].'` '.$cond[1].' :'.$pdoKey;
                            $first = false;
                        }
                        else
                        {
                            $output .= ' AND `'.$cond[0].'` '.$cond[1].' :'.$pdoKey;                            
                        }
                    }
                }
            }
            else
            {
                // Check how many items the array has, if it is less then 3 auto use the '='.
                if(count($condition) < 3)
                {
                    $pdoKey = preg_replace('/[_-]+/', '', $condition[1]);

                    // Register the conditions.
                    $this->queryParams[$pdoKey] = $condition[1];

                    $output .= '`'.$condition[0].'` = :'.$pdoKey;
                }
                else
                {
                    $pdoKey = preg_replace('/[_-]+/', '', $condition[0]);

                    // Register the conditions.
                    $this->queryParams[$pdoKey] = $condition[2];

                    $output .= '`'.$condition[0].'` '.$condition[1].' :'.$pdoKey;
                }
            }

            return $output;
        }
    }