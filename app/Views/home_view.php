
                <h1>Joiners, Movers and Leavers Form</h1>

                <p>To access our forms please select one of the icons below</p>
                <p><?php echo get_current_user(); ?></p>

                <div class="row">

                    <div class="column-3">
                        <a href="<?php echo site_url(''); ?>"><img src="<?php echo site_url('assets/images/joiner.jpg'); ?>" alt="Joiner" class="icon"></a>
                        <a href="<?php echo site_url(''); ?>" class="no-line"><h2>Joiner</h2></a>
                        <p>A new starter joining the company</p>
                    </div>

                    <div class="column-3">
                        <a href="<?php echo site_url(''); ?>"><img src="<?php echo site_url('assets/images/mover.jpg'); ?>" alt="Mover" class="icon"></a>
                        <a href="<?php echo site_url(''); ?>" class="no-line"><h2>Mover</h2></a>
                        <p>An employee changing departments</p>
                    </div>

                    <div class="column-3">
                        <a href="<?php echo site_url(''); ?>"><img src="<?php echo site_url('assets/images/leaver.jpg'); ?>" alt="Leaver" class="icon"></a>
                        <a href="<?php echo site_url(''); ?>" class="no-line"><h2>Leaver</h2></a>
                        <p>An employee leaving the company</p>
                    </div>

                </div>
 