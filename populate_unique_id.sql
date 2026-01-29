-- SQL Script to populate unique_id for existing users
-- This script generates unique IDs in the format: YYYYMMDD + sequential number (3 digits)
-- Example: 20250115001, 20250115002, etc.

-- Step 1: Add the unique_id column if it doesn't exist
ALTER TABLE `users` 
ADD COLUMN `unique_id` VARCHAR(20) NULL UNIQUE AFTER `id`;

-- Step 2: Generate and populate unique_id for all existing users
-- This approach processes users day by day to assign sequential numbers
-- Note: This script should be run via Laravel's Artisan command or PHP script for better reliability
-- For direct SQL execution, use the following approach:

-- Option A: Using a stored procedure (recommended for large datasets)
DELIMITER //
CREATE PROCEDURE populate_unique_ids()
BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE user_id INT;
    DECLARE user_date DATE;
    DECLARE seq_num INT;
    DECLARE cur_date DATE DEFAULT NULL;
    DECLARE cur CURSOR FOR SELECT id, DATE(created_at) FROM users WHERE unique_id IS NULL ORDER BY created_at, id;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    OPEN cur;
    SET seq_num = 0;

    read_loop: LOOP
        FETCH cur INTO user_id, user_date;
        IF done THEN
            LEAVE read_loop;
        END IF;

        IF cur_date IS NULL OR cur_date != user_date THEN
            SET cur_date = user_date;
            SET seq_num = 1;
        ELSE
            SET seq_num = seq_num + 1;
        END IF;

        UPDATE users 
        SET unique_id = CONCAT(DATE_FORMAT(created_at, '%Y%m%d'), LPAD(seq_num, 3, '0'))
        WHERE id = user_id;
    END LOOP;

    CLOSE cur;
END//
DELIMITER ;

-- Execute the stored procedure
CALL populate_unique_ids();

-- Drop the stored procedure after use
DROP PROCEDURE IF EXISTS populate_unique_ids;

-- Option B: Simple approach for small datasets (if stored procedures are not available)
-- This works but may be slower for large datasets
-- UPDATE users u1
-- SET unique_id = (
--     SELECT CONCAT(
--         DATE_FORMAT(u1.created_at, '%Y%m%d'),
--         LPAD(
--             (SELECT COUNT(*) FROM users u2 
--              WHERE DATE(u2.created_at) = DATE(u1.created_at) 
--              AND u2.id <= u1.id),
--             3,
--             '0'
--         )
--     )
-- )
-- WHERE unique_id IS NULL;

-- Step 3: Verify the results
-- Uncomment the line below to see the generated unique_ids
-- SELECT id, name, email, created_at, unique_id FROM users ORDER BY created_at;

-- Note: If you need to regenerate unique_ids, first set them all to NULL:
-- UPDATE `users` SET `unique_id` = NULL;
-- Then run the UPDATE query again.
