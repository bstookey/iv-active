<?php

/**
 * Filters the arguments for registering a block type.
 *
 * @param array  $args       Array of arguments for registering a block type.
 * @param string $block_type Block type name including namespace.
 * @return array Array of arguments for registering a block type.
 */
function filter_register_block_type_args(array $args, string $block_type)
{
    // Array of block types to disable
    $disabled_blocks = array(
        //'core/footnotes',
        //'core/columns',
        // Add more block types to disable as needed 
        // wp.blocks.getBlockTypes().forEach( function( blockType ){ console.log( blockType.name ); }); 
    );

    // Check if the current block type is in the disabled list
    if (in_array($block_type, $disabled_blocks, true)) {
        return array(); // Empty array effectively disables the block
    }

    return $args;
}

add_filter('register_block_type_args', 'filter_register_block_type_args', 10, 2);
