<?php

function gallery_items($users, $sort = false)
{
    if(!empty($users))
    {
        $entry = array();

        if ($sort) shuffle($users);

        foreach ($users as $user => $details)
        {
            if (file_exists($details['full_pic']))
            {
                $entry[$details['email_address']] = "

                        <div class='gallery_item' id='1'>
                            <img src='" . $details['full_pic'] . "' width='130px' height='195px'>
                            <div class='gallery_item_text'>" . $details['name'] . " <br> " . $details['country'] . "</div>
                        </div>

                        ";

                /*
                $entry[$details['email_address']] = '
                <li data-id="id-1" data-type="util">
                    <img src="' . $details['full_pic'] . '" width="130" height="195" alt="" />
                    <strong>' . $details['name'] . '</strong>
                    <span data-type="size">' . $details['country'] . '</span>
                </li>';
                 *
                 */
            }
        }

    }

    if (isset($entry)) return implode(" ", $entry);
    else return "<h3>No entries found</h3>";
}