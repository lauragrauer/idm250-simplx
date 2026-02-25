CREATE TABLE cms_shipped_items (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    order_id        INT NOT NULL,
    order_number    VARCHAR(100) NOT NULL,
    unit_id         VARCHAR(100) NOT NULL,
    sku             VARCHAR(100),
    sku_description VARCHAR(255),
    shipped_at      DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
