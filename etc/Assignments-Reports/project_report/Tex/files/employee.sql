--statistics from workers view
SELECT
    occ, MIN( salary ) AS minimum, MAX( salary ) AS maximum, AVG( salary ) AS average
FROM
    workers
GROUP BY
    occ
--insert
INSERT INTO 
    employees 
SET 
    umn = :umn,
    ssn = :ssn,
    name = :name,
    phone = :phone,
    addr = :addr,
    salary = :salary

--delete
DELETE FROM
    employees 
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
    ( '' = 'tech' AND t.umn IS NOT NULL )
    OR ( '' = 'regulator' AND r.umn IS NOT NULL )
    OR ( '' = '' )
ORDER BY umn

--select with key inner join with technicians
SELECT
    'tech' as occ, e.*, i.width, i.height
FROM
    employees e
LEFT JOIN
    techs t ON t.umn = e.umn
LEFT JOIN
    images i USING ( imageid )
WHERE
    ( :umn = e.umn AND t.umn IS NOT NULL )
LIMIT 1


--if umn not in techs search for regulator
SELECT
    'regulator' as occ, e.*, i.width, i.height, r.checked
FROM
    employees e
LEFT JOIN
    regulators r ON r.umn = e.umn
LEFT JOIN
    images i USING ( imageid )
WHERE
    ( :umn = e.umn AND r.umn IS NOT NULL )
LIMIT 1

--if umn not in regulators search for other employee
SELECT
    'other' as occ, e.*, i.width, i.height
FROM
    employees e
LEFT JOIN
    images i USING ( imageid )
WHERE
    :umn = e.umn
LIMIT 1
