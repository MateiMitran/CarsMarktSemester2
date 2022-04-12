</div>
<!-- FOOTER -->
<footer id="footer">
	<a href="/">&copy; 2021 CarsMarkt Inc. All rights reserved</a>
</footer>

<!-- JAVASCRIPT IMPORTS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script src="js/essentials.js"></script>
<?php foreach($requiredJS as $js) { ?>
    <script src="js/<?php echo $js; ?>"></script>
<?php } ?>
</body>
</html>