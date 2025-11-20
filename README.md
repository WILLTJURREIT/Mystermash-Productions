# 1. Project Title: Mystermash-Productions

## **2. Introduction**

My project is an Online Content Hub for  **MysterMash Productions** , built to organize and showcase my motivational content from platforms like YouTube, TikTok, Facebook, Instagram, and more. The website includes a responsive layout, user accounts, membership-based access, and interactive media displays. Users will also be able to create posts that appear on the site, while I, as the admin, will have full control to approve, edit, or remove any submitted content. The platform also provides tools for business inquiries and prepares for future features such as AI chatbot integration. Overall, this project creates a centralized space for my brand and community.

## **3. GitHub Link:** https://github.com/WILLTJURREIT/Mystermash-Productions

## 4. Data Table Design

### **users Table**

* **id:** INT (Primary Key, Auto Increment) (NOT NULL)
* **name:** VARCHAR(100) (NOT NULL)
* **email:** VARCHAR(150) (NOT NULL, UNIQUE)
* **password:** VARCHAR(255) (NOT NULL)
* **role:** ENUM('admin','user') (NOT NULL, Default: 'user')
* **status:** ENUM('active','disabled') (NOT NULL, Default: 'active')
* **created_at:** TIMESTAMP (Default CURRENT_TIMESTAMP)

### **posts Table**

* **id:** INT (Primary Key, Auto Increment)
* **user_id:** INT (Foreign Key referencing users.id, NOT NULL)
* **title:** VARCHAR(150) (NOT NULL)
* **content:** TEXT (NULL)
* **media:** VARCHAR(255) (NULL)
* **created_at:** TIMESTAMP (Default CURRENT_TIMESTAMP)(NOT NULL)

**Relationship:** One user -> Many posts

### **tutorials Table**

* **id:** INT (Primary Key, Auto Increment)(NOT NULL)
* **title:** VARCHAR(150) (NOT NULL)
* **description:** TEXT (NULL)
* **video_url:** VARCHAR(255) (NULL)
* **created_at:** TIMESTAMP (Default CURRENT_TIMESTAMP) (NOT NULL)

### **quotes Table**

* **id:** INT (Primary Key, Auto Increment)(NOT NULL)
* **quote_text:** TEXT (NOT NULL)
* **author:** VARCHAR(100) (NULL)
* **created_at:** TIMESTAMP (Default CURRENT_TIMESTAMP)(NOTNULL)

## **Entity-Relationship Diagram (ERD)**

An Entity Relationship (ER) model helps me visually show how my data is organized and how the different parts of my database connect to each other. In my ERD for the  **MysterMash Productions Content Hub** , I included four main entities: users, posts, tutorials, and quotes.

### **Figure: ERD**

![1763496272588](image/README/1763496272588.png)

## **Relationships**

### **users - posts (One to Many)**

* One user can create multiple posts.
* Each post belongs to exactly one user.
* **Relationship:** One user -> Many posts.

### **tutorials and quotes**

* These entities currently do **not** have relationships with other tables.
* They store admin-managed content and function as standalone entities in the database design.

## **5. Data Flow Explanation**

This section explains how data flows between the front end of my website (HTML/CSS/JavaScript) and the back end (PHP and MySQL).

### **Example 1: User Registration**

* A user fills out the sign-up form on the website.
* When the form is submitted, the data (name, email, password) is sent to a PHP script using POST.
* PHP makes sure the information is valid, then converts the password into a secure hash so nobody can read it, and then saves the user into the database.
* If the data is valid, the user is redirected to the login page to sign in..

### **Example 2: Creating a User Post**

* A logged-in user fills out the “Create Post” form with a title, content, and optional media.
* After submitting, the form data is sent to a PHP script.
* PHP validates the input and saves the new post in the **posts** table with the user’s ID.
* The post remains pending until the admin approves it.
* The user is then redirected back to their posts page.
