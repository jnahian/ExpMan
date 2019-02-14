<?php

if ( !function_exists( 'bijoyToAvro' ) ) {
    function bijoyToAvro( $text = NULL )
    {
        if ( $text ) {
            $converter = new \MirazMac\BanglaString\BanglaString( $text );
            
            return $converter->toAvro();
        }
        
        return FALSE;
    }
}

if ( !function_exists( 'avroToBijoy' ) ) {
    function avroToBijoy( $text = NULL )
    {
        if ( $text ) {
            $converter = new \MirazMac\BanglaString\BanglaString( $text );
            
            return $converter->toBijoy();
        }
        
        return FALSE;
    }
}

if ( !function_exists( 'status' ) ) {
    function status( $val = NULL, $badge = FALSE )
    {
        $status = [
            1 => "সক্রিয়",
            9 => "নিষ্ক্রিয়"
        ];
        
        if ( $val ) {
            if ( $badge ) {
                if ( $val == 1 ) return "<span class='new badge green' data-badge-caption=''>{$status[$val]}</span>";
                elseif ( $val == 9 ) return "<span class='new badge orange' data-badge-caption=''>{$status[$val]}</span>";
            } else {
                return isset( $status[$val] ) ? $status[$val] : "";
            }
        } else {
            return $status;
        }
    }
}
