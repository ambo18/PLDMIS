#DLDMIS
DLDMIS (Development of a Learning And Development Management Information System) is a PHP-based software solution designed to manage employee training and leave applications within an organization.

Features
Employee Training Management
Course Catalog: Maintain a catalog of available training courses, including descriptions, prerequisites, and schedules.
Enrollment: Allow employees to enroll in training programs and manage their course registrations.
Progress Tracking: Track employee progress in completing training courses and certifications.
Reporting: Generate reports on training activities, completion rates, and other key metrics.
Leave Applications
Leave Types: Support various types of leave, such as sick leave, vacation leave, and special privilege leave.
Leave Requests: Enable employees to submit leave requests online, specifying the type of leave, dates, and reasons.
Approval Workflow: Implement an approval workflow for leave requests, allowing supervisors or managers to review and approve/reject requests.
Leave Balances: Display leave balances for employees, showing the remaining days of each leave type.
Installation
Clone the repository to your local machine:

bash
Copy code
git clone https://github.com/your-username/DLDMIS.git
Move the project folder to the htdocs directory of your XAMPP installation.

Start the Apache and MySQL services in XAMPP.

Import the provided database file (dldmis_database.sql) into your MySQL database using phpMyAdmin or the MySQL command line.

Update the database connection settings in the PHP files located in the config directory to match your local environment.

Access the application in your web browser at http://localhost/DLDMIS (or another specified directory).

Usage
Employee Training Management
Users can log in using their credentials and access the training module.
Employees can browse the course catalog, enroll in training programs, and view their training progress.
Administrators can add new courses, schedule training sessions, generate reports, and manage user accounts.
Leave Applications
Employees can log in to the system and submit leave requests online, specifying the type of leave, dates, and reasons.
Supervisors or managers receive notifications of pending leave requests and can review, approve, or reject them.
Leave balances are updated automatically based on approved leave requests, and employees can view their remaining leave days.
Contributing
Contributions are welcome! If you find any bugs or have suggestions for improvements, please open an issue or submit a pull request.

License
This project is licensed under the MIT License. See the LICENSE file for details.

Acknowledgements
This project was inspired by the need for a comprehensive Learning and Development Management Information System to streamline training processes and leave management within organizations.
Special thanks to all contributors and open-source libraries used in this project.
