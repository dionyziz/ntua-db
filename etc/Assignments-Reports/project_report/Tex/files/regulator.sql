--insert
INSERT INTO 
    regulators 
SET 
    umn = $umn
    checked = $checked

--delete
DELETE FROM
    regulators 
WHERE 
    umn = $umn

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
    ( 'regulator' = 'tech' AND t.umn IS NOT NULL )
    OR ( 'regulator' = 'regulator' AND r.umn IS NOT NULL )
    OR ( 'regulator' = '' )
ORDER BY umn

--select with key
SELECT 
    * 
FROM 
    regulators 
WHERE 
    umn = $umn
