-- Simple SQL Script to populate unique_id for existing users
-- Format: YYYYMMDD + sequential number (3 digits)
-- Example: 20250115001, 20250115002, etc.

-- Step 1: Add the unique_id column if it doesn't exist (already done by migration)
-- ALTER TABLE `users` 
-- ADD COLUMN `unique_id` VARCHAR(20) NULL UNIQUE AFTER `id`;

-- Step 2: Generate unique_id for all users grouped by creation date
-- This uses a window function approach (MySQL 8.0+) or a simpler self-join method

-- Method 1: Using ROW_NUMBER() window function (MySQL 8.0+)
UPDATE `users` u
INNER JOIN (
    SELECT 
        id,
        CONCAT(
            DATE_FORMAT(created_at, '%Y%m%d'),
            LPAD(
                ROW_NUMBER() OVER (
                    PARTITION BY DATE(created_at) 
                    ORDER BY created_at, id
                ),
                3,
                '0'
            )
        ) AS new_unique_id
    FROM `users`
    WHERE unique_id IS NULL
) AS temp ON u.id = temp.id
SET u.unique_id = temp.new_unique_id
WHERE u.unique_id IS NULL;

-- Method 2: Alternative approach using variables (works in older MySQL versions)
-- SET @row_number = 0;
-- SET @prev_date = NULL;
-- 
-- UPDATE `users` u
-- INNER JOIN (
--     SELECT 
--         id,
--         @row_number := CASE 
--             WHEN @prev_date = DATE(created_at) THEN @row_number + 1
--             ELSE (@prev_date := DATE(created_at)) AND (@row_number := 1)
--         END AS seq_num,
--         DATE(created_at) AS user_date
--     FROM `users`
--     WHERE unique_id IS NULL
--     ORDER BY DATE(created_at), id
-- ) AS temp ON u.id = temp.id
-- SET u.unique_id = CONCAT(DATE_FORMAT(u.created_at, '%Y%m%d'), LPAD(temp.seq_num, 3, '0'))
-- WHERE u.unique_id IS NULL;

-- Step 3: Verify the results
SELECT id, name, email, created_at, unique_id 
FROM users 
ORDER BY created_at, id
LIMIT 20;
