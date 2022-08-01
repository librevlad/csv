<?php

function floadcsv( $file, $headings = false, $delimiter = ',', $limit = null ) {

	$fp    = fopen( $file, 'r' );
	$lines = [];

	if ( is_array( $headings ) ) {
		$h = $headings;
	} elseif ( $headings == true ) {
		$h = fgetcsv( $fp, 0, $delimiter );
	}

	$taken = 0;
	$limit = $limit ? $limit : INF;
	while ( ( $taken < $limit ) && ( $l = fgetcsv( $fp, 0, $delimiter ) ) ) {
		$taken ++;
		if ( ! $headings ) {
			$result = $l;
		} else {
			$result = [];
			foreach ( array_slice( $l, 0, count( $h ) ) as $i => $cell ) {
				$result[ $h[ $i ] ] = $cell;
			}
		}
		$lines [] = $result;
	}

	fclose( $fp );

	return $lines;

}

function fsavecsv( $file, $data, $delimiter = ',' ) {

	$heading = [];
	if ( count( $data ) ) {
		$heading = array_keys( array_values( $data )[ 0 ] );
	}

	$content = implode( $delimiter, $heading );

	foreach ( $data as $row ) {

		$line = [];

		foreach ( $heading as $th ) {
			$line [] = ( $row[ $th ] ?? '' );
		}

		$content .= PHP_EOL . implode( $delimiter, $line );

	}

	file_put_contents( $file, $content);

}