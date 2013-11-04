<?php

function is_selected($choice, $bcolor)
{
   if (isset($_COOKIE['RSAchoice']) && $_COOKIE['RSAchoice'] == $choice) return "rel='selected' style='background-color: " . $bcolor . "; color: white'";
}

function display_parts($group_id, $group, $color)
{
    $return = "<div class='parts group" . $group_id . "'>
                    <h4>" . lang($group['title']) . "</h4>";

    foreach ($group['parts'] as $part_id=>$part)
    {
        $return .= '<div class="separator">&nbsp;</div>

                    <div class="item-container" id="' . $group_id . '-' . $part_id . '" ' . is_selected($group_id . "-" . $part_id, $color) . '>
                       <div class="item">' . lang($part) . '</div>
                   </div>';
    }

    $return .= "</div>";

    return $return;
}
