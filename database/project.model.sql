DROP TABLE IF EXISTS projects;       

CREATE TABLE projects (
    id SERIAL PRIMARY KEY,
    project_name VARCHAR(100) NOT NULL,
    description TEXT,
    start_date DATE,
    end_date DATE
);
