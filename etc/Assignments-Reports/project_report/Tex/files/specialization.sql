--insert
INSERT INTO
    specializations
SET
    umn = :umn,
    tid = :tid

--delete
DELETE FROM
    specializations
WHERE
    umn = :umn,
    tid = :tid

--select one item
SELECT
    s.* , e.name AS eName, t.name AS tName 
FROM
    specializations s
INNER JOIN
    planetypes t
ON
    t.tid = s.tid
    INNER JOIN
    employees e
ON
    s.umn = e.umn
WHERE
    s.tid = :tid
    s.umn = :umn
LIMIT 1

--select all

SELECT
    t.name AS tName, s.* , e.name AS eName
FROM
    specializations s
INNER JOIN
    planetypes t
ON
    t.tid = s.tid
    INNER JOIN
        employees e
    ON
        s.umn = e.umn
ORDER BY eName
