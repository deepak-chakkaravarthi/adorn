<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"], input[type="number"], textarea, select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea {
            height: 100px;
        }
        .checkbox-group label {
            display: inline-block;
            margin-right: 15px;
        }
        .checkbox-group input[type="checkbox"] {
            margin-right: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-size: 14px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Update Product</h1>

    <?php if($errors->any()): ?>
        <div class="error-message">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="container">
        <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo e($product->name); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required><?php echo e($product->description); ?></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="<?php echo e($product->price); ?>" required>
            </div>

            <div class="form-group checkbox-group">
                <label>Categories:</label><br>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="checkbox" name="category_ids[]" value="<?php echo e($category->id); ?>"
                        <?php echo e($product->categories->contains($category->id) ? 'checked' : ''); ?>>
                    <?php echo e($category->name); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="form-group checkbox-group">
                <label>Suppliers:</label><br>
                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="checkbox" name="supplier_ids[]" value="<?php echo e($supplier->id); ?>"
                        <?php echo e($product->suppliers->contains($supplier->id) ? 'checked' : ''); ?>>
                    <?php echo e($supplier->name); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="form-group">
                <label for="profit_margin_type">Profit Margin Type:</label>
                <select id="profit_margin_type" name="profit_margin_type">
                    <option value="percentage" <?php echo e($product->profit_margin_type === 'percentage' ? 'selected' : ''); ?>>Percentage</option>
                    <option value="amount" <?php echo e($product->profit_margin_type === 'amount' ? 'selected' : ''); ?>>Amount</option>
                </select>
            </div>

            <div class="form-group">
                <label for="profit_margin_value">Profit Margin Value:</label>
                <input type="number" id="profit_margin_value" name="profit_margin_value" value="<?php echo e($product->profit_margin_value); ?>">
            </div>

            <button type="submit">Update Product</button>
        </form>

        <br>
        <a href="<?php echo e(route('products.list')); ?>">Back to Product List</a>
    </div>

</body>
</html>
<?php /**PATH D:\newtask\newtask\resources\views/products/edit.blade.php ENDPATH**/ ?>