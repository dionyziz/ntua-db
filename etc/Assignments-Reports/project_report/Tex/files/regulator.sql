--insert
INSERT INTO 
    REGULATORS 
SET 
    UMN = $UMN
    CHECKED = $CHECKED

--delete
DELETE FROM
    REGULATORS 
WHERE 
    UMN = $UMN

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
    REGULATORS 
WHERE 
    UMN = $UMN
