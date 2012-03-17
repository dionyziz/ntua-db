CREATE TABLE images (
    imageid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    size INT UNSIGNED DEFAULT NULL,
    width INT UNSIGNED DEFAULT NULL,
    height INT UNSIGNED DEFAULT NULL
) ENGINE=InnoDB;
CREATE TABLE employees (
    umn INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ssn INT UNSIGNED UNIQUE,
    name TEXT NOT NULL,
    imageid INT DEFAULT NULL,
    phone VARCHAR( 32 ),
    addr TEXT,
    salary INT UNSIGNED
    FOREIGN KEY ( imageid ) REFERENCES images( imageid ) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;
CREATE TABLE regulators (
    umn INT UNSIGNED NOT NULL PRIMARY KEY,
    checked DATE NOT NULL,
    FOREIGN KEY ( umn ) REFERENCES employees( umn ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
CREATE TABLE techs (
    umn INT UNSIGNED NOT NULL PRIMARY KEY,
    FOREIGN KEY ( umn ) REFERENCES employees( umn ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
CREATE TABLE checktypes (
    checktypeid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name TEXT,
    maxscore INT UNSIGNED NOT NULL
) ENGINE=InnoDB;
CREATE TABLE planetypes (
    tid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 32 ) NOT NULL,
    capacity INT UNSIGNED DEFAULT NULL,
    weight INT UNSIGNED DEFAULT NULL,
    imageid INT DEFAULT NULL,
    FOREIGN KEY ( imageid ) REFERENCES images( imageid ) ON DELETE SET NULL ON UPDATE CASCADE
	CONSTRAINT chk_planetypes CHECK ( capacity > 0 AND weight > 0 )
) ENGINE=InnoDB;
CREATE TABLE planes (
    pid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tid INT UNSIGNED NOT NULL,
    FOREIGN KEY ( tid ) REFERENCES planetypes( tid ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
CREATE TABLE specializations (
    umn INT UNSIGNED NOT NULL,
    tid INT UNSIGNED NOT NULL,
    PRIMARY KEY ( umn, tid ),
    FOREIGN KEY ( umn ) REFERENCES techs( umn ) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY ( tid ) REFERENCES planetypes( tid ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
CREATE TABLE checks (
    checkid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    checktypeid INT UNSIGNED NOT NULL,
    pid INT UNSIGNED NOT NULL,
    umn INT UNSIGNED,
    created DATETIME,
    duration INT UNSIGNED NOT NULL,
    score INT UNSIGNED NOT NULL,
    FOREIGN KEY ( checktypeid ) REFERENCES checktypes( checktypeid ) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY ( pid ) REFERENCES planes( pid ) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY ( umn ) REFERENCES techs( umn ) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT chk_checks CHECK (score > ( SELECT maxscore FROM checktypes t WHERE checktypeid = t.checktypeid ) AND duration > 0 )
) ENGINE=InnoDB;
CREATE TABLE users (
    uid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(32),
    password CHAR(64),
    passwordsalt CHAR(8),
    email VARCHAR(64)
) ENGINE=InnoDB;
CREATE VIEW workers AS
    SELECT
        e.*,
        ( CASE WHEN t.umn IS NOT NULL THEN 'tech'
               WHEN r.umn IS NOT NULL THEN 'regulator'
               ELSE '' END ) AS occ
    FROM
        employees e
        LEFT JOIN
            techs t ON t.umn = e.umn
        LEFT JOIN
            regulators r ON r.umn = e.umn;
