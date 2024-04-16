# Bookstore Web Application

Welcome to the Bookstore Web Application! This application allows users to browse books, add them to their shopping cart, and proceed to checkout.

## Installation

Follow these steps to install the application:

1. **Clone the Repository**: Clone this repository to your local machine using Git: `git clone https://github.com/mnadeemasghar/bookshop-task.git`

2. **Database Setup**:

- Create a new MySQL database for the application.

- Import the SQL file `database.sql` located in the `sql` folder into your newly created database. This file contains the necessary table structure.

3. **Update Database Connection**:

- Open the `connect.php` file located in the root directory of the application.

- Update the database connection details (host, username, password, database name) with your MySQL credentials.

4. **Web Server Setup**:

- If you're using XAMPP, WAMP, or MAMP, place the cloned repository in the `htdocs` directory (for XAMPP) or equivalent directory in other server stacks.

5. **Start the Web Server**:

- Start your web server (Apache) and MySQL server.

6. **Access the Application**:

- Open your web browser and navigate to the URL where the application is hosted (e.g., http://localhost/bookstore).

## Usage

- Browse books: Visit the homepage to view the list of available books.

- Add books: Click on the "Add Book" link to add a new book to the database.

- Update books: Use the "Update" link next to each book to update its details.

- Delete books: Use the "Delete" link next to each book to delete it from the database.