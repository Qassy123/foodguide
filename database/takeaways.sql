CREATE TABLE takeaways (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    cuisine_type VARCHAR(100) NOT NULL,
    address VARCHAR(200) NOT NULL,
    price_range VARCHAR(20) NOT NULL,
    rating DECIMAL(2,1) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO takeaways (name, cuisine_type, address, price_range, rating, description) VALUES
('Grill 21', 'Fast Food', '1 Crown St, Wolverhampton', '£10-20', 4.4, 'Popular fast food takeaway known for grilled items.'),
('Spice Wave', 'Takeaway', '98 Great Brickkiln St, Wolverhampton', '£10-20', 4.9, 'Highly rated takeaway with strong customer reviews.'),
('Tasty Pizza', 'Pizza Delivery', '715 Parkfield Rd, Wolverhampton', '£10-20', 4.3, 'Pizza takeaway offering quick delivery service.'),
('Shaho''s Kebab', 'Kebab Shop', '213 Staveley Rd, Wolverhampton', '£1-10', 4.8, 'Well rated kebab shop with fresh food.'),
('Burger & Sauce', 'Burger', '29 Market St, Wolverhampton', '£10-20', 4.3, 'Popular burger takeaway in city centre.'),
('Peppers Wolverhampton', 'Fast Food', '14 Broad St, Wolverhampton', '£1-10', 4.6, 'Affordable fast food takeaway.'),
('Jolly''s Grab & Go', 'Indian Takeaway', 'Chancel Industrial Estate, Hickman Ave', '£1-10', 4.5, 'Indian takeaway known for reliable service.'),
('Hasty Tasty Pizza', 'Pizza Takeaway', 'Unit 131, 40 The Gallery, Wolverhampton', '£1-10', 3.7, 'Budget pizza takeaway.'),
('Mammees', 'Seafood', '184 New Hampton Rd E, Wolverhampton', '£1-10', 4.2, 'Seafood takeaway with large portions.'),
('Shawarma Station', 'Takeaway', '38 Queen St, Wolverhampton', '£1-10', 4.5, 'Middle Eastern takeaway with strong reviews.'),
('Fusion', 'Takeaway', '28b Snow Hill, Wolverhampton', '£1-10', 3.5, 'Local takeaway with varied menu.'),
('KFC Wolverhampton - Queen St', 'Fast Food', '65 Queen St, Wolverhampton', '£1-50', 4.3, 'Well known fast food chain branch.'),
('German Doner Kebab (GDK)', 'Takeaway', '63-64 Queen St, Wolverhampton', '£10-20', 4.5, 'Popular doner kebab franchise.'),
('Kashmir Sweet Centre', 'Restaurant', '90 Great Brickkiln St, Wolverhampton', '£1-10', 4.7, 'Restaurant and takeaway serving sweets and meals.'),
('Our Rasoi', 'Fast Food', 'Bridge St, Wolverhampton', '£1-10', 3.8, 'Authentic Indian style takeaway.'),
('Pizza Planet', 'Takeaway', '47 Rooker Ave, Wolverhampton', '£1-10', 4.8, 'Highly rated pizza takeaway.'),
('House of Chaii', 'Cafe', '19 Queen St, Wolverhampton', '£10-20', 4.9, 'Cafe and takeaway with excellent ratings.'),
('Aladdins Pizza', 'Pizza', 'Willenhall Rd, Wolverhampton', '£10-20', 4.0, 'Local pizza takeaway offering delivery.'),
('Heavenly Desserts Wolverhampton', 'Dessert', '68a Darlington St, Wolverhampton', '£10-20', 4.4, 'Dessert takeaway and restaurant.');