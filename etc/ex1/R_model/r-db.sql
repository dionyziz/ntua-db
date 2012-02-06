PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE planes (
    pid INT NOT NULL PRIMARY KEY,
    tid INT REFERENCES types(tid)
);
CREATE TABLE types (
    tid INT NOT NULL PRIMARY KEY,
    capacity INT,
    weight INT
);
CREATE TABLE techs (
    umn INT NOT NULL PRIMARY KEY REFERENCES employees(umn)
);
CREATE TABLE regulators (
    umn INT NOT NULL PRIMARY KEY REFERENCES employees(umn)
    ,
    checked DATE
);
CREATE TABLE specializations (
    umn INT NOT NULL REFERENCES techs(umn),
    tid INT NOT NULL REFERENCES types(tid),
    PRIMARY KEY (umn, tid)
);
CREATE TABLE checktypes (
    chkid INT NOT NULL PRIMARY KEY,
    name TEXT,
    maxscore INT NOT NULL
);
CREATE TABLE checks (
    chkid INT NOT NULL REFERENCES checktypes(chkid),
    pid INT NOT NULL REFERENCES planes(pid),
    umn INT NOT NULL REFERENCES techs(umn),
    created DATE,
    duration INT NOT NULL,
    score INT NOT NULL,
    PRIMARY KEY (chkid,pid,umn)
);
CREATE TABLE employees (
    umn INT NOT NULL PRIMARY KEY,
    ssn INT UNIQUE,
    name TEXT NOT NULL,
    phone INT,
    addr TEXT,
    salary INT
);
COMMIT;
