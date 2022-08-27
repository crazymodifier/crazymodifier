<style>

:root{
    --navbar-min-height:90px;
    --cmd-link-color:#3f3f3f;
    --cmd-link-hover-color:#6d4be8;
    --cmd-primary-color:#ff7020;
    --cmd-secondary-color:#6d4be8;
    --cmd-color-1:#22222e;
    --cmd-color-2:#ff7020;
    --cmd-color-3:#ffb045;
    --cmd-color-4:#393a5a;
    --cmd-color-5:#b7d7e5;
    --cmd-button-radius: 50px;   
}
.cmd-card-wrapper {
    display: flex;
    flex-wrap: wrap;
}

.cmd-card-column {
    flex: 0 0 280px;
    max-width: 280px;
}

.cmd-content-column {
    flex: 1;
    /* max-width: 75%; */
}

.cmd-theme-setting-wrapper {
    max-width: 90%;
    border:1px solid #ccc;
    background:#fff;
    box-shadow:0 0 25px #ccc;
    padding:25px;
    margin: 30px auto;
    border-radius:15px;
    overflow:hidden;
}

.cmd-side-nav {
    background: var(--cmd-color-1);
    border-radius:10px;
    overflow:hidden;
    padding: 15px;
}

.cmd-side-nav ul{
    margin:0;
    overflow:hidden;
}

.cmd-side-nav .list-link{
    padding:15px 20px;
    display: block;
    color: #fff;
    background: var(--cmd-color-1);
    text-decoration:none;
    transition: all .3s ease-in-out;
    border-radius:5px;
    font-size:16px
}

.cmd-side-nav .list-link:hover,
.cmd-side-nav .list-link.active,
.cmd-side-nav .list-link:focus,
.cmd-side-nav .list-link:active{
    background: var(--cmd-color-2);
}
.cmd-side-nav .list-link:focus{
    box-shadow:none;
    outline:none
}

.active.list-link {
    position:relative;
}

.active.list-link:after{
    content:"";
    width: 20px;
    height:20px;
    background:var(--cmd-color-1);
    z-index:999;
    position:absolute;
    top:50%;
    transform:translateY(-50%) rotate(45deg);
    right:-10px;

}


.cmd-content-wrapper {
    height: 100%;
    padding-left: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-wrapper {
    height: 100%;
}

header.cmd-head {
    background: #f8f8f8;
    padding: 20px;
}
header.cmd-head h3{
    margin:0
}
footer.cmd-footer {
    background: #f8f8f8;
    padding: 20px;
}
</style>

<h1 class="wp-heading-inline">
Theme Options</h1>
<div class="cmd-theme-setting-wrapper">
    <div class="cmd-card-wrapper">
        <div class="cmd-card-column">

            <div class="card-wrapper">
                <nav class="cmd-side-nav">
                    <ul >

                        <?php

                        $options = get_cmd_admin_theme_options();

                        foreach ($options as $key => $value) : ?>

                        <li class="list-item<?php echo ($value['children'])?' has-child':'';?>">
                            <a href="<?php echo $value['url']?>" data-type="<?php echo $value['type']?>" class="list-link"><?php echo $value['title']?></a>

                            <?php

                            if($value['children']):
                            ?>
                                <ul class="sub-menu ">
                                    <?php foreach ($value['children'] as $child) : ?>
                                    <li class="list-item">
                                        <a href="<?php echo $child['url']?>" data-type="<?php echo $child['type']?>" class="list-link"><?php echo $child['title']?></a>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            <?php

                            endif;
                            ?>
                        </li>

                        <?php endforeach;?>
                    </ul>
                </nav>
            </div>

        </div>

        <div class="cmd-content-column">
            <div class="cmd-content-wrapper">
                <header class="cmd-head">
                    <h3>Dashboard</h3>
                </header>
                <main id="cmd-setting-main" style="flex:1">
            
                <section>
                    <table>
                        <tr>
                            <td>Primary Color</td>
                            <td>
                                <input type="text" id="color-picker">
                            </td>
                        </tr>
                    </table>
                </section>  
            
                </main>
                <footer class="cmd-footer">
                    <button name="save" class="button-primary woocommerce-save-button" type="button" value="Save changes">Save changes</button>
                </footer>
            </div>
        </div>
    </div>
</div>




<script>
    ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';
    (function($){

        $(function(){

        })

        .on(
            'click', 
            '.cmd-side-nav .list-link', 
            function(e){
                e.preventDefault();
                data = {
                    action : 'cmd_theme_option_content',
                    type : $(this).data('type')
                };
                $.ajax({
                    type: "post",
                    url: ajaxurl,
                    data: data,
                    dataType: "json",
                    success: function (res) {
                        console.log(res);

                        $('#cmd-setting-main').html(res)
                    }
                });
        })

        .on(
            'click',
            '.list-link',
            function(e){
                e.preventDefault();
                $('.list-link').removeClass('active');
                $(this).addClass('active')
            }
        )

    })(jQuery)


    jQuery(document).ready(function ($) {
        $('#color-picker').wpColorPicker();
    });
</script>