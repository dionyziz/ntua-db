CREATE TABLE checks (
    checktypeid INT NOT NULL,
    pid INT NOT NULL,
    umn INT NOT NULL,
    created DATETIME,
    duration INT NOT NULL,
    score INT NOT NULL,
    PRIMARY KEY ( checktypeid, pid, umn ),
    FOREIGN KEY ( checktypeid ) REFERENCES checktypes( checktypeid ),
    FOREIGN KEY ( pid ) REFERENCES planes( pid ),
    FOREIGN KEY ( umn ) REFERENCES techs( umn ),
    CHECK score > ( SELECT maxscore FROM checktypes t WHERE checktypeid = t.checktypeid )
) ENGINE=InnoDB;
CREATE TABLE checktypes (
    checktypeid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name TEXT,
    maxscore INT NOT NULL
) ENGINE=InnoDB;
CREATE TABLE employees (
    umn INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ssn INT UNIQUE,
    name TEXT NOT NULL,
    imageid INT DEFAULT NULL,
    phone VARCHAR( 32 ),
    addr TEXT,
    salary INT
    FOREIGN KEY ( imageid ) REFERENCES images( imageid )
) ENGINE=InnoDB;
CREATE TABLE planes (
    pid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tid INT NOT NULL,
    FOREIGN KEY ( tid ) REFERENCES types( tid )
) ENGINE=InnoDB;
CREATE TABLE regulators (
    umn INT NOT NULL PRIMARY KEY,
    checked DATETIME NOT NULL,
    FOREIGN KEY ( umn ) REFERENCES employees( umn )
) ENGINE=InnoDB;
CREATE TABLE specializations (
    umn INT NOT NULL,
    tid INT NOT NULL,
    PRIMARY KEY ( umn, tid ),
    FOREIGN KEY umn REFERENCES techs( umn ),
    FOREIGN KEY tid REFERENCES types( tid )
) ENGINE=InnoDB;
CREATE TABLE techs (
    umn INT NOT NULL PRIMARY KEY,
    FOREIGN KEY umn REFERENCES employees( umn )
) ENGINE=InnoDB;
CREATE TABLE types (
    tid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 32 ) NOT NULL,
    capacity INT DEFAULT NULL,
    weight INT DEFAULT NULL,
    imageid INT DEFAULT NULL,
    FOREIGN KEY ( imageid ) REFERENCES images( imageid )
) ENGINE=InnoDB;
CREATE TABLE users (
    uid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(32),
    password CHAR(64),
    passwordsalt CHAR(8),
    email VARCHAR(64)
) ENGINE=InnoDB;
CREATE TABLE images (
    imageid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    size INT DEFAULT NULL,
    width INT DEFAULT NULL,
    height INT DEFAULT NULL
) ENGINE=InnoDB;
