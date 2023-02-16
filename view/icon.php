<h4 class="card-title">Material Icons</h4>
<h6 class="card-subtitle">you can use any icon with class of <code class="me-2">mid mid-</code>name of icon</h6>
    <div class="material-icon-list-demo">
        <div class="row icons" id="icons">
            <?php 
            foreach(icon() as $icon){
                ?>
                 <div class="m-icon">
                    <i class="me-2 mdi <?=$icon?>"></i><span><?=$icon?></span>
                </div>
                <?php
            }
            ?>
           
        </div>
    </div>