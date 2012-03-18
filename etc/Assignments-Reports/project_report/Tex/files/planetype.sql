--insert
INSERT INTO 
    planetypes
SET 
    name = :name,
    weight = :weight,
    capacity = :capacity

--delete
DELETE FROM
    planetypes
WHERE 
    tid = :tid

--select all with info
SELECT
    *
FROM
    planetypes

--update with key
UPDATE 
    planetypes
SET
    name = :name,
    weight = :weight,
    capacity = :capacity
WHERE
    tid = :tid

--select with key
SELECT 
    *
FROM 
    planetypes
WHERE 
    tid = :tid
