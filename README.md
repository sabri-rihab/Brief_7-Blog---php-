# 📝 BlogCMS – Système de Gestion de Blog

BlogCMS est une application web permettant la gestion complète d’un blog avec un système de rôles, un tableau de bord administrateur et une interface utilisateur sécurisée.  
Le projet permet de créer, lire, modifier et supprimer des articles, gérer les utilisateurs, les catégories et les commentaires.

---

## 🚀 Fonctionnalités

### ✅ Fonctionnalités Générales (Tous les utilisateurs)
- Page de connexion sécurisée
- Système de rôles : **Administrateur, Auteur, Visiteur**
- Protection contre les failles XSS
- Validation des formulaires

---

### 🔐 Administrateur
- Tableau de bord avec statistiques
- Gestion des utilisateurs
- CRUD des catégories
- Modération des commentaires

---

### ✍️ Auteurs
- Voir les articles publiés
- Créer, modifier et supprimer leurs propres articles
- Poster des commentaires

---

### 👀 Visiteurs
- Consulter les articles publiés
- Poster des commentaires
---

## 🛠️ Technologies Utilisées

### Backend
| Technologie | Description |
|-------------|-------------|
| PHP 8 (procédural) | Logique serveur |
| MySQL / PostgreSQL | Base de données |
| PDO | Accès sécurisé à la base de données |

### Frontend
| Technologie | Description |
|-------------|-------------|
| HTML5 / CSS3 | Structure & style |
| Tailwind / Bootstrap | Framework CSS |
| JavaScript | Dynamisme basique |

### Sécurité
| Élément | Implémentation |
|--------|----------------|
| Sessions sécurisées | PHP |
| Hashage mots de passe | Bcrypt |
| Protection XSS | `htmlspecialchars()` |
| Requêtes SQL sécurisées | Requêtes préparées (PDO) |

---

## 🏗️ Architecture du Projet

```bash
/BlogCMS
│── /config
│── /controllers
│── /models
│── /views
│── /assets
│── /uploads
│── index.php
│── login.php
│── register.php
