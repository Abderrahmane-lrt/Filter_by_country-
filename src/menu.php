<nav class="flex gap-25 h-16 bg-indigo-500 items-center ">
    <a href="index.html" class=" font-medium  text-xl ml-10 text-indigo-300
    <?php echo ($page == 'index') ? 'text-bleu-300 shadow-md' : '' ?>
    ">Home</a>
    <a href="country.php" class=" font-medium text-xl  text-indigo-300
    <?php echo ($page == 'country') ? 'text-white ' : '' ?>
    ">Country</a>
    <a href="city.php" class=" font-medium text-xl text-indigo-300
    <?php echo ($page == 'city') ? 'text-white ' : ''?>
    ">City</a>
    <a href="filter.php" class=" font-medium text-xl   text-indigo-300
    <?php echo ($page == 'filter') ? 'text-white ' : '' ?>
    ">Filter</a>
</nav>