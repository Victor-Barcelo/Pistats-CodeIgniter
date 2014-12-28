		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<!-- JS Inyection -->
		<?php if (isset($js)) : ?>
			<?php foreach ($js as $item): ?>
				<script type="text/javascript" src="<?=$item ?>"></script>
			<?php endforeach;?>
		<?php endif;?>



	</body>
</html>