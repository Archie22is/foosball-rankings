<?php
/**
 * Created by PhpStorm.
 * User: Archie22is
 * Date: 2014/05/14
 * Time: 4:59 PM
 */


class showFoosballLeague {

    public function myLeaguedisplay(){

        // the following loop replicated the static content below
        $position = 1;

        query_posts(array(
            'post_type' => 'foosball-rankings',
            'showposts' => 99
        ) );
    ?>
    <?php while (have_posts()) : the_post(); ?>
    <?php
        // convert re-usable match values
        $won = (int)get_post_meta($post->ID, 'foosball_ranking_won', true);;
        $drew = (int)get_post_meta($post->ID, 'foosball_ranking_drew', true);
        $lost = get_post_meta($post->ID, 'foosball_ranking_lost', true);

        // get total numer of played matches
        $played = ($won + $drew + $lost);

        // calculate points (1 - loss | 2 - draw | 3 - win )
        $points = ( ($won * 3 )  + ($drew * 2) + ($lost * 1) );
    ?>
    <h3><span>Foosball</span> Ranking</h3>
    <table>
        <thead>
        <tr>
            <td>No.</td>
            <td>Teams (double)</td>
            <td>P</td>
            <td>W</td>
            <td>D</td>
            <td>L</td>
            <td>Pts</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $position ++; ?></td>
            <td>
                <ul>
                    <li>
                        <?php echo get_avatar(get_post_meta($post->ID, 'foosball_ranking_email1', true), 50 ); ?>
                        <span><?php echo get_post_meta($post->ID, 'foosball_ranking_name1', true); ?></span>
                    </li>
                    <li>
                        <?php echo get_avatar(get_post_meta($post->ID, 'foosball_ranking_email2', true), 50 ); ?>
                        <span><?php echo get_post_meta($post->ID, 'foosball_ranking_name2', true); ?></span>
                    </li>
                </ul>
            </td>
            <td><?php echo $played; ?></td>
            <td><?php echo $won; ?></td>
            <td><?php echo $drew; ?></td>
            <td><?php echo $lost; ?></td>
            <td><?php echo $points; ?></td>
        </tr>
        </tbody>
    </table>
    <?php endwhile;

    }
}


function show_league_table(){
    $showFoosballLeague = new showFoosballLeague();
    $showFoosballLeague->myLeaguedisplay();
}


