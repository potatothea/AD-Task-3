CREATE TABLE tasks (
    id SERIAL PRIMARY KEY,
    project_id INT NOT NULL,
    assigned_to INT,
    task_name VARCHAR(100) NOT NULL,
    description TEXT,
    status VARCHAR(30) DEFAULT 'Pending',
    due_date DATE,
    CONSTRAINT FK_tasks_projects FOREIGN KEY (project_id) REFERENCES projects(id),
    CONSTRAINT FK_tasks_users FOREIGN KEY (assigned_to) REFERENCES users(id)
);
