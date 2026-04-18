# Kantin Kita

> A digital canteen system built on the principle that friction is the enemy of good service.

---

Kantin Kita is a web-based ordering platform designed for school canteen environments. It replaces physical queues and verbal orders with a structured, trackable digital flow — from product discovery to order completion.

This is a small system. But it was built with the same questions a production system demands: *Who owns this state? Where does responsibility live? What happens when something goes wrong?*

---

## Why This Project Exists

Physical canteen queues are an unsolved UX problem. Students queue. Staff guess at orders. Items run out without notice. Nothing is tracked.

Kantin Kita doesn't try to be a marketplace. It tries to be **the right tool for a specific context** — a closed, trust-aware environment where speed and clarity matter more than scale. The goal was never to build something complex. It was to build something that *actually solves the problem it claims to solve*.

---

## Core Features

**User Side**
- Registration, login, and session management
- Browse food and drink catalog with product detail views
- Cart management — add, update quantity, remove items
- Checkout flow with order submission
- Real-time order status tracking: `Pending → Processed → Completed / Cancelled`
- User profile management

**Admin Side**
- Dedicated admin dashboard
- Full product CRUD — create, update, and retire menu items
- Order management with manual status progression
- Centralized view of all active and historical orders

**System**
- Role-based access control separating user and admin contexts
- Session-based authentication without external dependencies
- Consistent state management across cart and order lifecycle

---

## System Design Insight

The architecture follows a **single-responsibility approach per layer**: routing is routing, data access is data access, and presentation stays in templates. No logic bleeds into the view.

State transitions in the order lifecycle are intentional and one-directional. An order moves forward — it doesn't loop. This reflects a real constraint: canteen staff need clarity, not flexibility.

The cart is treated as **ephemeral session state** until checkout converts it into a persistent order record. This distinction matters — it's the line between intent and commitment.

No framework was used by design. Working closer to the metal forces you to understand what frameworks abstract away. The result is a leaner codebase with no magic.

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP (Native) |
| Frontend | HTML, CSS, JavaScript |
| Database | MySQL |
| Auth | PHP Session-based |
| Environment | Apache / XAMPP |

---

## Installation

```bash
# 1. Clone the repository
git clone https://github.com/yourusername/kantin-kita.git

# 2. Move project to your server root
# e.g., /xampp/htdocs/kantin-kita

# 3. Import the database
# Open phpMyAdmin and import: database/kantin_kita.sql

# 4. Configure the database connection
# Edit config/database.php with your local credentials

# 5. Start Apache and MySQL via XAMPP, then open:
# http://localhost/kantin-kita
```

---




