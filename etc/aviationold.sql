CREATE TABLE checks (
    checkid INT AUTO_INCREMENT PRIMARY KEY,
    checktypeid INT NOT NULL,
    pid INT NOT NULL,
    umn INT,
    created DATETIME,
    duration INT NOT NULL,
    score INT NOT NULL,
    FOREIGN KEY ( checktypeid ) REFERENCES checktypes( checktypeid ) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY ( pid ) REFERENCES planes( pid ) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY ( umn ) REFERENCES techs( umn ) ON DELETE SET NULL ON UPDATE CASCADE, -- would prefer ON DELETE SET NULL ON UPDATE CASCADE here
    CONSTRAINT chk_checks CHECK (score > ( SELECT maxscore FROM checktypes t WHERE checktypeid = t.checktypeid ) AND duration > 0 AND checkid > 0 )
) ENGINE=InnoDB;
CREATE TABLE checktypes (
    checktypeid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name TEXT,
    maxscore INT NOT NULL
	CHECK ( checktypeid > 0 )
) ENGINE=InnoDB;
CREATE TABLE employees (
    umn INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ssn INT UNIQUE,
    name TEXT NOT NULL,
    imageid INT DEFAULT NULL,
    phone VARCHAR( 32 ),
    addr TEXT,
    salary INT
    FOREIGN KEY ( imageid ) REFERENCES images( imageid ) ON DELETE SET NULL ON UPDATE CASCADE
	CONSTRAINT chk_employees CHECK ( umn > 0 AND ssn > 0 AND salary >= 0 )
) ENGINE=InnoDB;
CREATE TABLE planes (
    pid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tid INT NOT NULL,
    FOREIGN KEY ( tid ) REFERENCES planetypes( tid ) ON DELETE CASCADE ON UPDATE CASCADE
	CHECK ( pid > 0 )
) ENGINE=InnoDB;
CREATE TABLE regulators (
    umn INT NOT NULL PRIMARY KEY,
    checked DATE NOT NULL,
    FOREIGN KEY ( umn ) REFERENCES employees( umn ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
CREATE TABLE specializations (
    umn INT NOT NULL,
    tid INT NOT NULL,
    PRIMARY KEY ( umn, tid ),
    FOREIGN KEY ( umn ) REFERENCES techs( umn ) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY ( tid ) REFERENCES planetypes( tid ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
CREATE TABLE techs (
    umn INT NOT NULL PRIMARY KEY,
    FOREIGN KEY ( umn ) REFERENCES employees( umn ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
CREATE TABLE planetypes (
    tid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 32 ) NOT NULL,
    capacity INT DEFAULT NULL,
    weight INT DEFAULT NULL,
    imageid INT DEFAULT NULL,
    FOREIGN KEY ( imageid ) REFERENCES images( imageid ) ON DELETE SET NULL ON UPDATE CASCADE
	CONSTRAINT chk_planetypes CHECK ( tid > 0 AND capacity > 0 AND weight > 0 )
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
