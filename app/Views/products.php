<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/save">
        <input type="hidden" name="id" value="<?= isset($prod['id']) ? $prod['id'] : '' ?>">
        <label></label>
        <input required type="text" name="ProductName" placeholder="ProductName" value="<?= isset($prod['ProductName']) ? $prod['ProductName'] : '' ?>"><br>
        <label></label>
        <input required type="text" name="ProductDescription" placeholder="ProductDescription" value="<?= isset($prod['ProductDescription']) ? $prod['ProductDescription'] : '' ?>"><br>
        <label for="ProductCategory">Choose a Category:</label>
        <select id="ProductCategory" name="ProductCategory">
        <option value="Electronics"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Electronics' ? 'selected' : '' ?>>Electronics</option>
        <option value="Clothing"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Clothing' ? 'selected' : '' ?>>Clothing</option>
        <option value="Books"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Books' ? 'selected' : '' ?>>Books</option>
        <option value="Home Appliances"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Home Appliances' ? 'selected' : '' ?>>Home Appliances</option>
        <option value="Furniture"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Furniture' ? 'selected' : '' ?>>Furniture</option>
        <option value="Sports Equipment"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Sports Equipment' ? 'selected' : '' ?>>Sports Equipment</option>
        <option value="Beauty and Personal Care"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Beauty and Personal Care' ? 'selected' : '' ?>>Beauty and Personal Care</option>
        <option value="Toys and Games"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Toys and Games' ? 'selected' : '' ?>>Toys and Games</option>
        <option value="Automotive Parts"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Automotive Parts' ? 'selected' : '' ?>>Automotive Parts</option>
        <option value="Health and Wellness"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Health and Wellness' ? 'selected' : '' ?>>Health and Wellness</option>
        <option value="Jewelry"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Jewelry' ? 'selected' : '' ?>>Jewelry</option>
        <option value="Groceries"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Groceries' ? 'selected' : '' ?>>Groceries</option>
        <option value="Office Supplies"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Office Supplies' ? 'selected' : '' ?>>Office Supplies</option>
        <option value="Pet Supplies"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Pet Supplies' ? 'selected' : '' ?>>Pet Supplies</option>
        <option value="Home Decor"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Home Decor' ? 'selected' : '' ?>>Home Decor</option>
        <option value="Fitness and Exercise"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Fitness and Exercise' ? 'selected' : '' ?>>Fitness and Exercise</option>
        <option value="Outdoor Gear"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Outdoor Gear' ? 'selected' : '' ?>>Outdoor Gear</option>
        <option value="Kitchen Appliances"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Kitchen Appliances' ? 'selected' : '' ?>>Kitchen Appliances</option>
        <option value="Music and Instruments"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Music and Instruments' ? 'selected' : '' ?>>Music and Instruments</option>
        <option value="Art and Crafts"<?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === 'Art and Crafts' ? 'selected' : '' ?>>Art and Crafts</option>
        </select><br>
        <label required for="ProductQuantity">Quantity:</label>
        <input type="number" id="ProductQuantity" name="ProductQuantity" min="1" max="99" placeholder="1-99" value="<?= isset($prod['ProductQuantity']) ? $prod['ProductQuantity'] : '' ?>"><br>
        <label></label>
        <input required type="number" name="ProductPrice" placeholder="ProductPrice" value="<?= isset($prod['ProductPrice']) ? $prod['ProductPrice'] : '' ?>"><br>
        <input type="submit" value="SUBMIT">
    </form>
    <table border="1">
        <tr>
        <th>ProductName</th>
        <th>ProductDescription</th>
        <th>ProductCategory</th>
        <th>ProductQuantity</th>
        <th>ProductPrice</th>
        <th>Action</th>
        </tr>
        <?php foreach ($products as $p): ?>
        <tr>
            <td><?= $p['ProductName']?></td>
            <td><?= $p['ProductDescription']?></td>
            <td><?= $p['ProductCategory']?></td>
            <td><?= $p['ProductQuantity']?></td>
            <td><?= $p['ProductPrice']?></td>
            <td><a href="/delete/<?= $p['id'] ?>">delete</a>||<a href="/edit/<?= $p['id'] ?>">edit</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h3>Categories</h3>
    <ul>
    <?php 
    $prods = array();
    $categoryCounts = array();
    
    foreach ($products as $p) {
        $category = $p['ProductCategory'];
        
        if (!isset($categoryCounts[$category])) {
            $categoryCounts[$category] = 1;
        } else {
            $categoryCounts[$category]++;
        }
        
        if (!in_array($category, $prods)) {
            $prods[] = $category;
        }
    }
    
    foreach ($prods as $category) {
        echo "<li>" . $category;
        echo ($categoryCounts[$category] > 1)? " - " . $categoryCounts[$category] : "" . "</li>";
    }
    
    ?>
    </ul>
</body>
</html>