<?php
// Owner of the forum (id=1)
if ($data['membre_id'] == 1) // Etc, etc...
    {
        echo '<div class="item"><img src="./images/badges/owner.png" class="ui image" title="Owner of the forum"></div>';
    }
// Administrator or Moderator
if ($data['membre_rang'] > 2) // Etc, etc...
    {
        echo '<div class="item"><img src="./images/badges/star64.png" class="ui image" title="Staff team"></div>';
    }
// Completed Profile
if (!empty($data['membre_siteweb']) && !empty($data['membre_btag']) && !empty($data['membre_localisation']))
    {
        echo '<div class="item"><img src="./images/badges/profile64.png" class="ui image" title="Completed profile"></div>';
    }
// Number of posts
if ($data['membre_post'] > 0 AND $data['membre_post'] < 10) // Etc, etc...
    {
        echo '<div class="item"><img src="./images/badges/post1.png" class="ui image" title="Has posted 1 post minimum"></div>';
    }
elseif ($data['membre_post'] >= 10 AND $data['membre_post'] < 30)
    {
        echo '<div class="item"><img src="./images/badges/post2.png" class="ui image" title="Has posted 10 posts minimum"></div>';
    }
elseif ($data['membre_post'] >= 30 AND $data['membre_post'] < 50)
    {
        echo '<div class="item"><img src="./images/badges/post3.png" class="ui image" title="Has posted 30 posts minimum"></div>';
    }
elseif ($data['membre_post'] >= 50 AND $data['membre_post'] < 75)
    {
        echo '<div class="item"><img src="./images/badges/post4.png" class="ui image" title="Has posted 50 posts minimum"></div>';
    }
elseif ($data['membre_post'] >= 75 AND $data['membre_post'] < 100)
    {
        echo '<div class="item"><img src="./images/badges/post5.png" class="ui image" title="Has posted 75 posts minimum"></div>';
    }
elseif ($data['membre_post'] >= 100)
    {
        echo '<div class="item"><img src="./images/badges/postgold.png" class="ui image" title="Has posted 100 posts minimum"></div>';
    }
