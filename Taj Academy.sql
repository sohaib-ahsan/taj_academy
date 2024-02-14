
-- Generate and insert records into the courses table
INSERT INTO courses (course_code, name, course_fees)
VALUES
    ('C001', 'Basic Computer Course',10000),
    ('C002', 'Graphic Designing Course', 20000),
    ('C003', 'Graphics Advance Course', 35000),
    ('C004', 'Certificate of Information Technology', 90000),
    ('C005', 'Diploma of Information Technology',70000),
    ('C006', 'Adobe Photoshop Course', 45000);


-- Insert records into the Student table
INSERT INTO Student (name, roll_no, father_name, CNIC, email, gender, image, contact_no, father_contactNo, DOB, address, registration_date, course_id, active, fees)
VALUES
    ('John Doe', 12345,  'Michael Doe', '4567890123456', 'john@example.com', 'Male', 'john.jpg', '03567890123', '03765432109', '1997-07-20', '789 Elm St, New York', '2023-10-08', 4,1, 4000);
    

