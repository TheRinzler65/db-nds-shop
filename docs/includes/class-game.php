<?php

defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

class Game {

    public string $game_path;
    public string $file_name;
    public string $content;
    public array $meta;
    public $update;

    public function __construct( string $game_name ){

        $game_path = SITE_PATH . GAME_DATA_FOLDER . $game_name . '.md';

        if( !file_exists( $game_path ) ){ 

            echo "/!\ This game " . $game_name . " doesn't exist !";
            return;

        }

        $game = $this->parse_content( $game_path );

        if( !isset( $game['filename'] ) || !isset( $game['metadata'] ) ){

            echo "/!\ This game " . $game_name . " have a bad parsing !";
            return;

        }

        $this->game_path = $game_path;
        $this->file_name = $game['filename'];
        $this->content = $game['content'];
        $this->meta = $game['metadata'];
        $this->update = isset( $game['updated'] ) ? $game['updated'] : "";

    }

    public function __invoke( string $meta ){

        echo $this->meta[$meta] ?? "";
    }

    public function meta( string $meta ){

        return $this->meta[$meta] ?? "";
    }

    public function icon( bool $get = false ){

        $icon = $this->meta['icon'] ?? "";
        if( $icon && $icon != "" ){

            $icon = $icon;

        } else {

            $icon = SITE_DEFAULT_IMAGE;
        }

        if( !$get ){

            echo $icon;
            return;

        }

        return $icon;
    }

    public function systems( bool $get = false ){

        $systems = $this->meta['systems'] ?? [""];
        $systems = implode( ', ', $systems );

        if( !$get ){

            echo $systems;
            return;
            
        }

        return $systems;
    }

    private function parse_content( string $game_path ){

        $game_response = [];
        $game_content = file_get_contents( $game_path );

        if( preg_match( '/^---\s*(.*?)\s*---/s', $game_content, $matches ) ){

            $metadata = Symfony\Component\Yaml\Yaml::parse( $matches[1] );

            if( isset( $metadata['updated'] ) ){

                $game_response['updated'] = strtotime( $metadata['updated'] );

            }

            $game_response['filename'] = basename( $game_path, '.md' );
            $game_response['metadata'] = $metadata;
            $game_response['content'] = $matches[2] ?? "";
        }

        return $game_response;
    }

}