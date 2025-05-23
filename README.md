# 🏆 LAMP Stack Scoring System

A lightweight scoring system built on the LAMP stack (Linux, Apache, MySQL, PHP). This project enables admins to add judges, judges to score participants, and a public scoreboard that updates in real time.

---

## 🚀 Features

- Admin Panel: Add judges (no login required for demo).
- Judge Portal: Assign scores to participants (1–100 points).
- Public Scoreboard: Real-time scoreboard with auto-refresh.
- Clean separation of concerns with `admin/`, `judge/`, and `scoreboard/` interfaces.
- Built with XAMPP/LAMP, uses only core PHP and MySQL.

---

## 📦 Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/elonmasai7/Lamp_stack.git
cd Lamp_stack
````

### 2. Move to XAMPP Document Root

Move the folder to your XAMPP's `htdocs/` directory:

```bash
sudo mv Lamp_stack /opt/lampp/htdocs/lamp-scoring-system
```

### 3. Start XAMPP

```bash
sudo /opt/lampp/lampp start
```

### 4. Import the SQL Schema

Use phpMyAdmin or CLI:

```bash
mysql -u root -p < sql/schema.sql
```

> Creates `lamp_scoring` database with `users`, `judges`, and `scores` tables.

### 5. Access the App

* **Admin Panel** – [http://localhost:8080/lamp_scoring_system/admin/](http://localhost:8080/lamp_scoring_system/admin/)
* **Judge Portal** – [http://localhost:8080/lamp_scoring_system/judge/](http://localhost:8080/lamp_scoring_system/judge/)
* **Scoreboard** – [http://localhost:8080/lamp_scoring_system/scoreboard/](http://localhost:8080/lamp_scoring_system/scoreboard/)

---

## 🧠 Database Schema (Summary)

```sql
CREATE TABLE judges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    display_name VARCHAR(100)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
);

CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judge_id INT,
    user_id INT,
    points INT CHECK (points BETWEEN 1 AND 100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (judge_id) REFERENCES judges(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

> Sample users (`Alice`, `Bob`, `Charlie`, `Diana`) are included.

---

## 🛠 Design Choices

* **LAMP Stack**: Selected for accessibility and demo readiness.
* **No Login (Demo Mode)**: Login pages omitted for simplicity.
* **Normalization**: Judges and Users are separate, with Scores as a junction table.
* **Auto-Refresh**: Scoreboard refreshes every 10 seconds using HTML `<meta>` tag.

---

## ✅ Assumptions

* Users are pre-registered in the database (`sql/schema.sql`).
* Judges can score users multiple times (aggregated).
* No authentication or input sanitization in the UI (for demo only).
* PHP is set up with error reporting enabled for debugging.

---

## 👨‍💻 Author

**Elon Kipng'etich**
🔗 [elonmasai7.github.io](https://elonmasai7.github.io)
📧 [elonmasai7@gmail.com](mailto:elonmasai7@gmail.com)

---

## 📄 License

MIT License – use freely for educational or demo purposes.

```

---

Let me know if you’d like a `live demo` hosted on Replit, Railway, or your server. I can also help you add authentication or deploy it.
```
