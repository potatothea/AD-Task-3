CREATE TABLE tasks (
    id SERIAL PRIMARY KEY,
    meetings_id INT NOT NULL,
    assigned_to INT,
    task_name VARCHAR(100) NOT NULL,
    description TEXT,
    status VARCHAR(30) DEFAULT 'Pending',
    due_date DATE,
    CONSTRAINT FK_tasks_meetings FOREIGN KEY (meetings_id) REFERENCES meetings(id),
    CONSTRAINT FK_tasks_users FOREIGN KEY (assigned_to) REFERENCES users(id)
);
