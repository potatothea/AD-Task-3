DROP TABLE IF EXISTS meetings;       

CREATE TABLE meetings (
    id SERIAL PRIMARY KEY,
    meetings_name VARCHAR(100) NOT NULL,
    description TEXT,
    start_date DATE,
    end_date DATE
);

