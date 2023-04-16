-- Task 2.2: Table creation
DROP DATABASE IF EXISTS dufie_hostels;
CREATE DATABASE dufie_hostels;
USE dufie_hostels;

CREATE TABLE Building (
    building_id INT PRIMARY KEY AUTO_INCREMENT,
    building_name VARCHAR(25) NOT NULL,
    number_of_floors INT NOT NULL,
    number_of_rooms INT NOT NULL
);

CREATE TABLE Student (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    phone_number VARCHAR(25) NOT NULL,
    parent_number VARCHAR(25)
);

CREATE TABLE Room (
    room_id INT PRIMARY KEY AUTO_INCREMENT,
    room_number VARCHAR(25) NOT NULL,
    room_type VARCHAR(25) NOT NULL,
    number_of_beds INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    availability_status VARCHAR(25) NOT NULL,
    building_id INT NOT NULL,
    student_id INT NOT NULL,
    FOREIGN KEY (building_id) REFERENCES Building(building_id),
    FOREIGN KEY (student_id) REFERENCES Student(student_id)
);

CREATE TABLE Room_Amenities (
    room_amenities_id INT PRIMARY KEY AUTO_INCREMENT,
    room_id INT NOT NULL,
    amenity_name VARCHAR(25) NOT NULL,
    amenity_description VARCHAR(255),
    FOREIGN KEY (room_id) REFERENCES Room(room_id)
);

CREATE TABLE Booking (
    booking_id INT PRIMARY KEY AUTO_INCREMENT,
    booking_date DATE NOT NULL,
    check_in_date DATE NOT NULL,
    check_out_date DATE NOT NULL,
    payment_status VARCHAR(25) NOT NULL,
    student_id INT NOT NULL,
    room_id INT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES Student(student_id),
    FOREIGN KEY (room_id) REFERENCES Room(room_id)
);

CREATE TABLE Payment (
    payment_id INT PRIMARY KEY AUTO_INCREMENT,
    payment_date DATE NOT NULL,
    payment_amount DECIMAL(10, 2) NOT NULL,
    payment_type VARCHAR(25) NOT NULL,
    booking_id INT NOT NULL,
    student_id INT NOT NULL,
    FOREIGN KEY (booking_id) REFERENCES Booking(booking_id),
    FOREIGN KEY (student_id) REFERENCES Student(student_id)
);

CREATE TABLE Maintenance_Request (
    request_id INT PRIMARY KEY AUTO_INCREMENT,
    request_date DATE NOT NULL,
    request_description VARCHAR(255) NOT NULL,
    room_id INT NOT NULL,
    maintenance_status VARCHAR(25) NOT NULL,
    FOREIGN KEY (room_id) REFERENCES Room(room_id)
);

CREATE TABLE Maintenance_Worker (
    worker_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    phone_number VARCHAR(25) NOT NULL,
    request_id INT NOT NULL,
    FOREIGN KEY (request_id) REFERENCES Maintenance_Request(request_id)
);

CREATE TABLE Room_Booking_History (
    history_id INT PRIMARY KEY AUTO_INCREMENT,
    room_id INT NOT NULL,
    student_id INT NOT NULL,
    check_in_date DATE NOT NULL,
    check_out_date DATE,
    FOREIGN KEY (room_id) REFERENCES Room(room_id),
    FOREIGN KEY (student_id) REFERENCES Student(student_id)
);


-- Task 2.3: Data population
-- INSERT INTO Building (building_name, number_of_floors, number_of_rooms)
-- VALUES ('Presteige', 2, 10),
--        ('Male Block', 3, 30),
--        ('Female Block', 3, 30),
--        ('Dufie Annex', 4, 50),
--        ('Dufie Gold', 4, 30);



-- Task 2.4: queries
-- Find all available single rooms in a specific building with their amenities
SELECT R.room_id, R.room_number, RA.amenity_name, RA.amenity_description
FROM Room AS R
INNER JOIN Room_Amenities AS RA ON R.room_id = RA.room_id
WHERE R.room_type = 'single' AND R.availability_status = 'available' AND R.building_id = 1;

-- Get a list of students with their room details and total payment amount for each booking
SELECT S.first_name, S.last_name, R.room_number, B.booking_id, SUM(P.payment_amount) as total_payment_amount
FROM Student AS S
INNER JOIN Booking AS B ON S.student_id = B.student_id
INNER JOIN Room AS R ON B.room_id = R.room_id
INNER JOIN Payment AS P ON (B.booking_id = P.booking_id AND S.student_id = P.student_id)
GROUP BY S.student_id, B.booking_id;

-- Find the total number of maintenance requests per building
SELECT B.building_id, B.building_name, COUNT(MR.request_id) as maintenance_request_count
FROM Building AS B
LEFT JOIN Room AS R ON B.building_id = R.building_id
LEFT JOIN Maintenance_Request AS MR ON R.room_id = MR.room_id
GROUP BY B.building_id;

-- List all students who have not checked out (current occupants) and their room details, ordered by room number
SELECT S.first_name, S.last_name, R.room_number, R.room_type, R.number_of_beds
FROM Student AS S
INNER JOIN Room AS R ON S.student_id = R.student_id
WHERE R.room_id NOT IN (SELECT room_id FROM Room_Booking_History WHERE check_out_date IS NOT NULL)
ORDER BY R.room_number;


-- Find the total income per building
SELECT B.building_id, B.building_name, SUM(P.payment_amount) as total_income
FROM Building AS B
INNER JOIN Room AS R ON B.building_id = R.building_id
INNER JOIN Booking AS BK ON R.room_id = BK.room_id
INNER JOIN Payment AS P ON BK.booking_id = P.booking_id
GROUP BY B.building_id;

 
-- Get the list of rooms with the highest number of maintenance requests and their respective request count
SELECT R.room_id, R.room_number, COUNT(MR.request_id) as request_count
FROM Room AS R
INNER JOIN Maintenance_Request AS MR ON R.room_id = MR.room_id
GROUP BY R.room_id
HAVING COUNT(MR.request_id) >= ALL (SELECT COUNT(request_id) FROM Maintenance_Request GROUP BY room_id);SELECT S.first_name, S.last_name, R.room_number, R.room_type, R.number_of_beds FROM Student AS S INNER JOIN Room AS R ON S.room_id = R.room_id WHERE S.student_id NOT IN (SELECT student_id FROM Room_Booking_History WHERE check_out_date IS NOT NULL) ORDER BY R.room_number LIMIT 0, 1000
