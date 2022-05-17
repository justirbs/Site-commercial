# Développement Web - Site commercial

## Description 
Site pour un projet d'entrerise visant à commercialiser des cigratettes électroniques à l'apparence de cigarettes classiques dans le but de préserver la santé des consommateurs.

## Utilisation
Pour visualiser le site, il faut ouvrir le fichier "index.php" dans un navigateur web (de préférence chrome)
Il faut démarrer un serveur web pour visualiser le site (exemple : apache).

Pour charger la base de donnée il faut ouvrir un terminal à la racine du projet. Si le service mysql n'est pas déjà lacé, on tape la commande suivante.
```
sudo service mysql start
```
Ensuite on lance mysql en root. Le mot de passe est eisti0001 par défaut.
```
sudo mysql -u root -p
```
On charge les fichiers suivants.
```
source sql/kulkulkan.sql
```
```
source sql/kulkulkan_data.sql
```

## Test 
Voici les logins et mots de passe pour les tests :
| identifiant | mot de passe |
| :--------: | :--------: |
| toto | mdp1 |
| tata | mdp2 |
| titi | mdp3 |
