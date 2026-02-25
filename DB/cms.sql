SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS cms_order_items, cms_orders, cms_mpl_items, cms_mpls, cms_inventory, cms_skus;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE cms_skus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ficha INT NOT NULL,
    sku VARCHAR(50) UNIQUE NOT NULL,
    description VARCHAR(255) NOT NULL,
    uom_primary VARCHAR(20) NOT NULL,
    piece_count INT,
    length_inches DECIMAL(10,2),
    width_inches DECIMAL(10,2),
    height_inches DECIMAL(10,2),
    weight_lbs DECIMAL(10,2),
    assembly VARCHAR(10),
    rate DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cms_inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    unit_id VARCHAR(50) UNIQUE NOT NULL,
    sku_id INT NOT NULL,
    location ENUM('internal', 'warehouse') DEFAULT 'internal',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (sku_id) REFERENCES cms_skus(id) ON DELETE CASCADE
);

CREATE TABLE cms_mpls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reference_number VARCHAR(50) UNIQUE NOT NULL,
    trailer_number VARCHAR(50) NOT NULL,
    expected_arrival DATE NOT NULL,
    status ENUM('draft', 'sent', 'confirmed') DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cms_mpl_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mpl_id INT NOT NULL,
    unit_id VARCHAR(50) NOT NULL,
    sku VARCHAR(50),
    FOREIGN KEY (mpl_id) REFERENCES cms_mpls(id) ON DELETE CASCADE
);

CREATE TABLE cms_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(50) UNIQUE NOT NULL,
    ship_to_company VARCHAR(255) NOT NULL,
    ship_to_street VARCHAR(255) NOT NULL,
    ship_to_city VARCHAR(100) NOT NULL,
    ship_to_state VARCHAR(10) NOT NULL,
    ship_to_zip VARCHAR(20) NOT NULL,
    status ENUM('draft', 'sent', 'shipped') DEFAULT 'draft',
    shipped_at DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cms_order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    unit_id VARCHAR(50) NOT NULL,
    sku VARCHAR(50),
    FOREIGN KEY (order_id) REFERENCES cms_orders(id) ON DELETE CASCADE
);

