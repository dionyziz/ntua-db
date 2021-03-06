--insert
INSERT INTO 
    techs 
SET 
    umn = :umn

--delete
DELETE FROM
    techs 
WHERE 
    umn = :umn

--select with key
SELECT 
    * 
FROM 
    techs 
WHERE 
    umn = :umn

--select all with info
SELECT
    e.*, i.width, i.height, r.checked
FROM
    employees e
LEFT JOIN
    images i USING ( imageid )
LEFT JOIN
    techs t ON t.umn = e.umn
LEFT JOIN
    regulators r ON r.umn = e.umn
WHERE
    ( 'tech' = 'tech' AND t.umn IS NOT NULL )
    OR ( 'tech' = 'regulator' AND r.umn IS NOT NULL )
    OR ( 'tech' = '' )
ORDER BY umn
