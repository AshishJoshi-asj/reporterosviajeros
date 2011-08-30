<?php  

	/*
	CREATE TABLE `site_photos`.`photos` (
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`author` VARCHAR( 128 ) NOT NULL ,
	`title` VARCHAR( 128 ) NOT NULL ,
	`desc` VARCHAR( 256 ) NOT NULL ,
	`price` FLOAT NOT NULL ,
	`file` VARCHAR( 128 ) NOT NULL ,
	`thumb` VARCHAR( 128 ) NOT NULL
	) ENGINE = MYISAM ;
	*/	


    class Photo extends CI_Model {  
      
        function __construct()  
        {  
            // Call the Model constructor  
            parent::__construct();  
        }  
      
        function getAllPhotos()  
            {  
                //Query the data table for every record and row  
                $query = $this->db->get('photos');
				
				//log_message('debug', $query->result()[0]->title	);
      
                if ($query->num_rows() > 0)  
                {  
                    return $query->result();  
                }else{  
                    show_error('Database is empty!');
                }  
            }  
		
	}  