CREATE TABLE meeting_users (
    meetings_id INT NOT NULL,
    user_id INT NOT NULL,
    role VARCHAR(50) NOT NULL,
    PRIMARY KEY (meetings_id, user_id),
    FOREIGN KEY (meetings_id) REFERENCES meetings(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
