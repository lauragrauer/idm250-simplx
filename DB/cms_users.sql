CREATE TABLE cms_users (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cms_users (username, password) VALUES (
    'philphil123',
    '$2b$12$2IaMhwtAF2szSNOUtYm83Oubzw.Y.6kASErIiKnPhRfhMnIqBjLsW'
);
