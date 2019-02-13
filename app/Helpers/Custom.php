<?php

if ( !function_exists( 'bijoyToAvro' ) ) {
    function bijoyToAvro( $text = null )
    {
        if ( $text ) {
            $converter = new \MirazMac\BanglaString\BanglaString( $text );

            return $converter->toAvro();
        }

        return false;
    }
}

if ( !function_exists( 'avroToBijoy' ) ) {
    function avroToBijoy( $text = null )
    {
        if ( $text ) {
            $converter = new \MirazMac\BanglaString\BanglaString( $text );

            return $converter->toBijoy();
        }

        return false;
    }
}
