<div class="testimonial-block">
    <div class="testimonial-image-container">
        <img class="testimonial-img" src="img/man.png">
    </div>
    <div class="testimonial-text">
        <i class="fa fa-quote-left" aria-hidden="true"></i>
        <p>You just have to arrive at the place, it's fully furnished and stocked with all basic amenities and services and even your friends are welcome.</p>
    </div>
    <div class="testimonial-name">- Ashutosh Gowariker</div>
</div>




<?php
    if (mysqli_num_rows($result_5) > 0) { ?>
        <div class="property-testimonials page-container">
            <h1>What people say</h1>
            <?php
            while($testimonial = mysqli_fetch_assoc($result_5)) { ?>
                <div class="testimonial-block">
                    <div class="testimonial-image-container">
                        <img class="testimonial-img" src="img/man.png">
                    </div>
                <div class="testimonial-text">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p><?php echo $testimonial['content']; ?></p>
                </div>
                <div class="testimonial-name"><?php echo $testimonial['user_name']; ?></div>
                </div> 
            <?php    
            } ?>
        </div>
    <?php
    }    
    ?>









<?php

if (mysqli_num_rows($result_5) > 0) { ?>
    <div class="property-testimonials page-container">
        <h1>What people say</h1>
        <?php
        while($testimonial = mysqli_fetch_assoc($result_5)) { ?>
            <div class="testimonial-block"> 
                    <div class="testimonial-image-container">
                        <img class="testimonial-img" src="img/man.png">
                    </div>
                <div class="testimonial-text">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p><?php echo $testimonial['content']; ?></p>
                </div>
                <div class="testimonial-name"><?php echo $testimonial['user_name']; ?></div>
            </div>
        <?php     
        } ?>
        </div>
    <?php    
    } else {
        echo "No testimonials found for this property.";
    }
    ?>






<?php
    if (mysqli_num_rows($result_5) > 0) {
        $current_testimonial= ''; ?>
        <div class="property-testimonials page-container">
        <h1>What people say</h1>
        <?php
        while($testimonial = mysqli_fetch_assoc($result_5)) {
            if ($current_testimonial !== $testimonial['id']) {
                if ($current_testimonial !== '') { ?>
                    </div>
                <?php
                }
                $current_testimonial = $testimonial['id'];?>
                <div class="testimonial-block">
                
            <?php   
            } ?>
                    <div class="testimonial-image-container">
                        <img class="testimonial-img" src="img/man.png">
                    </div>
                    <div class="testimonial-text">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p><?php echo $testimonial['content']; ?></p>
                    </div>
                    <div class="testimonial-name"><?php echo $testimonial['user_name']; ?></div>
        <?php    
        } ?>
                </div>
            <?php    
            } else {
                 echo "No amenities found for this property.";
                }
            ?>


<div class="testimonial-block">
    <div class="testimonial-image-container">
        <img class="testimonial-img" src="img/man.png">
    </div>
    <div class="testimonial-text">
        <i class="fa fa-quote-left" aria-hidden="true"></i>
        <p>You just have to arrive at the place, it's fully furnished and stocked with all basic amenities and services and even your friends are welcome.</p>
    </div>
    <div class="testimonial-name">- Ashutosh Gowariker</div>
</div>


<?php
    if (mysqli_num_rows($result_5) > 0){ ?>
        <div class="property-testimonials page-container">
        <h1>What people say</h1>
        <?php
        current_id=testimonial['id'];
        while($testimonial = mysqli_fetch_assoc($result_5) and current_id>0){
            if(current_id=$testimonial['id']){
                ?>
                <div class="testimonial-block">
                    <div class="testimonial-image-container">
                        <img class="testimonial-img" src="img/man.png">
                    </div>
                    <div class="testimonial-text">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p><?php echo $testimonial['content']; ?></p>
                    </div>
                    <div class="testimonial-name"><?php echo $testimonial['user_name']; ?></div>
                </div>
                

            
            <?php
            }
            current_id=current_id+1;

            
        }

    }
    ?>
        

<?php
    if (mysqli_num_rows($result_5) > 0) {
    // Output data of each row
    while($testimonial = mysqli_fetch_assoc($result_5)) {
        echo $testimonial['name'];
    }
} else {
    echo "No testimonials found for this property.";
}
?>
