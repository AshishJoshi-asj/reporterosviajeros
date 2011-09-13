CREATE
    TABLE diary
    (
        id INT NOT NULL AUTO_INCREMENT,
        authorid INT NOT NULL,
        created DATE NOT NULL,
        description tinytext NOT NULL,
        title tinytext NOT NULL,
        published TINYINT(1) DEFAULT '0',
        PRIMARY KEY (id)
    )
    ENGINE=InnoDB DEFAULT CHARSET=utf8
    
    
    
CREATE
    TABLE diarychapter2
    (
        id INT NOT NULL AUTO_INCREMENT,
        did INT,
        title VARCHAR(45),
        DATE VARCHAR(45),
        countryid INT,
        cityid INT,
        creationdate DATE,
        updatedate DATE,
        content mediumtext,
        PRIMARY KEY (id),
        CONSTRAINT fk_diaryid2 FOREIGN KEY (did) REFERENCES diary (id) ON
    DELETE
        NO ACTION ON
    UPDATE
        NO ACTION,
        INDEX fk_diaryid (did)
    )
    ENGINE=InnoDB DEFAULT CHARSET=utf8