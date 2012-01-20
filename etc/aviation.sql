CREATE TABLE checks (
    chkid INT NOT NULL REFERENCES checktypes(chkid),
    pid INT NOT NULL REFERENCES planes(pid),
    umn INT NOT NULL REFERENCES techs(umn),
    created DATETIME,
    duration INT NOT NULL,
    score INT NOT NULL,
    PRIMARY KEY (chkid,pid,umn),
    CHECK score > (SELECT maxscore FROM checktypes t WHERE chkid = t.chkid)
);
CREATE TABLE checktypes (
    chkid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name TEXT,
    maxscore INT NOT NULL
);
CREATE TABLE employees (
    umn INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ssn INT UNIQUE,
    name TEXT NOT NULL,
    phone VARCHAR(32),
    addr TEXT,
    salary INT
);
CREATE TABLE planes (
    pid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tid INT REFERENCES types(tid)
);
CREATE TABLE regulators (
    umn INT NOT NULL PRIMARY KEY REFERENCES employees(umn),
    checked DATETIME
);
CREATE TABLE specializations (
    umn INT NOT NULL REFERENCES techs(umn),
    tid INT NOT NULL REFERENCES types(tid),
    PRIMARY KEY (umn, tid)
);
CREATE TABLE techs (
    umn INT NOT NULL PRIMARY KEY REFERENCES employees(umn)
);
CREATE TABLE types (
    tid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 32 ) NOT NULL,
    capacity INT,
    weight INT,
    icon VARCHAR(32)
);
CREATE TABLE users (
    uid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(32),
    password CHAR(64),
    passwordsalt CHAR(8),
    email VARCHAR(64)
);
