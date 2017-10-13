SELECT nom, prenom, LEFT(date_naissance, 10)
AS date_naissance
FROM fiche_personne
WHERE YEAR(date_naissance) = '1989';

-- *********************************** DONT FORGET TO DELETE ***********************************