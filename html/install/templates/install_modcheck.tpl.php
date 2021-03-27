<?php

foreach ( $this->v( 'checks' ) as $check ) {

	echo $check . '<br>';
}

?>

<div class="confirmInfo"><?php $this->e( 'message' ) ?></div>
