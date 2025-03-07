# JobBoard

The Job Search App allows users to search for job listings based on various filters such as salary range, job type, experience level, and date posted. Users can also search for jobs by keywords, categories, and tags. The app supports filtering job listings dynamically and displays the most relevant results based on user preferences. It also includes a pagination system to help users navigate through large amounts of data.

## Features

-   Job Search: Search jobs by title, company, category, and tag.
-   Filters: Filter jobs by salary range, job type, work experience, and date posted.
-   Dynamic Search: Filter results dynamically using range sliders for salary and checkboxes for other filters.
-   Pagination: View jobs in paginated lists, making it easy to navigate through many results.
-   Category & Tag Sorting: Popular categories and tags are shown to help users find relevant job postings.

## Prerequisites

Before setting up the project, make sure you have the following installed:

-   **PHP (>= 8.1 recommended)**
-   **Composer**
-   **Laravel 8.x or higher**
-   **Node.js (>= 14.0.0)**
-   **NPM (or Yarn)**
-   **A configured MySQL database**
-   **Pusher credentials for real-time events**

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/aarifhsn/job-board.git
    ```

2. **Navigate to the Project Directory**

    ```bash
    cd job-board
    ```

3. **Install PHP dependencies**

    ```bash
    composer install
    ```

4. **Install JavaScript dependencies:**

    ```bash
    npm install
    ```

5. **Configure the .env file**

    **Copy the example environment file and set up your environment variables:**

    ```bash
    cp .env.example .env
    ```

6. **Generate an application key:**
    ```bash
    php artisan key:generate
    ```
7. **Run database migrations:**

    ```bash
    php artisan migrate
    ```

8. **Link the storage directory: Laravel uses symbolic links to access files stored in the** storage **directory from the public directory.**

    ```bash
    php artisan storage:link
    ```

9. **Start the Laravel queue worker: Laravel uses queues to process notifications asynchronously.**

    ```bash
    php artisan queue:work
    ```

10. **Compile Frontent Assets**

    ```bash
    npm run dev
    ```

11. **php artisan serve**

    ```bash
    php artisan serve
    ```

12. **Access the application:**

    Open your browser and navigate to [http://localhost:8000](http://localhost:8000) to start using the platform.
