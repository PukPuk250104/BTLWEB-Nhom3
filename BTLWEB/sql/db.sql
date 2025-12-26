CREATE TABLE loai_sp (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_loai VARCHAR(100) NOT NULL
) ENGINE=InnoDB;
CREATE TABLE thuong_hieu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_thuong_hieu VARCHAR(100) NOT NULL
) ENGINE=InnoDB;
CREATE TABLE size (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_size VARCHAR(50) NOT NULL
) ENGINE=InnoDB;
CREATE TABLE title (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_title VARCHAR(100) NOT NULL
) ENGINE=InnoDB;
CREATE TABLE balo (
    id INT AUTO_INCREMENT PRIMARY KEY,

    ma_sp VARCHAR(50),

    loai_sp_id INT,
    thuong_hieu_id INT,
    size_id INT,
    title_id INT,

    tinh_trang VARCHAR(50),
    color VARCHAR(50),
    chat_lieu VARCHAR(100),
    pic VARCHAR(255),

    price DECIMAL(10,2),

    CONSTRAINT fk_balo_loai_sp
        FOREIGN KEY (loai_sp_id)
        REFERENCES loai_sp(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL,

    CONSTRAINT fk_balo_thuong_hieu
        FOREIGN KEY (thuong_hieu_id)
        REFERENCES thuong_hieu(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL,

    CONSTRAINT fk_balo_size
        FOREIGN KEY (size_id)
        REFERENCES size(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL,

    CONSTRAINT fk_balo_title
        FOREIGN KEY (title_id)
        REFERENCES title(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;
CREATE TABLE phukien (
    id INT AUTO_INCREMENT PRIMARY KEY,

    ma_sp VARCHAR(50),
    mo_ta TEXT,
    chuc_nang TEXT,

    price DECIMAL(10,2),

    thuong_hieu_id INT,
    loai_sp_id INT,
    title_id INT,

    CONSTRAINT fk_phukien_thuong_hieu
        FOREIGN KEY (thuong_hieu_id)
        REFERENCES thuong_hieu(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL,

    CONSTRAINT fk_phukien_loai_sp
        FOREIGN KEY (loai_sp_id)
        REFERENCES loai_sp(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL,

    CONSTRAINT fk_phukien_title
        FOREIGN KEY (title_id)
        REFERENCES title(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;
