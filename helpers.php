<?php

function floadcsv( $file, $headings = false, $delimiter = ',', $limit = null ) {

    $fp    = fopen( $file, 'r' );
    $lines = [];

    if ( $headings ) {
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