INSERT INTO cms_skus (ficha, sku, description, uom_primary, piece_count, length_inches, width_inches, height_inches, weight_lbs, assembly, rate) VALUES
(724, '1720813-0132', 'MDF ST LX C2-- 2465X1245X05.7MM P/EF/132', 'BUNDLE', 250, 96, 39, 29.65, 3945.22, 'false', 15.16),
(987, '1720814-0248', 'PINE CLR VG 2X4X8FT KD SELECT', 'BUNDLE', 200, 96, 42, 36.00, 2850.50, 'false', 16.18),
(337, '1720815-0156', 'OAK RED FAS 4/4 RGH KD 8-12FT', 'PALLET', 150, 120, 48, 42.00, 4125.75, 'false', 15.16),
(778, '1720816-0089', 'SPRUCE DIMENSION 2X6X12FT #2BTR', 'BUNDLE', 180, 144, 36, 30.00, 3280.00, 'false', 14.50),
(187, '1720817-0234', 'CEDAR WRC CVG 1X6X8FT CLR S4S', 'BUNDLE', 300, 96, 36, 24.00, 1890.25, 'false', 20.06),
(223, '1720818-0167', 'MAPLE HARD FAS 5/4 RGH KD 10FT', 'PALLET', 120, 120, 48, 38.00, 3750.80, 'false', 16.18),
(876, '1720819-0312', 'PLYWOOD BALTIC BIRCH 3/4X4X8', 'PALLET', 45, 96, 48, 36.00, 2980.00, 'false', 17.02),
(223, '1720820-0098', 'POPLAR FAS 4/4 RGH KD 8-14FT', 'BUNDLE', 175, 144, 42, 32.00, 2650.40, 'false', 16.14),
(991, '1720821-0445', 'WALNUT BLK FAS 4/4 RGH KD 8FT', 'PALLET', 80, 96, 48, 28.00, 2240.60, 'false', 12.14),
(901, '1720822-0223', 'DOUGLAS FIR CVG 2X10X16FT #1', 'BUNDLE', 100, 192, 48, 40.00, 4580.90, 'false', 16.18),
(452, '1720823-0567', 'BIRCH YEL FAS 6/4 RGH KD 10FT', 'PALLET', 95, 120, 44, 34, 3120.45, 'false', 18.22),
(163, '1720824-0891', 'HEMLOCK DIM 2X8X14FT #2BTR STD', 'BUNDLE', 160, 168, 40, 28.5, 2975.30, 'false', 14.85),
(589, '1720825-0234', 'ASH WHT FAS 4/4 RGH KD 9-11FT', 'PALLET', 110, 132, 46, 40, 3540.60, 'false', 15.92),
(734, '1720826-0412', 'MDF ULTRALT C1-- 2440X1220X18MM', 'BUNDLE', 85, 96, 48, 52, 4250.75, 'false', 13.44),
(298, '1720827-0178', 'CHERRY BLK SEL 5/4 RGH KD 8FT', 'PALLET', 70, 96, 42, 26, 1980.20, 'false', 21.35),
(641, '1720828-0923', 'REDWOOD CLR VG 2X4X10FT KD HRT', 'BUNDLE', 225, 120, 38, 32, 2430.85, 'false', 19.78),
(812, '1720829-0056', 'PARTICLEBOARD IND 3/4X49X97', 'PALLET', 60, 97, 49, 45, 3890.40, 'false', 11.56),
(445, '1720830-0789', 'ALDER RED SEL 4/4 RGH KD 8-10FT', 'BUNDLE', 140, 120, 40, 30, 2180.55, 'false', 17.64),
(127, '1720831-0345', 'WHITE OAK QS 4/4 RGH KD 10FT', 'PALLET', 65, 120, 48, 38, 2890.70, 'false', 22.40),
(568, '1720832-0612', 'SOUTHERN PINE PT 4X4X12FT GC', 'BUNDLE', 130, 144, 44, 48, 5120.35, 'false', 13.28),
(185, '1720833-0150', 'PINE CLR 2X6X8FT SELECT', 'BUNDLE', 210, 96, 42, 32, 2650.00, 'false', 17.10),
(638, '1720834-0164', 'HEM-FIR 2X4X16FT #2', 'BUNDLE', 180, 192, 42, 38, 3950.00, 'false', 14.70),
(921, '1720835-0178', 'CHERRY FAS 4/4 KD 8-10FT', 'PALLET', 100, 120, 48, 36, 3200.00, 'false', 18.90),
(346, '1720836-0192', 'ASH 5/4 FAS KD 11FT', 'PALLET', 120, 132, 48, 40, 3800.00, 'false', 17.60),
(709, '1720837-0206', 'SPRUCE 2X8X10FT #2', 'BUNDLE', 150, 120, 48, 36, 3600.00, 'false', 15.20),
(174, '1720838-0220', 'CEDAR RED 2X4X8FT S1S2E', 'BUNDLE', 240, 96, 36, 30, 2200.00, 'false', 20.30),
(582, '1720839-0234', 'BALTIC BIRCH PLY 18MM 5X5', 'PALLET', 38, 60, 60, 48, 3100.00, 'false', 18.10),
(837, '1720840-0248', 'PINE #2 2X10X12FT KD', 'BUNDLE', 110, 144, 48, 40, 4100.00, 'false', 16.40),
(291, '1720841-0262', 'OAK WHITE 4/4 FAS KD 10FT', 'PALLET', 130, 120, 48, 42, 4350.00, 'false', 16.70),
(653, '1720842-0276', 'MAPLE SOFT 4/4 KD 8FT', 'BUNDLE', 170, 96, 42, 32, 2600.00, 'false', 15.50);

INSERT INTO cms_inventory (unit_id, sku_id, location) VALUES
('UNIT-48114995', 1, 'internal'),
('UNIT-48115002', 2, 'internal'),
('UNIT-48115019', 3, 'internal'),
('UNIT-48115026', 4, 'internal'),
('UNIT-48115033', 5, 'internal'),
('UNIT-48115040', 6, 'internal'),
('UNIT-48115057', 7, 'internal'),
('UNIT-48115064', 8, 'internal'),
('UNIT-48115071', 9, 'internal'),
('UNIT-48115088', 10, 'internal'),
('UNIT-48115095', 11, 'internal'),
('UNIT-48115102', 12, 'internal'),
('UNIT-48115119', 13, 'internal'),
('UNIT-48115126', 14, 'internal'),
('UNIT-48115133', 15, 'internal'),
('UNIT-48115140', 16, 'internal'),
('UNIT-48115157', 17, 'internal'),
('UNIT-48115164', 18, 'internal'),
('UNIT-48115171', 19, 'internal'),
('UNIT-48115188', 20, 'internal'),
('UNIT-48115195', 21, 'internal'),
('UNIT-48115202', 22, 'internal'),
('UNIT-48115219', 23, 'internal'),
('UNIT-48115226', 24, 'internal'),
('UNIT-48115233', 25, 'internal'),
('UNIT-48115240', 26, 'internal'),
('UNIT-48115257', 27, 'internal'),
('UNIT-48115264', 28, 'internal'),
('UNIT-48115271', 29, 'internal'),
('UNIT-48115288', 30, 'internal');
