# Arsitek Web Application

This project is a web application for an architecture and interior design firm, built with PHP. It provides features for user authentication (login and registration), as well as information about the team and services offered.

## Features

- **User Authentication**
  - User Login
  - User Registration (Daftar)

## Getting Started

1. **Clone the repository**
   ```bash
   git clone <https://github.com/iannnub/arsitek.git>
   ```
2. **Set up your web server**
   - Place the project in your web server's root directory (e.g., `htdocs` for XAMPP)
3. **Database Configuration**
   - Edit `db/config.php` with your database credentials
   - Import the provided SQL file (if available) to set up the database tables
4. **Run the Application**
   - Open your browser and navigate to `http://localhost/arsitek`

## Folder Structure

- `app/controllers/` — Application controllers (e.g., `HomeController.php`)
- `app/models/` — Data models
- `app/views/` — View templates
- `db/` — Database configuration and migrations

## Implemented Authentication Logic

- **Login**: Users can log in with their registered email and password
- **Registration**: New users can create an account via the registration form
- **Session Handling**: User sessions are managed to maintain authentication state
- **Validation**: Input validation is performed for both login and registration forms

## Credits

- Team member images are sourced from [Unsplash](https://unsplash.com/)

---