--insert
INSERT INTO
    planes
SET
    pid = :pid,
    tid = :tid

--delete
DELETE FROM
    planes
WHERE
    pid = :pid

--update
UPDATE 
    planes
SET
    pid = :pid,
    tid = :tid
WHERE
    pid = :pid

--select one item with key
SELECT
    t.*, p.*
FROM
    planes p
INNER JOIN
    planetypes t
ON
    p.tid = t.tid
WHERE
    p.pid = :pid
LIMIT 1

--select all with characteristics
SELECT
    t.*, p.*
FROM
    planes p
CROSS JOIN
    planetypes t ON t.tid = p.tid

--aggregate
SELECT
    name, p.tid, count( p.tid ) AS planeCount
FROM
    planes p
CROSS JOIN
    planetypes t ON t.tid = p.tid
GROUP BY
    name
