--insert
INSERT INTO
    checks
SET
    checktypeid = :checktypeid,
    pid = :pid,
    umn = :umn,
    created = :created,
    duration = :duration,
    score = :score


--delete
DELETE FROM
    checks
WHERE
    checktypeid = :checktypeid
AND
    pid = :pid
AND
    umn = :umn

--update
UPDATE 
    checks
SET
    created = :created,
    duration = :duration,
    score = :score
WHERE
    checktypeid = :checktypeid
AND
    pid = :pid
AND
    umn = :umn

--select one item with key
SELECT
    *
FROM
    checks
WHERE
    checktypeid = :checktypeid
AND
    pid = :pid
AND
    umn = :umn

--select all with characteristics
SELECT
    e.name AS techName, t.name AS planeTypeName,
    ct.name AS checkTypeName, ct.maxscore,
    c.*
FROM
    checks c
CROSS JOIN
    planes p ON c.pid = p.pid
CROSS JOIN
    planetypes t ON p.tid = t.tid
CROSS JOIN
    checktypes ct ON c.checktypeid = ct.checktypeid
CROSS JOIN
    employees e ON e.umn = c.umn
ORDER BY c.pid

--aggregate
SELECT
    c.pid AS pid, pt.name AS name, sum( c.score ) AS checkScore, sum( ct.maxscore ) AS maxScore
FROM
    checks c
CROSS JOIN
    planes p ON c.pid = p.pid
CROSS JOIN
    planetypes pt ON p.tid = pt.tid
CROSS JOIN
    checktypes ct ON c.checktypeid = ct.checktypeid
GROUP BY
   c.pid
HAVING
   sum( c.score ) < ( sum( ct.maxscore ) / 2 )
